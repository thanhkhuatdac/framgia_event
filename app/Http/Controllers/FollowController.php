<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Follow;
use App\Events\FollowNotifEvent;
use App\Models\User;

class FollowController extends Controller
{
    public function follow($userId, Request $request)
    {
        if (!$request->ajax()) {
            return view('errors.403');
        }

        $checkFollow = Follow::findFollow($request->userFollowing, $request->userFollower)->first();
        if ($checkFollow) {
            return 'You has been follow this User !';
        }

        Follow::create([
            'follower_id' => $request->userFollower,
            'following_id' => $request->userFollowing,
        ]);

        $userFollowing = User::find($request->userFollowing);
        $notif = view('front.main_layouts._sections.followNotif', compact('userFollowing'))->render();
        event(new FollowNotifEvent($notif, $request->userFollower));

        return 'Follow user successfuly !';
    }

    public function unfollow($userId, Request $request)
    {
        if (!$request->ajax()) {
            return view('errors.403');
        }

        $checkFollow = Follow::findFollow($request->userFollowing, $request->userFollower)->first();
        if (!$checkFollow) {
            return 'Error, Nothing user to unfollow !';
        }

        Follow::deleteFollow($request->userFollowing, $request->userFollower);
        $userFollowing = User::find($request->userFollowing);
        $notif = view('front.main_layouts._sections.unfollowNotif', compact('userFollowing'))->render();
        event(new FollowNotifEvent($notif, $request->userFollower));

        return 'Unfollow user successfuly !';
    }

    public function listFollowing($userId)
    {
        $topUsers = User::getTopFreelancers()->withCount('eventPlans')->limit(10)->get();
        $user = User::getUser($userId)->withCount('requestEvents', 'eventPlans', 'comments', 'eventForks')
            ->with('socialLinks')->first();

        $following = Follow::findFollowing($userId)->get();
        $userFollowers = array();

        foreach ($following as $item) {
            array_push($userFollowers, User::getUser($item->follower_id)
                ->withCount('reviews', 'eventPlans', 'requestEvents', 'eventForks', 'comments')->first());
        }

        return view('front.users.follows.listFollowing', compact('topUsers', 'user', 'userFollowers'));
    }

    public function listFollower($userId)
    {
        $topUsers = User::getTopFreelancers()->withCount('eventPlans')->limit(10)->get();
        $user = User::getUser($userId)->withCount('requestEvents', 'eventPlans', 'comments', 'eventForks')
            ->with('socialLinks')->first();

        $follower = Follow::findFollower($userId)->get();
        $userFollowings = array();

        foreach ($follower as $item) {
            array_push($userFollowings, User::getUser($item->following_id)
                ->withCount('reviews', 'eventPlans', 'requestEvents', 'eventForks', 'comments')->first());
        }

        return view('front.users.follows.listFollower', compact('topUsers', 'user', 'userFollowings'));
    }
}
