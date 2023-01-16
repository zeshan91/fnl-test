<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\Weather\WeatherHelper;

class HomeController extends Controller
{
  public function index(Request $request)
  {
    $cityOrArea = $request->query('cityOrArea');
    $weather = NULL;
    if ($cityOrArea) {
      $weather = WeatherHelper::getCurrentWeather($cityOrArea);
    }
    return view('home')->with(['weather' => $weather, 'cityOrArea' => $cityOrArea]);

  }
}
