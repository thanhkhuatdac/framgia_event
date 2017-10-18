<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\SocialAccountService;
use Socialite;
use Auth;
use App\Models\User;
use App\Models\EventPlan;

class UserController extends Controller
{
    public function getProfile($id)
    {
        $user = User::getUser($id)->first();
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
        $user = User::getUser($id)->first();
        return view('front.users.dashboard.index', compact('user'));
    }

    public function getDashboardEvents($id)
    {
        $user = User::getUser($id)->first();
        $eventPlans = EventPlan::getUserEventPlans($id)
            ->with('subject', 'eventForks')->withCount('eventForks')->get();
        return view('front.users.dashboard.event_plans',
            compact('eventPlans', 'user'));
    }
}
