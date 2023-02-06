<?php

namespace App\Http\Controllers;

use App\Models\contactus;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class ContactUsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('layouts.contact');
    }

    /**

   
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'         => 'required|min:2|max:40',
            'email'        => 'required|email',
            'subject'      => 'required|min:3|max:15',
            'message'      => 'required|max:250|min:10'
        ]);

        $contact = new contactus();

        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->subject = $request->subject;
        $contact->message = $request->message;
        $contact->save();

        return redirect('/contactUs')->with('success', "Your message has been successfully delivered");
    }

}
