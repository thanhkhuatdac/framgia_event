<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;
use App\Models\EventPlan;

class SubjectController extends Controller
{
    public function index($subjectSlug)
    {
        $subject = Subject::getSubjectBySlug($subjectSlug)->first();
        $eventPlans = EventPlan::getEventPlanBySubject($subject->id)->with('user')->paginate(8);

        return view('front.subjects.index', compact('subject', 'eventPlans'));
    }
}
