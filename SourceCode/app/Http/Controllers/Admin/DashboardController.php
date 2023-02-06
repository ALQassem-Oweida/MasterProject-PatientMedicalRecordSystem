<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\contactus;
use App\Models\JordanCoInsurance;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller {
  public function __construct() {
    $this->middleware('auth');
  }
  public function index() {
    $usersCount = User::where('user_role',2)->count();
    $doctorsCount = User::where('user_role',3)->count();
    $Messages = contactus::count();
    $InsuranceCompanys = JordanCoInsurance::count();
    return view('admin/admindash',['usersCount'=>$usersCount,'doctorsCount'=>$doctorsCount,'Messages'=>$Messages,'InsuranceCompanys'=>$InsuranceCompanys]);
  }
}