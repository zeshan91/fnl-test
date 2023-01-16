<?php

namespace App\Helpers\Weather;

use GuzzleHttp\Client;
use App\Helpers\Weather\WeatherObject;

class WeatherHelper
{


  public static function callWeatherAPI($cityOrArea, $type, $searchQ)
  {

    $urlBase = "https://api.openweathermap.org/data/2.5/{$type}";
    $client = new Client();

    $response = $client->request('GET', $urlBase, [
      'query' => "{$searchQ}&appid=858f15fed9292cbe25c341a754c55e45"]);

    $weather = json_decode($response->getBody(), true);
    return $weather;
  }

  public static function getCurrentWeather($cityOrArea)
  {
    $weather = self::callWeatherAPI($cityOrArea, 'weather', "q={$cityOrArea}");
    return new WeatherObject($weather);
  }

  public static function getLastNDaysWeather($cityOrArea, $noOfDays = 5)
  {
    $weather = self::callWeatherAPI($cityOrArea, 'forecast', "q={$cityOrArea}&cnt={$noOfDays}");
    $result = [];
    if (isset($weather['list']) && !empty($weather['list'])) {
      foreach ($weather['list'] as $dayWeather) {
        $result[] = new WeatherObject($dayWeather);
      }
    }
    return $result;
  }

}
