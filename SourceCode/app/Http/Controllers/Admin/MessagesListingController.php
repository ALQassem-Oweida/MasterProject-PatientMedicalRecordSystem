<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\contactus;
use Illuminate\Http\Request;

class MessagesListingController extends Controller
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
        $messages = contactus::paginate(3);



        return view('admin.messagesList', compact('messages'));
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $messages = contactus::where('subject', 'like', "%$query%")->paginate(3);
        return view('admin.messagesList', compact('messages'));
    }


    public function getData(Request $request)
    {
        $option = $request->statusCheck;
        $messages = contactus::where('status', $option)->paginate(3);
        return view('admin.messagesList', compact('messages'));
    }


    public function updateStatus(Request $request)
    {


        if ($request->status == 1) {
            contactus::where('id', $request->id)
                ->update([
                    'status' => '0',
                ]);
            return redirect()->back()->with('success', 'Message status updated successfully');
        } else {
            contactus::where('id', $request->id)
                ->update([
                    'status' => '1',
                ]);
            return redirect()->back()->with('success', 'Message status updated successfully');
        }
    }
}
