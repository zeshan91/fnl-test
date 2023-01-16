<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Helpers\Weather\WeatherHelper;


class CityWeatherController extends Controller {

  /**
   * City Weather controller
   */
  function index(Request $request) {
    $city_id = $request->query('city_id');
    if ($city_id) {
      $cities = DB::table('cities')->where('id', $city_id)->get();
    }
    else {
      $cities = DB::table('cities')->limit(5)->get();
    }
    $result = [];
    foreach ($cities as $city) {
      $city_name = $city->city_name;
      $weather = WeatherHelper::getLastNDaysWeather($city_name);
      $tempResult = [];
      foreach ($weather as $wObj) {
        $tempResult[] = $wObj->getMainData();
      }
      $result[$city_name] = $tempResult;
    }
    return response()->json($result);
  }
}