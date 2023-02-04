<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\user_info;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class RegisterDocotorController extends Controller
{


    public function store(Request $request)
    {

        $request->validate([
            'national_id' => ['required', 'regex:/(^[0-9]+$)+/', 'min:10', 'max:10', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            // 'password' => ['required', 'string', 'min:8', 'max:12', 'confirmed'],
        ]);

        $password = str::random(rand(8, 12));

        $user = User::create([

            'phone' => $request->phone,
            'national_id' => $request->national_id,
            'email' => $request->email,
            'password' => Hash::make($password),
            'user_role' => '3',
            'img' => "defultuserprofile.png",
            'status' => '1'

        ]);

        $user->userinfo()->create([
            'national_id' => $request->national_id,
            'FName' => $request->FName,
            'MName' => $request->MName,
            'LName' => $request->LName,
            'date_of_birth' => $request->date_of_birth,
            'address' => $request->address,
        ]);


        $data = [
            'name' => $request->FName,
            'email' => $request->email,
            'password' => $password,
            'ID'=> $request->national_id,
        ];
    
        Mail::send('Admin.emailpassword', $data, function ($message) use ($data) {
            $message->to($data['email'], $data['name']);
            $message->subject('Your Login Details');
        });

        return redirect()->back()->with('success', 'New doctor data add sucssessfuly');
    }
}
