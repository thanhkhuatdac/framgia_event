<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\EventPlan;
use App\Models\RequestEvent;
use App\Models\EventFork;
use App\Models\EventPlanDetail;
use App\Events\ApproveEvent;
use Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $freelancerCount = count(User::getAllFreelancers()->get());
        $customerCount = count(User::getAllCustomers()->get());
        $eventPlanCount = count(EventPlan::getAll()->get());
        $requestEventCount = count(RequestEvent::getAllRequestEvents()->get());
        $eventForkCount = count(EventFork::all());

        return view('back.pages.dashboard', compact('freelancerCount',
            'customerCount', 'eventPlanCount', 'requestEventCount', 'eventForkCount'));
    }

    public function eventPlanPublished()
    {
        $eventPlans = EventPlan::getAll()->get();

        return view('back.pages.event_plans.published', compact('eventPlans'));
    }

    public function eventPlanPending()
    {
        $eventPlans = EventPlan::getPending()->get();

        return view('back.pages.event_plans.pending', compact('eventPlans'));
    }

    public function getRemoveEventPlanPending($eventPlanId)
    {
        $eventPlan = EventPlan::find($eventPlanId);
        if (!$eventPlan || Auth::user()->role != 'admin') {
            return view('errors.403');
        }
        $eventPlan->delete();

        return redirect()->back()->with('removed', 'Remove Event Successfuly');
    }

    public function previewDemoEvent($slug)
    {
        $eventPlan = EventPlan::getEventPlanNoActive($slug)->with('user', 'albums')
            ->withCount('reviews')->first();

        if (!$eventPlan || Auth::user()->role != 'admin') {
            return view('errors.403');
        }

        $user = User::getUser($eventPlan->user_id)->withCount('reviews', 'eventPlans')
            ->first();
        $planDetails = EventPlanDetail::getDetailOfPlan($eventPlan->id)->with('forkPlanServices')->get();

        return view('front.users.dashboard.show_demo_event',
            compact('user', 'eventPlan', 'planDetails'));
    }

    public function approveEvent($id)
    {
        $eventPlan = EventPlan::find($id);
        if (!$eventPlan || Auth::user()->role != 'admin') {
            return view('errors.403');
        }
        $eventPlan->active = 1;
        $eventPlan->save();

        $eventPlanTitle = $eventPlan->title;
        $notif = view('front.main_layouts._sections.approveNotif', compact('eventPlanTitle'))
            ->render();
        event(new ApproveEvent($notif, $eventPlan->user_id));

        return redirect()->back()->with('approved', 'Approve Event Successfuly');
    }

    public function unapproveEvent($id)
    {
        $eventPlan = EventPlan::find($id);
        if (!$eventPlan || Auth::user()->role != 'admin') {
            return view('errors.403');
        }
        $eventPlan->active = 0;
        $eventPlan->save();

        $eventPlanTitle = $eventPlan->title;
        $notif = view('front.main_layouts._sections.unapproveNotif', compact('eventPlanTitle'))
            ->render();
        event(new ApproveEvent($notif, $eventPlan->user_id));

        return redirect()->back()->with('unapproved', 'Unapprove Event Successfuly');
    }
}
