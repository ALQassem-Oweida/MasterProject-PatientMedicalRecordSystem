<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;

class LandingController extends Controller
{
   

    public function index()
    {

        $client = new Client();
        $response = $client->get('https://newsapi.org/v2/everything?q=modern&medicine&from=2023-01-01&sortBy=publishedAt&apiKey=f3fee882f416472ba39e7cc918bbc374');
        $data = json_decode($response->getBody()->getContents(), true);
        // print_r($data['articles'][0]['content'] );
        return view('layouts.welcome', compact('data'));
    }
}
