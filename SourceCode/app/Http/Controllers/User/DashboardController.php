<?php
namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\medical_history;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller {
  public function __construct() {
    $this->middleware('auth');
  }
  public function index() {

    $user_id=Auth::user()->id;
    $medicationsCount = medical_history::where('user_id',$user_id)->count();
    $appointmentsCountS = Appointment::where('user_id',Auth::user()->id)->where('status',0)->count();
    $appointmentsCountC = Appointment::where('user_id',Auth::user()->id)->where('status',1)->count();
    $appointmentsCountD = Appointment::where('user_id',Auth::user()->id)->where('status',2)->count();
    return view('user.userDashHome',['medicationsCount'=>$medicationsCount,'appointmentsCountS'=>$appointmentsCountS
  ,'appointmentsCountC'=>$appointmentsCountC,'appointmentsCountD'=>$appointmentsCountD
  ]);
  }
}