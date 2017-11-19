<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\SocialAccountService;
use App\Models\User;
use App\Models\EventPlan;
use App\Models\RequestEvent;
use App\Models\EventPlanDetail;
use App\Models\ForkPlanService;
use App\Models\SocialLink;
use App\Models\Subject;
use App\Models\Category;
use App\Models\Service;
use App\Models\Album;
use App\Http\Requests\EditProfileRequest;
use App\Http\Requests\ChangePasswordRequest;
use Socialite;
use Auth;
use Response;
use Validator;
use Session;
use Carbon;
use Hash;

class UserController extends Controller
{
    public function getProfile($id)
    {
        $user = User::getUser($id)->withCount('requestEvents', 'eventPlans', 'comments', 'eventForks')
            ->with('socialLinks')->first();
        $topUsers = User::getTopFreelancers()->take(10)->get();

        return view('front.users.details.profile', compact('user', 'topUsers'));
    }

    public function getAllRequestEvents($userId)
    {
        $user = User::getUser($userId)->first();
        $topUsers = User::getTopFreelancers()->take(10)->get();
        $requestEvents = RequestEvent::getUserRequestEvents($userId)->paginate(7);

        return view('front.users.details.request_events', compact('user', 'topUsers', 'requestEvents'));
    }

    public function getAllEventPlans($userId)
    {
        $user = User::getUser($userId)->first();
        $topUsers = User::getTopFreelancers()->take(10)->get();
        $eventPlans = EventPlan::getUserEventPlans($userId)->paginate(7);

        return view('front.users.details.event_plans', compact('user', 'topUsers', 'eventPlans'));
    }

    public function getEditProfile($userId)
    {
        $user = User::getUser($userId)->first();
        $socialLinks = SocialLink::getByUser($userId)->get();

        $facebook = '';
        $instagram = '';
        $twitter = '';
        foreach ($socialLinks as $item) {
            if ($item->name == 'facebook') {
                $facebook = $item->link;
            }
            if ($item->name == 'instagram') {
                $instagram = $item->link;
            }
            if ($item->name == 'twitter') {
                $twitter = $item->link;
            }
        }

        return view('front.users.dashboard.profiles.edit',
            compact('user', 'facebook', 'instagram', 'twitter'));
    }
    public function postEditProfile($userId, EditProfileRequest $request)
    {
        $user = User::getUser($userId)->first();
        if($request->hasFile('image')){
            $image = $request->file('image');
            $imageName = str_random(4).'_'.$image->getClientOriginalName();

            while (file_exists(config('asset.image_path.user_ava').$imageName)) {
                $imageName = str_random(4).'_'.$image->getClientOriginalName();
            }

            upload_file($image, config('asset.image_path.user_ava'), $imageName);
            $user->image = $imageName;
        }
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->description = $request->description;
        $user->save();

        $facebook = SocialLink::getLink($userId, 'facebook')->first();
        if (!$facebook) {
            SocialLink::create([
                'user_id' => $userId,
                'name' => 'facebook',
                'link' => $request->facebook,
            ]);
        } else {
            $facebook->link = $request->facebook;
            $facebook->save();
        }

        $instagram = SocialLink::getLink($userId, 'instagram')->first();
        if (!$instagram) {
            SocialLink::create([
                'user_id' => $userId,
                'name' => 'instagram',
                'link' => $request->instagram,
            ]);
        } else {
            $instagram->link = $request->instagram;
            $instagram->save();
        }

        $twitter = SocialLink::getLink($userId, 'twitter')->first();
        if (!$twitter) {
            SocialLink::create([
                'user_id' => $userId,
                'name' => 'twitter',
                'link' => $request->twitter,
            ]);
        } else {
            $twitter->link = $request->twitter;
            $twitter->save();
        }

        return redirect()->back()->with('updated', 'Update user successfuly!');
    }

    public function getChangePassword($userId)
    {
        $user = User::getUser($userId)->first();

        return view('front.users.dashboard.profiles.change_password', compact('user'));
    }

