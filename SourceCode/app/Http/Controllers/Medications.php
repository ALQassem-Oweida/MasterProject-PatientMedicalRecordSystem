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
        $m_infos = medical_history::where('user_id',$user_id)->paginate(4);
       
 

        return view('Data.medications',['m_infos'=>$m_infos]);
    }





    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\user_role  $user_role
     * @return \Illuminate\Http\Response
     */
    public function show(user_role $user_role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\user_role  $user_role
     * @return \Illuminate\Http\Response
     */
    public function edit(user_role $user_role)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\user_role  $user_role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, user_role $user_role)
    {
        //
    }


}
