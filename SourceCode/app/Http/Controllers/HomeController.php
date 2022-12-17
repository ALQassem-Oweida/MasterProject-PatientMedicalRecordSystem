<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   $user = Auth::user();
        $id=Auth::user()->id;
        $info=DB::table('user_infos')->where('user_info_relation', $id)->get();
        
        return view('home',['user' => $user,'info'=>$info]);
    }
}
