<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\File;
use App\Models\medical_history;
use App\Models\User;
use App\Models\User_info;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PatientListingController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('user_role', 2)->paginate(3);
        $user_infos = User_info::get()->all();
        return view('doctor.patientList', compact('users'));
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $users = User::where('national_id', 'like', "%$query%")->paginate(3);
        $user_infos = User_info::get()->all();

        return view('doctor.patientList',  compact('users'));
    }

  

  
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $users = User::where('id',$id)->get();
        $doctor=User_info::where('user_info_relation',Auth::user()->id)->get();
        $m_infos= medical_history::where('user_id',$id)->paginate(3);
        $files_infos =File::where('user_id',$id)->paginate(2);

        return view('doctor.patientDataPage', compact('users'),['m_infos'=>$m_infos,'files_infos'=> $files_infos]);
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'          => 'required',
            'email'   => 'required|email',
            'role'        => 'required',


        ]);
        User::where('id', $id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role
        ]);
        // return redirect()->route('users.index')->with('success','data has been updated successfully');
        return redirect('admin/users')->with('success', $request->name . ' User Data update successfully');
    }




    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $userDestroy = User::find($id);
        $userDestroy->destroy($id);
        return redirect('admin/usersList')->with('success', 'User Data deleted successfully');
    }
}
