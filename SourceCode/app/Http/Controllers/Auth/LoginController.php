<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

  use AuthenticatesUsers;

  /**
   * Where to redirect users after login.
   *
   * @var string
   */
  // protected $redirectTo = RouteServiceProvider::HOME;


  public function redirectTo()
  {

    if (!Auth::user()) {
      return '/';
    } else {



      $role = Auth::user()->user_role;
      switch ($role) {

        case 1:
          return '/admin_dashboard';
          break;

        case 2:
          return '/user_dashboard';
          break;

        case 3:
          return '/doctor_dashboard';
          break;

        default:
          return '/';
          break;
      }
    }
  }




  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
    $this->middleware('guest')->except('logout');
  }
}
