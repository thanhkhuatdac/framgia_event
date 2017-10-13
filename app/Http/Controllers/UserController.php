<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\SocialAccountService;
use Socialite;
use Auth;
use App\Models\User;

class UserController extends Controller
{
    public function getProfile()
    {
        $user = User::getUser(Auth::user()->id)->first();
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

    public function getDashboard()
    {
        $user = User::getUser(Auth::user()->id)->first();
        return view('front.users.dashboard.index', compact('user'));
    }
}
