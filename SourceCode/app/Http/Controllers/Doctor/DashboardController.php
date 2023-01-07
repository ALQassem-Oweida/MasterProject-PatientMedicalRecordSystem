<?php
namespace App\Http\Controllers\Doctor;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller {
  public function __construct() {
    $this->middleware('auth');
  }
  public function index() {
    $usersCount = User::where('user_role',2)->count();
    return view('doctor/doctorDash',['usersCount'=>$usersCount]);
  }
}