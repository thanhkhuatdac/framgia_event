<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EventPlan;
use App\Models\EventPlanDetail;
use App\Models\Review;
use App\Models\User;

class EventPlanController extends Controller
{
    public function getIndex($slug)
    {
        $eventPlan = EventPlan::getEventPlan($slug)->with('user', 'albums')
            ->withCount('reviews')->first();
        $user = User::getUser($eventPlan->user_id)->withCount('reviews', 'eventPlans')
            ->first();
        $planDetails = EventPlanDetail::getDetailOfPlan($eventPlan->id)->with('forkPlanServices')->get();

        $reviews = Review::getReviewsOfPlan($eventPlan->id)->with('user', 'comments')->get();

        $totalRate = array();
        foreach ($reviews as $review) {
            array_push($totalRate, $review->rate);
        }
        $avgRate = calculate_average(array_sum($totalRate), count($reviews));

        $relatedEventPlans = EventPlan::relatedEvents($eventPlan->subject_id, $eventPlan->id)
            ->take(4)->with('user')->get();

        return view('front.event_plans.index', compact('eventPlan', 'user', 'planDetails', 'reviews', 'avgRate', 'relatedEventPlans'));
    }
}
