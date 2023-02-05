<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class userFilesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::user()->id;
        $files_infos = File::where('user_id', $id)->paginate(5);
        return view('user.userFiles', ['files_infos' => $files_infos]);
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $files_infos = File::where('file_name', 'like', "%$query%")->paginate(5);
        return view('user.userFiles',  ['files_infos' => $files_infos]);
    }


    public function getData(Request $request)
    {
        $user_id = Auth::user()->id;

        $option = $request->typeCheck;

        if ($option == 'pdf') {
            $files_infos = File::where('user_id', $user_id)
                ->where('file_type', 'pdf')
                ->paginate(5);
        } else {
            $files_infos = File::where('user_id', $user_id)
                ->whereNot('file_type', 'pdf')
                ->paginate(5);
        }

        // dd($option);

        return view('user.userFiles', ['files_infos' => $files_infos]);
    }
}
