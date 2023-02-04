<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\User;
use App\Models\user_info;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterDocotorController extends Controller
{


    public function store(Request $request)
    {

        $request->validate([
            'national_id' => ['required', 'regex:/(^[0-9]+$)+/', 'min:10', 'max:10', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'max:12', 'confirmed'],
        ]);

        $user = User::create([

            'phone' => $request->phone,
            'national_id' => $request->national_id,
            'email' => $request->email,
            'password' => Hash::make($request->password),
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

        return redirect()->back()->with('success', 'New doctor data add sucssessfuly');
    }
}
