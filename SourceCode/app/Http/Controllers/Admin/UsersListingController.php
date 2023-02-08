<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\User_info;
use Illuminate\Http\Request;

class UsersListingController extends Controller
{

    public function __construct() {
        $this->middleware('auth');
      }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('user_role',2)->paginate(10);
        $user_infos=User_info::get()->all();
        return view('admin.usersList',compact('users'));
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $users = User::where('national_id', 'like', "%$query%")
        ->where('user_role',2)->paginate(10);
        $user_infos = User_info::get()->all();

        return view('admin.usersList',compact('users'));
    }
  




    public function getData(Request $request)
{
    $option = $request->statusCheck;
  
        $users= User::where('user_role',2)
        ->where('status', $option)
        ->paginate(5);
    return view('admin.usersList',['users'=>$users]);
}



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {


    if($request->status==1){
        User::where('id', $id)
        ->update([
            'status' => '0',
        ]);
        return redirect()->back()->with('success', 'User Disabled successfully');
    }else{
        User::where('id', $id)
        ->update([
            'status' => '1',
        ]);
        return redirect()->back()->with('success', 'User Enabled successfully');
    }
}
}
