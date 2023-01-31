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
    $error = NULL;
    if ($cityOrArea) {
      try {
        $weather = WeatherHelper::getCurrentWeather($cityOrArea);
      }
      catch(\Exception $e) {
        $error = $e->getMessage();
      }

    }
    return view('home')->with([
      'weather' => $weather,
      'cityOrArea' => $cityOrArea,
      'error' => $error,
    ]);

  }
}
