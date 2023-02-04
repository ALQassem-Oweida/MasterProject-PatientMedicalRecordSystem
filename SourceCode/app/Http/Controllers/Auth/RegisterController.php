<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\user_info;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use function GuzzleHttp\default_ca_bundle;


class RegisterController extends Controller
{

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('guest');
    // }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {

        $user = user_info::where('national_id', $data['national_id'])->first();

        if ($user) {
            return Validator::make($data, [
                'national_id' => ['required', 'regex:/(^[0-9]+$)+/', 'min:10', 'max:10', 'unique:users'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8', 'max:12', 'confirmed'],
            ]);
        } else {
            return Validator::make($data, [
                'national_id' => ['required', 'regex:/(^[0-9]+$)+/','min:10', 'max:10', 'unique:users', 'in:This is is not avilable at oure system'],
            ], [
                'national_id.in' => 'This national ID is not available at our system',
            ]);
        }
    }
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {



        $user = User::create([
            'phone' => $data['phone'],
            'national_id' => $data['national_id'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'user_role' => $data['role'],
        ]);

        user_info::where('national_id', $data['national_id'])->update([
            'user_info_relation' => $user->id,
        ]);


        return  $user;
    }
}
