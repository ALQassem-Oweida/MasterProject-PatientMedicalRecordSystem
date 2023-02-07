<?php

namespace App\Http\Controllers;


use Exception;
use GuzzleHttp\Client;


class newsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $date= date("Y-m-d");
   


        try {
            $client = new Client();
            $response = $client->get("https://newsapi.org/v2/everything?q=medicine&from=".$date."&apiKey=f3fee882f416472ba39e7cc918bbc374STOP");
            $data = json_decode($response->getBody()->getContents(), true);
            // print_r($data['articles'][0]['content'] );
            return view('layouts.news', compact('data'));
        } catch (Exception $e) {
            $data['articles'][0]['description']="Sorry ! we are updating the news list at the moment.";
            $data['articles'][0]['source']['name']="Admin message";
            return view('layouts.news', compact('data'));
     
        }








      
    }

  
}
