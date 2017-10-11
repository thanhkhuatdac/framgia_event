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
            'r_email.required' => 'The email field is required.',
            'r_email.string' => 'The email must be a valid email address.',
            'r_email.email' => 'The email must be a valid email address.',
            'r_email.max' => 'The email max 255 character.',
            'r_email.unique' => 'The email has been exists.',
            'r_password.required' => 'The password field is required.',
            'r_password.string' => 'The password not valid.',
            'r_password.min' => 'The password min 6 character.',
            'password_confirmation.required'
                => 'The password confirmation field is required.',
            'password_confirmation.same'
                => 'The password confirmation does not match.',
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
