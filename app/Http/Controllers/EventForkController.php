<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EventPlan;
use App\Models\EventFork;
use App\Models\Service;
use App\Models\EventForkDetail;
use App\Models\ForkPlanService;
use App\Models\User;
use App\Events\ForkClickElementEvent;
use App\Events\ForkLosesElementEvent;
use App\Events\ForkChangedDataEvent;
use App\Events\ForkLiveChatEvent;
use App\Events\ForkRemoveServiceEvent;
use App\Events\ForkAddServiceEvent;
use App\Events\ForkLoadDetailAmountEvent;
use App\Events\ForkLoadEventAmountEvent;
use App\Http\Requests\ForkServiceRequest;
use Carbon;
use DB;

class EventForkController extends Controller
{
    public function showList($userId)
    {
        $user = User::getUser($userId)->first();
        $eventForks = EventFork::getUserEventForks($userId)->with('eventPlan')->paginate(5);

        return view('front.users.dashboard.event_forks.list', compact('user', 'eventForks'));
    }

    public function getRemove($userId, $eventForkId)
    {
        $eventFork = EventFork::find($eventForkId);
        if (!$eventFork) {
            return view('errors.403');
        }
        $eventFork->delete();

        return redirect()->back()->with('removed', 'Remove Event Successfuly');
    }

    public function showEventFork($userId, $eventForkId)
    {
        $eventFork = EventFork::getById($eventForkId)->first();
        $user = User::getUser($eventFork->user_id)->withCount('eventForks')->first();
        $forkDetails = EventForkDetail::getDetailOfFork($eventFork->id)->get();

        return view('front.event_forks.index', compact('eventFork', 'user', 'forkDetails'));
    }

    public function forkEventPlan($userId, $eventPlanId)
    {
        $eventPlan = EventPlan::getEventPlanById($eventPlanId)
            ->with('eventPlanDetails', 'eventForks')->first();

        if ($eventPlan->user_id == $userId) {
            return redirect()->route('home');
        }

        if (count($eventPlan->eventForks)) {
            foreach ($eventPlan->eventForks as $eventFork) {
                if ($eventFork->user_id == $userId ||
                    $eventFork->eventPlan->user_id == $userId ) {
                    return view('front.event_forks.show', compact('eventFork'));
                }
            }
        }
        $eventFork = DB::transaction(function () use ($eventPlan, $userId)
        {
            $newEventFork = EventFork::create([
                'slug' => $eventPlan->slug,
                'amount' => $eventPlan->amount,
                'event_plan_id' => $eventPlan->id,
                'user_id' => $userId,
            ]);
            foreach ($eventPlan->eventPlanDetails as $detail) {
                $eventForkDetail = EventForkDetail::create([
                    'name' => $detail->name,
                    'start_date' => $detail->start_date,
                    'due_date' => $detail->due_date,
                    'amount' => $detail->amount,
                    'status' => config('asset.active.yes'),
                    'event_fork_id' => $newEventFork->id,
                ]);

                $forkPlanServices = ForkPlanService::findByEventPlanDetail($detail->id)->get();
                foreach ($forkPlanServices as $forkService) {
                    ForkPlanService::create([
                        'service_id' => $forkService->service_id,
                        'event_fork_detail_id' => $eventForkDetail->id,
                    ]);
                }
            }

            return $newEventFork;
        });

        return view('front.event_forks.show', compact('eventFork'));
    }

    public function clickElement(Request $request)
    {
        if (!$request->ajax()) {
            return view('errors.403');
        }
        $elementId = $request->elementId;
        event(new ForkClickElementEvent($elementId));
    }

    public function losesElement(Request $request)
    {
        if (!$request->ajax()) {
            return view('errors.403');
        }
        $elementId = $request->elementId;
        event(new ForkLosesElementEvent($elementId));
    }

