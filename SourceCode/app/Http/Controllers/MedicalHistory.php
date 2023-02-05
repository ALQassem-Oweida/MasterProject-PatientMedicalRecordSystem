<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\medical_history;
use App\Models\user_role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MedicalHistory extends Controller
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
       
        return view('Data.medical_histories',compact('m_infos'));
    }


    public function medications()
    {
        $user_id=Auth::user()->id;
        $m_infos = medical_history::where('user_id',$user_id)->paginate(4);
        return view('Data.medications',['m_infos'=>$m_infos]);
    }





    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
          
        $recored = new medical_history();

        $recored->user_id = $request->user_id;
        $recored->add_by = $request->doctor_id;
        $recored->event_type = $request->event_type;
        $recored->event_description = $request->event_description;
        $recored->medication_name = $request->medication_name;
        $recored->event_date = $request->event_date;
        $recored->dosage = $request->dosage;
        $recored->frequency = $request->frequency;
        $recored->allergy = $request->allergy;
        $recored->add_by = $request->doctor_id;
        

        $recored->save();

        return redirect()->back()
        ->with('success',' A new recored add successfully');

        


    }

  


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\user_role  $user_role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    
        medical_history::where('id', $id)->update([
            'medication_name' => $request->medication_name,
            'dosage' => $request->dosage,
            'frequency' => $request->frequency,
            'allergy' => $request->allergy,
            'edited_by' => $request->doctor_id
          
        ]);
   
        return redirect()->back()->with('success', ' Recored Data updated successfully');





    }


}
