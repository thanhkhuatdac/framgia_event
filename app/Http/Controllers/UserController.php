<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\SocialAccountService;
use Socialite;
use Auth;
use App\Models\User;
use App\Models\EventPlan;
use App\Models\Subject;
use App\Models\Category;

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
        // continue next pull
    }
}
