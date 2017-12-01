<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EventPlan;
use App\Models\RequestEvent;
use App\Models\User;
use App\Models\Subject;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex()
    {
        $eventPlans = EventPlan::getAll()->take(6)->get();

        $freelancerCount = count(User::getAllFreelancers()->get());
        $customerCount = count(User::getAllCustomers()->get());
        $eventPlanCount = count(EventPlan::getAll()->get());
        $requestEventCount = count(RequestEvent::getAllRequestEvents()->get());

        return view('front.home_pages.index', compact('eventPlans', 'freelancerCount',
            'customerCount', 'eventPlanCount', 'requestEventCount'));
    }

    public function search(Request $request)
    {
        if (!$request->ajax()) {
            return view('errors.403');
        }
        $subjects = Subject::search($request->keyword)->get();
        $result = view('front.home_pages._sections.searchResult', compact('subjects'))->render();

        return $result;
    }

    public function allUsers()
    {
        $users = User::getAllNoAdmin()->paginate(12);

        return view('front.home_pages.all_users.all', compact('users'));
    }

    public function searchAllUsers(Request $request)
    {
        if (!$request->ajax()) {
            return view('errors.403');
        }
        $users = User::search($request->keyword)->get();
        $data = view('front.home_pages.all_users._sections.search_results', compact('users'))->render();

        return $data;
    }

    public function allFreelancers()
    {
        $users = User::getAllFreelancers()->paginate(12);

        return view('front.home_pages.all_users.freelancers', compact('users'));
    }

    public function allCustomers()
    {
        $users = User::getAllCustomers()->paginate(12);

        return view('front.home_pages.all_users.customers', compact('users'));
    }
}
