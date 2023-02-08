<?php

namespace App\Http\Controllers;

use App\Models\medical_history;
use App\Models\user_role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Medications extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id=Auth::user()->id;
        $m_infos = medical_history::where('user_id',$user_id)->whereNot('medication_name',null)->paginate(4);
       
 

        return view('Data.medications',['m_infos'=>$m_infos]);
    }





}
