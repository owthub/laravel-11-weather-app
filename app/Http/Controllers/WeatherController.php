<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class WeatherController extends Controller
{
    public function index(Request $request){

        $weatherResponse = [];

        if($request->isMethod("post")){

           $cityName = $request->city;

           $response = Http::withHeaders([
            "X-RapidAPI-Host" => "open-weather13.p.rapidapi.com",
            "X-RapidAPI-Key" => "1ea347413fmsh03e29ab308d2bbap194100jsna287f1c71c65"
           ])->get("https://open-weather13.p.rapidapi.com/city/{$cityName}");

           $weatherResponse = $response->json();
        }

        return view("weather", [
            "data" => $weatherResponse
        ]);
    }
}
