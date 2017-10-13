<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'r_email' => 'required|string|email|max:255|unique:users,email',
            'r_password' => 'required|string|min:6',
            'password_confirmation' =>'required|same:r_password',
            'phone' => 'required|min:10|unique:users,phone',
            'role' => 'required|in:freelancer,customer',
        ], [
            'r_email.required' => trans('register.email_req'),
            'r_email.string' => trans('register.email_str'),
            'r_email.email' => trans('register.email_e'),
            'r_email.max' => trans('register.email_max'),
            'r_email.unique' => trans('register.email_unique'),
            'r_password.required' => trans('register.password_req'),
            'r_password.string' => trans('register.password_str'),
            'r_password.min' => trans('register.password_min'),
            'password_confirmation.required'
                => trans('register.password_conf_req'),
            'password_confirmation.same'
                => trans('register.password_conf_same'),
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['r_email'],
            'password' => bcrypt($data['r_password']),
            'phone' => $data['phone'],
            'role' => $data['role'],
        ]);
    }
}
