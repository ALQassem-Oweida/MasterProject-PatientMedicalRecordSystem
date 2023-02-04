<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Http\Requests\StoreappointmentRequest;
use App\Http\Requests\UpdateappointmentRequest;
use App\Models\User;
use App\Models\user_info;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Auth;


class userAppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id=Auth::user()->id;
        $appointments=Appointment::where('user_id',$user_id)
        ->orderBy('status', 'asc')
        ->orderBy('date', 'asc')->orderByRaw('time + 0 asc')->paginate(5);
        

  
        return view('user.userAppointments',compact('appointments'));
    }


    public function search(StoreappointmentRequest $request)
    {
        $user_id=Auth::user()->id;
        $query = $request->input('query');
        $appointments=Appointment::where('user_id',$user_id)
        ->orderBy('status', 'asc')
        ->where('date', 'like', "%$query%")
        ->orderBy('date', 'asc')->orderByRaw('time + 0 asc')->paginate(5);
   
        return view('user.userAppointments',compact('appointments'));
    }


    public function getData(StoreappointmentRequest $request)
{
    $option = $request->statusCheck;
    $user_id=Auth::user()->id;
        $appointments= Appointment::where('user_id',$user_id)
        ->where('status', $option)
        ->orderBy('date', 'asc')->orderByRaw('time + 0 asc')->paginate(5);
    return view('user.userAppointments',compact('appointments'));
}

    

}
