<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Lcc\Weather\Weather;
class WeatherController extends Controller
{
    public function show(Request $request, $city)
    {
        return app('weather')->getWeather($city);
    }
}
