<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\user_info;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Symfony\Contracts\Service\Attribute\Required;

class UserPublicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $id=Auth::user()->id;
        $info=DB::table('user_infos')->where('user_info_relation', $id)->get();
        if(Auth::user()->user_role===1)
        return view('admin/Profile', ['user' => $user,'info'=>$info]);
        else if (Auth::user()->user_role===3)
        return view('doctor/doctor_Profile', ['user' => $user,'info'=>$info]);
        else 
        return view('user/userProfile', ['user' => $user,'info'=>$info]);
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
        $user = Auth::user();
        $user = User::find($user->id);
        $request->validate([
            'name' => ['string', 'max:255'],
            'email' => ['string', 'email', 'max:255'],
        ]);

        if ($request->img != "") {
            $user_img = time() . '.' . request()->img->getClientOriginalExtension();
            request()->img->move(public_path('images'), $user_img);
        } else {
            $user_img = $request->hidden_img;
        }

        
     
        User::where('id', $id)->update([
            'email' => $request->email,
            'phone' => $request->phone,
            'img' =>$user_img

          

        ]);

        user_info::where('user_info_relation', $id)->update([
            'address'=>$request->address

        ]);

        

      
        return redirect('userprofile')->with('success', $request->name . ' User Data update successfully');
    }


           /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $bookingDestroy = Booking::find($id);
        // $bookingDestroy->destroy($id);
        // return redirect('userprofile')->with('success', 'Reservation Data deleted successfully');
    }
}
