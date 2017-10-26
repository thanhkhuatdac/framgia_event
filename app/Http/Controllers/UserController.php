<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\SocialAccountService;
use Socialite;
use Auth;
use Response;
use Validator;
use App\Models\User;
use App\Models\EventPlan;
use App\Models\Subject;
use App\Models\Category;
use App\Models\Service;

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

    public function getCreateEventDetail($id)
    {
        $user = User::getUser($id);
        return view('front.users.dashboard.create_event_detail',
            compact('user'));
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

        $validator = Validator::make($request->all(), [
                'name' => 'required|unique:services,name'
            ], [
                'name.required' => 'Services name required',
                'name.unique' => 'Service name already exists!'
            ]);

        $service = new Service();
        $service->name = $request->input('name');
        $service->price = $request->input('price');
        $service->description = $request->input('description');

        if ($request->input('category') != 'new') {
            $service->category_id = $request->input('category');
        } else {
            $category = new Category();
            $category->name = $request->input('category_name');
            $category->slug = str_slug($category->name);
            // $category->save();
            $service->category_id = $category->id;
        }

        // $service->save();

        return Response::json(array(
            'code'      =>  404,
            'message'   =>  $validator
        ), 404);

        // return Response(['service' => $service]);
    }
}