    public function postChangePassword($userId, ChangePasswordRequest $request)
    {
        $user = User::getUser($userId)->first();
        if (!Hash::check($request->currentPassword, $user->password)) {
            return redirect()->back()->withErrors('The current password not exactly!');
        }

        $user->fill(['password' => Hash::make($request->newPassword)])->save();

        Auth::logout();
        Session::flush();

        return redirect()->route('home')
            ->with('updatedPass', 'Update Password successfuly, please Login again!');
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

    public function getDashboard($id)
    {
        $user = User::getUser($id)->first();

        return view('front.users.dashboard.index', compact('user'));
    }

    public function getDashboardEvents($id)
    {
        $user = User::getUser($id)->first();
        $eventPlans = EventPlan::getUserEventPlans($id)
            ->with('subject', 'eventForks')->withCount('eventForks')->get();

        return view('front.users.dashboard.event_plans',
            compact('eventPlans', 'user'));
    }

    public function getDashboardCreateEvent($id)
    {
        $user = User::getUser($id)->first();
        $subjects = Subject::getAllSubjects();

        return view('front.users.dashboard.create_event',
            compact('user', 'subjects'));
    }

    public function postDashboardCreateEvent($id, Request $request)
    {
        if ($request->subject != 'new') {
            $subjectId = $request->subject;
        } else {
            $subjectId = Subject::create([
                    'title' => $request->new_subject,
                    'slug' => str_slug($request->new_subject)
            ])->id;
        }

        $image = $request->file('image');
        $imageName = str_random(4).'_'.$image->getClientOriginalName();

        while (file_exists(config('asset.image_path.event_plan').$imageName)) {
            $imageName = str_random(4).'_'.$image->getClientOriginalName();
        }

        upload_file($image, config('asset.image_path.event_plan'), $imageName);

        $eventPlan = EventPlan::create([
                'title' => $request->title,
                'slug' => str_slug($request->title),
                'content' => $request->description,
                'user_id' => $id,
                'subject_id' => $subjectId,
                'image' => $imageName,
        ]);

        $album = $request->file('albums');

        foreach ($album as $item) {
            $itemName = str_random(4).'_'.$item->getClientOriginalName();

            while (file_exists(config('asset.image_path.album').$itemName)) {
                $itemName = str_random(4).'_'.$item->getClientOriginalName();
            }

            upload_file($item, config('asset.image_path.album'), $itemName);

            Album::create([
                'image' => $itemName,
                'event_plan_id' => $eventPlan->id,
            ]);
        }

        return redirect()->route('userDashboardCreateEventDetail',
            ['id' => $id, 'slug' => $eventPlan->slug])->with('created_event',
                'Event created successfuly, next, add new event details! ');
    }

    public function getCreateEventDetail($id, $slug)
    {
        $user = User::getUser($id)->first();
        $eventPlan = EventPlan::getEventPlanNoActive($slug)->first();

        return view('front.users.dashboard.create_event_detail',
            compact('user', 'eventPlan'));
    }

    public function postCreateEventDetail($id, Request $request)
    {
        if (Session::has('services')) {
            $eventPlanDetailId = EventPlanDetail::create([
                    'name' => $request->detail_name,
                    'start_date' => Carbon\Carbon::parse($request->detail_start_date)->format('Y-m-d H:i:s'),
                    'due_date' => Carbon\Carbon::parse($request->detail_due_date)->format('Y-m-d H:i:s'),
                    'amount' => $request->detail_amount,
                    'event_plan_id' => $request->detail_event_plan_id,
            ])->id;

            $eventPlan = EventPlan::find($request->detail_event_plan_id);
            $eventPlan->amount += $request->detail_amount;
            $eventPlan->save();

            foreach (Session::get('services') as $serviceId) {
                ForkPlanService::create([
                    'service_id' => $serviceId,
                    'event_plan_detail_id' => $eventPlanDetailId,
                ]);
            }

            $request->session()->forget('services');

            return redirect()->back()->with('addDetailSuccess', 'Add Event Detail
                Success, You can continue add Detail or Next Step Below');
        }
        return redirect()->back()->with('addDetailError', 'You have to add
                Services for Event Detail');
    }

    public function getLoadCategories($id)
    {
        $categories = Category::getAllCategories();

        return view('front.users.dashboard._section.categories',
                compact('categories'))->render();
    }

    public function getCreateEventService($id)
    {
        $user = User::getUser($id)->first();
        $categories = Category::getAllCategories();
        return view('front.users.dashboard._section.services',
            compact('user', 'categories'))->render();
    }

    public function postCreateEventService($id, Request $request)
    {
        if (!$request->ajax()) {
            return view('errors.403');
        }

        $this->validate($request, [
                'name' => 'required',
                'price' => 'required|numeric',
                'category' => 'required'
            ], [
                'name.required' => 'Services name required',
                'price.required' => 'Price required',
                'price.numeric' => 'Price have to number character',
                'category.required' => 'Category required'
            ]);

        if ($request->input('category') != 'new') {
            $categoryId = $request->input('category');
        } else {
            $this->validate($request, [
                'category_name' => 'unique:categories,name'
            ], [
                'category_name.unique' => 'Category name already exists!'
            ]);

            $categoryId = Category::create([
                    'name' => $request->input('category_name'),
                    'slug' => str_slug($request->input('category_name')),
            ])->id;
        }

        $service = Service::create([
            'name' => $request->input('name'),
            'price' => $request->input('price'),
            'description' => $request->input('description'),
            'category_id' => $categoryId,
        ]);

        $request->session()->push('services', $service->id);

        return Response(['service' => $service]);
    }

    public function showDemoEvent($id, $slug)
    {
        $eventPlan = EventPlan::getEventPlanNoActive($slug)->with('user', 'albums')
            ->withCount('reviews')->first();
        $user = User::getUser($eventPlan->user_id)->withCount('reviews', 'eventPlans')
            ->first();
        $planDetails = EventPlanDetail::getDetailOfPlan($eventPlan->id)->with('forkPlanServices')->get();

        return view('front.users.dashboard.show_demo_event',
            compact('user', 'eventPlan', 'planDetails'));
    }
}
