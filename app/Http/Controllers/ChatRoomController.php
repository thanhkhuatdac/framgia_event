<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Events\LoadUserOnline;
use App\Events\LoadUserOffline;
use App\Events\ChatRoomMessage;
use App\Events\LoadTyping;
use App\Events\RemoveTyping;

class ChatRoomController extends Controller
{
    public function index($userId)
    {
        $user = User::getUser($userId)->first();

        return view('front.chat_room.chatRoom', compact('user'));
    }

    public function loadUser($userId, Request $request)
    {
        if (!$request->ajax()) {
            return view('errors.403');
        }
        $userOnlineId = $request->userId;
        $user = User::getUser($userOnlineId)->first();
        $data = view('front.chat_room._sections.userOnline', compact('user'))->render();

        event(new LoadUserOnline($data, $user->id));
    }

    public function userLeave($userId, Request $request)
    {
        if (!$request->ajax()) {
            return view('errors.403');
        }

        event(new LoadUserOffline($request->userId));
    }

    public function sendMessage($userId, Request $request)
    {
        if (!$request->ajax()) {
            return view('errors.403');
        }
        $content = $request->content;
        $user = User::getUser($userId)->first();
        $data = view('front.chat_room._sections.message', compact('user', 'content'))->render();

        event(new ChatRoomMessage($data, $user->id));
    }

    public function loadTyping($userId, Request $request)
    {
        if (!$request->ajax()) {
            return view('errors.403');
        }
        $user = User::getUser($userId)->first();
        $data = view('front.chat_room._sections.loadTyping', compact('user'))->render();

        event(new LoadTyping($data, $user->id));
    }

    public function removeTyping($userId, Request $request)
    {
        if (!$request->ajax()) {
            return view('errors.403');
        }

        event(new RemoveTyping($userId));
    }
}
