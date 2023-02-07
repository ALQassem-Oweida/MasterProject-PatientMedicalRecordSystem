<?php

namespace App\Http\Controllers;

use App\Models\JordanCoInsurance;
use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Support\Facades\Log;

class LandingController extends Controller
{
   

    public function index()
    {
        $date= date("Y-m-d");
        
        $InsuranceCo = JordanCoInsurance::paginate(4);


        try {
            $client = new Client();
            $response = $client->get("https://newsapi.org/v2/everything?q=medicine&from=".$date."&apiKey=f3fee882f416472ba39e7cc918bbc374STOP");
            $data = json_decode($response->getBody()->getContents(), true);
            // dd($data['articles'] );
            // dd($data['articles'][0]['content'] );
            return view('layouts.welcome', compact('data'),['InsuranceCo' => $InsuranceCo]);
        } catch (Exception $e) {
            $data['articles'][0]['description']="Sorry ! we are updating the news list at the moment.";
            $data['articles'][0]['source']['name']="Admin message";
            return view('layouts.welcome', compact('data'),['InsuranceCo' => $InsuranceCo]);
     
        }








      
    }
}
