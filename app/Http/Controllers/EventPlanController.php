<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EventPlanController extends Controller
{
    public function getIndex()
    {
        return view('front.event_plans.index');
    }
}
