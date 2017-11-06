<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RequestEvent;
use App\Models\Comment;
use App\Models\User;
use Auth;

class RequestEventController extends Controller
{
    public function showList($user_id)
    {
        $user = User::getUser($user_id)->first();
        $requestEvents = RequestEvent::getUserRequestEvents($user_id)->withCount('comments')->get();

        return view('front.users.dashboard.request_events.request_events',
            compact('requestEvents', 'user'));
    }

    public function getIndex($slug)
    {
        $requestEvent = RequestEvent::getRequestEvent($slug)
            ->with('comments', 'user', 'subject')->withCount('comments')->first();

        return view('front.request_events.index', compact('requestEvent'));
    }
}
