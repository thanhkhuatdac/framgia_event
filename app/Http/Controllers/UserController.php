<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\SocialAccountService;
use Socialite;

class UserController extends Controller
{
    public function getProfile()
    {
        return view('front.users.details.profile');
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
}