    public function changedData(Request $request)
    {
        if (!$request->ajax()) {
            return view('errors.403');
        }

        $target = explode('-', $request->target);
        $tableName = $target[0];
        $elementChangeId = $target[1];
        $elementChange = $target[2];
        $elementType = $target[3];

        $elementId = $request->elementId;
        if ($elementType == 'date') {
            $elementValue = Carbon\Carbon::parse($request->elementValue)->format('Y-m-d H:i:s');
        }
        if ($elementType == 'string') {
            $elementValue = $request->elementValue;
        }

        if ($tableName == 'event_forks') {
            $eventFork = EventFork::getById($elementChangeId)->first();
            $eventFork->$elementChange = $elementValue;
            $eventFork->save();
        }
        if ($tableName == 'event_fork_details') {
            $eventForkDetail = EventForkDetail::getById($elementChangeId)->first();
            $eventForkDetail->$elementChange = $elementValue;
            $eventForkDetail->save();
        }

        event(new ForkChangedDataEvent($elementId, $elementValue));
    }

    public function liveChat(Request $request)
    {
        if (!$request->ajax()) {
            return view('errors.403');
        }
        $user = $request->user;
        $content = $request->content;
        $chanelId = $request->chanelId;

        event(new ForkLiveChatEvent($user, $content, $chanelId));
    }

    public function removeForkService(Request $request)
    {
        if (!$request->ajax()) {
            return view('errors.403');
        }
        $result = DB::transaction(function () use ($request)
        {
            $forkPlanService = ForkPlanService::getById($request->forkServiceId)
                ->with('eventForkDetail', 'service')->first();

            $forkPlanService->eventForkDetail->amount -= $forkPlanService->service->price;
            $forkPlanService->eventForkDetail->save();

            $forkPlanService->eventForkDetail->eventFork->amount -= $forkPlanService->service->price;
            $forkPlanService->eventForkDetail->eventFork->save();

            $dataReturn = [
                'forkDetailId' => $forkPlanService->eventForkDetail->id,
                'forkEventId' => $forkPlanService->eventForkDetail->eventFork->id,
                'message' => 'Remove Service Done!'
            ];

            $forkPlanService->delete();

            return $dataReturn;
        });
        event(new ForkRemoveServiceEvent($request->forkServiceId));

        return $result;
    }

    public function addForkService(ForkServiceRequest $request)
    {
        if (!$request->ajax()) {
            return view('errors.403');
        }

        $result = DB::transaction(function () use ($request)
        {
            $service = Service::create([
                'name' => $request->serviceName,
                'price' => $request->servicePrice,
            ]);

            $forkPlanService = ForkPlanService::create([
                'service_id' => $service->id,
                'event_fork_detail_id' => $request->forkDetailId,
            ]);

            $forkPlanService->eventForkDetail->amount += $forkPlanService->service->price;
            $forkPlanService->eventForkDetail->save();

            $forkPlanService->eventForkDetail->eventFork->amount += $forkPlanService->service->price;
            $forkPlanService->eventForkDetail->eventFork->save();

            $dataReturn = [
                'forkDetailId' => $forkPlanService->eventForkDetail->id,
                'forkEventId' => $forkPlanService->eventForkDetail->eventFork->id,
                'serviceItem' => view('front.event_forks._sections.fork_services',
                    compact('service', 'forkPlanService'))->render(),
                'message' => 'Add Service Successfuly!'
            ];

            return $dataReturn;
        });
        event(new ForkAddServiceEvent($result['serviceItem'], $result['forkDetailId']));

        return $result;
    }

    public function loadForkDetailAmount(Request $request)
    {
        if (!$request->ajax()) {
            return view('errors.403');
        }
        $forkDetail = EventForkDetail::getById($request->forkDetailId)->first();

        event(new ForkLoadDetailAmountEvent(convert_vnd($forkDetail->amount), $request->forkDetailId));
    }

    public function loadEventForkAmount(Request $request)
    {
        if (!$request->ajax()) {
            return view('errors.403');
        }
        $eventFork = EventFork::getById($request->eventForkId)->first();

        event(new ForkLoadEventAmountEvent(convert_vnd($eventFork->amount), $request->eventForkId));
    }
}
