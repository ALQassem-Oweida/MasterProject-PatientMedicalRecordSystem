<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\user_info;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class RegisterUserController extends Controller


{


    public function index()
    {

        $usersInfos = user_info::paginate(7);
        return view('Admin.newUser', ['usersInfos' => $usersInfos]);
    }



    public function getData(Request $request)
    {
        $option = $request->statusCheck;

        if ($option == "null") {
            $usersInfos = user_info::where('user_info_relation', null)
                ->paginate(7);
        } else {
            $usersInfos = user_info::whereNot('user_info_relation', "null")
                ->paginate(7);
        }


        return view('Admin.newUser', ['usersInfos' => $usersInfos]);
    }



    public function search(Request $request)
    {
        $query = $request->input('query');
        $usersInfos = user_info::where('national_id', 'like', "%$query%")
            ->paginate(7);

        return view('Admin.newUser', ['usersInfos' => $usersInfos]);
    }



    public function store(Request $request)
    {

        $request->validate([
            'national_id' => ['required', 'regex:/(^[0-9]+$)+/', 'min:10', 'max:10', 'unique:users', 'unique:user_infos'],
            'FName' => ['required', 'regex:(^[a-zA-Z ]+$)'],
            'MName' => ['required', 'regex:(^[a-zA-Z ]+$)'],
            'LName' => ['required', 'regex:(^[a-zA-Z ]+$)'],
            'date_of_birth' => ['required'],
            'address' => ['required'],
        ]);



        $user = user_info::create([

            'national_id' => $request->national_id,
            'FName' => $request->FName,
            'MName' => $request->MName,
            'LName' => $request->LName,
            'date_of_birth' => $request->date_of_birth,
            'address' => $request->address,

        ]);


        // $data = [
        //     'name' => $request->FName,
        //     'email' => $request->email,
        //     'ID'=> $request->national_id,
        // ];

        // Mail::send('Admin.UserInfoAdd', $data, function ($message) use ($data) {
        //     $message->to($data['email'], $data['name']);
        //     $message->subject('Your Login Details');
        // });

        return redirect()->back()->with('success', 'New User Infos add sucssessfuly');
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $request->validate([
            'national_id' => ['required', 'regex:/(^[0-9]+$)+/', 'min:10', 'max:10',
            Rule::unique('user_infos')->ignore($id),],
            'FName' => ['required', 'regex:(^[a-zA-Z ]+$)'],
            'MName' => ['required', 'regex:(^[a-zA-Z ]+$)'],
            'LName' => ['required', 'regex:(^[a-zA-Z ]+$)'],
            'date_of_birth' => ['required'],
            'address' => ['required'],
        ]);



        user_info::where('id', $id)->update([
            'national_id' => $request->national_id,
            'FName' => $request->FName,
            'MName' => $request->MName,
            'LName' => $request->LName,
            'date_of_birth' => $request->date_of_birth,
            'address' => $request->address,
        ]);

        if ($request->user_info_relation != null) {

            user::where('id', $request->user_info_relation)->update([
                'national_id' => $request->national_id,
            ]);
        }

        return redirect()->back()->with('success', 'User Infos  updated successfully');
    }
}
