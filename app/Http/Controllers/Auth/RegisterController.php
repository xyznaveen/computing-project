<?php

namespace App\Http\Controllers\Auth;

use App\User;
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
    protected $redirectTo = '/home';

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
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'role' => 'required',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {

        $as = ( $data['role'] === 'admin' ) ? 0 : 1;

        $user = User::create([
            'name'          =>  $data['name'],
            'email'         =>  $data['email'],
            'profile_id'    =>  0,
            'password'      =>  bcrypt($data['password']),
        ]);

        $profile = \App\Profile::create([
            'address'           =>  'N/A',
            'user_id'           =>  $user->id,
            'phone_number'      =>  'N/A',
            'profile_url'       =>  'user/'.$user->id,
            'profile_image_url' =>  'N/A',
            'is_active'         =>  'true',
        ]);

        $user->role()->sync($as);

        return $user;
    }
}
