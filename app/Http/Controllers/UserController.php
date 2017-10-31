<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\SocialAccountService;
use App\Models\User;
use App\Models\EventPlan;
use App\Models\EventPlanDetail;
use App\Models\ForkPlanService;
use App\Models\Subject;
use App\Models\Category;
use App\Models\Service;
use App\Models\Album;
use Socialite;
use Auth;
use Response;
use Validator;
use Session;
use Carbon;

class UserController extends Controller
{
    public function getProfile($id)
    {
        $user = User::getUser($id);

        return view('front.users.details.profile', compact('user'));
    }

    public function redirect($social)
    {
        return Socialite::driver($social)->redirect();
    }

    public function callback($social)
    {
        $user = SocialAccountService::createOrGetUser(Socialite::driver($social)
            ->user(), $social);
        auth()->login($user);

        return redirect()->route('home');
    }

    public function getDashboard($id)
    {
        $user = User::getUser($id);

        return view('front.users.dashboard.index', compact('user'));
    }

    public function getDashboardEvents($id)
    {
        $user = User::getUser($id);
        $eventPlans = EventPlan::getUserEventPlans($id)
            ->with('subject', 'eventForks')->withCount('eventForks')->get();

        return view('front.users.dashboard.event_plans',
            compact('eventPlans', 'user'));
    }

    public function getDashboardCreateEvent($id)
    {
        $user = User::getUser($id);
        $subjects = Subject::getAllSubjects();

        return view('front.users.dashboard.create_event',
            compact('user', 'subjects'));
    }

    public function postDashboardCreateEvent($id, Request $request)
    {
        if ($request->subject != 'new') {
            $subjectId = $request->subject;
        } else {
            $subjectId = Subject::create([
                    'title' => $request->new_subject,
                    'slug' => str_slug($request->new_subject)
            ])->id;
        }

        $image = $request->file('image');
        $imageName = str_random(4).'_'.$image->getClientOriginalName();

        while (file_exists(config('asset.image_path.event_plan').$imageName)) {
            $imageName = str_random(4).'_'.$image->getClientOriginalName();
        }

        upload_file($image, config('asset.image_path.event_plan'), $imageName);

        $eventPlanId = EventPlan::create([
                'title' => $request->title,
                'slug' => str_slug($request->title),
                'content' => $request->description,
                'user_id' => $id,
                'subject_id' => $subjectId,
                'image' => $imageName,
        ])->id;

        $album = $request->file('albums');

        foreach ($album as $item) {
            $itemName = str_random(4).'_'.$item->getClientOriginalName();

            while (file_exists(config('asset.image_path.album').$itemName)) {
                $itemName = str_random(4).'_'.$item->getClientOriginalName();
            }

            upload_file($item, config('asset.image_path.album'), $itemName);

            Album::create([
                    'image' => $itemName,
                    'event_plan_id' => $eventPlanId,
            ]);
        }

        return redirect()->route('userDashboardCreateEventDetail',
            ['id' => $id, 'slug' => $eventPlan->slug])->with('created_event',
                'Event created successfuly, next, add new event details! ');
    }

    public function getCreateEventDetail($id, $slug)
    {
        $user = User::getUser($id);
        $eventPlan = EventPlan::getEventPlan($slug);
        return view('front.users.dashboard.create_event_detail',
            compact('user', 'eventPlan'));
    }

    public function postCreateEventDetail($id, Request $request)
    {
        if (Session::has('services')) {
            $eventPlanDetailId = EventPlanDetail::create([
                    'name' => $request->detail_name,
                    'start_date' => Carbon\Carbon::parse($request->detail_start_date)->format('Y-m-d H:i:s'),
                    'due_date' => Carbon\Carbon::parse($request->detail_due_date)->format('Y-m-d H:i:s'),
                    'amount' => $request->detail_amount,
                    'event_plan_id' => $request->detail_event_plan_id,
            ])->id;

            $eventPlan = EventPlan::find($request->detail_event_plan_id);
            $eventPlan->amount += $request->detail_amount;
            $eventPlan->save();

            foreach (Session::get('services') as $serviceId) {
                ForkPlanService::create([
                    'service_id' => $serviceId,
                    'plan_id' => $eventPlanDetailId,
                ]);
            }

            $request->session()->forget('services');

            return redirect()->back()->with('addDetailSuccess', 'Add Event Detail
                Success, You can continue add Detail or Next Step Below');
        }
        return redirect()->back()->with('addDetailError', 'You have to add
                Services for Event Detail');
    }

    public function getLoadCategories($id)
    {
        $categories = Category::getAllCategories();

        return view('front.users.dashboard._section.categories',
                compact('categories'))->render();
    }

    public function getCreateEventService($id)
    {
        $user = User::getUser($id);
        $categories = Category::getAllCategories();
        return view('front.users.dashboard._section.services',
            compact('user', 'categories'))->render();
    }

    public function postCreateEventService($id, Request $request)
    {
        if (!$request->ajax()) {
            return view('errors.403');
        }

        $this->validate($request, [
                'name' => 'required|unique:services,name',
                'price' => 'required|numeric',
                'category' => 'required'
            ], [
                'name.required' => 'Services name required',
                'name.unique' => 'Service name already exists!',
                'price.required' => 'Price required',
                'price.numeric' => 'Price have to number character',
                'category.required' => 'Category required'
            ]);

        if ($request->input('category') != 'new') {
            $categoryId = $request->input('category');
        } else {
            $this->validate($request, [
                'category_name' => 'unique:categories,name'
            ], [
                'category_name.unique' => 'Category name already exists!'
            ]);

            $categoryId = Category::create([
                    'name' => $request->input('category_name'),
                    'slug' => str_slug($request->input('category_name')),
            ])->id;
        }

        $service = Service::create([
            'name' => $request->input('name'),
            'price' => $request->input('price'),
            'description' => $request->input('description'),
            'category_id' => $categoryId,
        ]);

        $request->session()->push('services', $service->id);

        return Response(['service' => $service]);
    }
}
