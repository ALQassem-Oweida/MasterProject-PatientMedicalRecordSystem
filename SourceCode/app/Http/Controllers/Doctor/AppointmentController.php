<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Http\Requests\StoreappointmentRequest;
use App\Http\Requests\UpdateappointmentRequest;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Auth;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id=Auth::user()->id;
        $appointments=Appointment::where('doctor_id',$user_id)
        ->orderBy('status', 'asc')
        ->orderBy('date', 'asc')->orderByRaw('time + 0 asc')->paginate(5);
        return view('doctor.appointments',['appointments'=>$appointments]);
    }


    public function search(StoreappointmentRequest $request)
    {
        $user_id=Auth::user()->id;
        $query = $request->input('query');
        $appointments=Appointment::where('doctor_id',$user_id)
        ->orderBy('status', 'asc')
        ->where('national_id', 'like', "%$query%")
        ->orderBy('date', 'asc')->orderByRaw('time + 0 asc')->paginate(5);
        return view('doctor.appointments',['appointments'=>$appointments]);
    }


    public function getData(StoreappointmentRequest $request)
{
    $option = $request->statusCheck;
    $user_id=Auth::user()->id;
        $appointments= Appointment::where('doctor_id',$user_id)
        ->where('status', $option)
        ->orderBy('date', 'asc')->orderByRaw('time + 0 asc')->paginate(5);
    return view('doctor.appointments',['appointments'=>$appointments]);
}

    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreappointmentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreappointmentRequest $request)
    {
        
      
        $appointment = new Appointment();

        $appointment->user_id = $request->user_id;
        $appointment->doctor_id = $request->doctor_id;
        $appointment->national_id = $request->national_id;
        $appointment->FName = $request->FName;
        $appointment->LName = $request->LName;
        $appointment->phone = $request->phone;
        $appointment->date = $request->appointment_date;
        $appointment->time = $request->appointment_time;
        

        $appointment->save();

        return redirect('appointments')->with('success', 'Appointments Data Add successfully');




    }

   



    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateappointmentRequest  $request
     * @param  \App\Models\appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateappointmentRequest $request,$id)
    {
        Appointment::where('id', $id)->update([
            'date' => $request->appointment_date,
            'time' => $request->appointment_time
          
        ]);
   
        return redirect('appointments')->with('success', ' Appointment Data updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function destroy(UpdateappointmentRequest $request, $id)
    {
        Appointment::where('id', $id)->update([
            'status' => $request->statusSelctor,
        ]);
        return redirect('appointments')->with('success', 'Appointment status  updated successfully');
    }
}
