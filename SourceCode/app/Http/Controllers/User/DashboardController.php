<?php
namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\medical_history;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller {
  public function __construct() {
    $this->middleware('auth');
  }
  public function index() {

    $user_id=Auth::user()->id;
    $info=DB::table('user_infos')->where('user_info_relation', $user_id)->get();

// dd($info);
    $medicationsCount = medical_history::where('user_id',$user_id)->count();
    $appointmentsCountS = Appointment::where('user_id',Auth::user()->id)->where('status',0)->count();
    $appointmentsCountC = Appointment::where('user_id',Auth::user()->id)->where('status',1)->count();
    $appointmentsCountD = Appointment::where('user_id',Auth::user()->id)->where('status',2)->count();
    return view('user.userDashHome',['medicationsCount'=>$medicationsCount,'appointmentsCountS'=>$appointmentsCountS
  ,'appointmentsCountC'=>$appointmentsCountC,'appointmentsCountD'=>$appointmentsCountD,'info'=>$info
  ]);
  }
}