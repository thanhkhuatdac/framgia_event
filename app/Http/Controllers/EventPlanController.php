<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EventPlan;
use App\Models\EventPlanDetail;
use App\Models\Review;
use App\Models\User;
use App\Models\Comment;
use App\Events\ReviewEvent;
use App\Events\ReplyReviewEvent01;
use App\Events\ReplyReviewEvent02;
use App\Http\Requests\EventPlanRequest;
use App\Http\Requests\ReplyReviewRequest;
use Auth;

class EventPlanController extends Controller
{
    public function getIndex($slug)
    {
        $eventPlan = EventPlan::getEventPlan($slug)->with('user', 'albums')
            ->withCount('reviews')->first();
        $user = User::getUser($eventPlan->user_id)->withCount('reviews', 'eventPlans')
            ->first();
        $planDetails = EventPlanDetail::getDetailOfPlan($eventPlan->id)->with('forkPlanServices')->get();

        $reviews = Review::getReviewsOfPlan($eventPlan->id)->with('user', 'comments')
            ->orderBy('id', 'DESC')->get();

        $relatedEventPlans = EventPlan::relatedEvents($eventPlan->subject_id, $eventPlan->id)
            ->take(4)->with('user')->get();

        return view('front.event_plans.index', compact('eventPlan', 'user', 'planDetails', 'reviews', 'relatedEventPlans'));
    }

    public function showAll()
    {
        $eventPlans = EventPlan::getAll()->with('user')->paginate(8);

        return view('front.event_plans.all', compact('eventPlans'));
    }

    public function search(Request $request)
    {
        if (!$request->ajax()) {
            return view('errors.403');
        }
        $eventPlans = EventPlan::search($request->keyword)->with('user')->get();
        $result = view('front.event_plans._sections.searchResult', compact('eventPlans'))->render();

        return $result;
    }

    public function addReview(EventPlanRequest $request)
    {
        if (!$request->ajax()) {
            return view('errors.403');
        }
        $review = Review::create([
            'user_id' => Auth::user()->id,
            'event_plan_id' => $request->eventPlanId,
            'rate' => $request->rate,
            'content' => $request->content,
        ]);
        $reviewView = view('front.event_plans._sections.review', compact('review'))->render();

        $reviews = Review::getReviewsOfPlan($request->eventPlanId)->get();
        $totalRate = array();
        foreach ($reviews as $review) {
            array_push($totalRate, $review->rate);
        }
        $avgRate = calculate_average(array_sum($totalRate), count($reviews));
        $eventPlan = EventPlan::getEventPlan($review->eventPlan->slug)->first();
        $eventPlan->total_rate = $avgRate;
        $eventPlan->save();

        event(new ReviewEvent($reviewView, $avgRate, count($reviews)));

        return 'Add Review Successfuly';
    }

    public function addReplyReview(ReplyReviewRequest $request)
    {
        if (!$request->ajax()) {
            return view('errors.403');
        }
        $comment = Comment::create([
            'user_id' => Auth::user()->id,
            'commentable_id' => $request->review_id,
            'commentable_type' => 'reviews',
            'content' => $request->content,
        ]);

        $commentView = view('front.event_plans._sections.reply', compact('comment'))->render();
        if ($request->from_chanel == '01') {
            event(new ReplyReviewEvent01($commentView, $request->review_id));
        }
        if ($request->from_chanel == '02') {
            event(new ReplyReviewEvent02($commentView, $request->review_id));
        }

        return 'Add Reply Review Successfuly';
    }

    public function getRemove($userId, $eventPlanId)
    {
        $eventPlan = EventPlan::find($eventPlanId);
        if (!$eventPlan) {
            return view('errors.403');
        }
        $eventPlan->delete();

        return redirect()->back()->with('removed', 'Remove Event Successfuly');
    }
}
