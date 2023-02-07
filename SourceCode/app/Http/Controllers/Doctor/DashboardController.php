<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\medical_history;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }
  public function index()
  {



    $id = Auth::user()->id;
    $info = DB::table('user_infos')->where('user_info_relation', $id)->get();

    // dd($info);
    $appointmentsCount = Appointment::where('doctor_id', Auth::user()->id)->count();
    $patentsCount = medical_history::where('add_by', Auth::user()->id)->count();
    return view('doctor/doctorDash', [
      'appointmentsCount' => $appointmentsCount,
      'patentsCount' => $patentsCount,
      'info'=>$info


    ]);
  }
}
