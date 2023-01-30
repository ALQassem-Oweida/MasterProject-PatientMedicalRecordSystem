<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\User;
use App\Models\user_info;
use Illuminate\Http\Request;


class RegisterDocotorController extends Controller
{


    public function store(Request $request)
    {

        $request->validate([
            'national_id' => ['required','regex:/(^[0-9]+$)+/','min:10','max:10','unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8','max:12','confirmed'],
        ]);
       
        $doctor = new User();
        $doctor->national_id = $request->national_id;
        $doctor->FName = $request->FName;
        $doctor->LName = $request->LName;
        $doctor->phone = $request->phone;
        $doctor->date = $request->appointment_date;
        $doctor->time = $request->appointment_time;
        $doctor->save();

        $doctorInfo=new user_info();

        $doctorInfo->national_id = $request->national_id;
        $doctorInfo->FName = $request->FName;
        $doctorInfo->MName = $request->MName;
        $doctorInfo->LName = $request->LName;
        $doctorInfo->date_of_birth = $request->date_of_birth;
        $doctorInfo->address = $request->address;
        $doctorInfo->user_info_relation= $request->user_info_relation ;
        $doctorInfo->save();

 
    }
}
