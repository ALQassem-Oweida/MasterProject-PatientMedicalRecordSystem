<?php
namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
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
    return view('user.userDashHome',['medicationsCount'=>$medicationsCount]);
  }
}