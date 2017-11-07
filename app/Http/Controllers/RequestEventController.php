<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CommentRequest;
use App\Events\CommentEvent;
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

    public function addComment($request_event_id, CommentRequest $request)
    {
        if (!$request->ajax()) {
            return view('errors.403');
        }
        $comment = Comment::create([
            'user_id' => Auth::user()->id,
            'commentable_id' => $request->request_event_id,
            'commentable_type' => 'request_events',
            'content' => $request->comment_content,
        ]);

        $commentView = view('front.request_events._sections.comment', compact('comment'))
            ->render();
        $commentsCount = count(Comment::getCommentsByRequestEvent($request_event_id)->get());
        event(new CommentEvent($commentView, $commentsCount));

        return 'Add Comment Successfuly';
    }
}
