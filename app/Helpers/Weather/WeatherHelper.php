<?php

namespace App\Helpers\Weather;

use GuzzleHttp\Client;
use App\Helpers\Weather\WeatherObject;
use Illuminate\Support\Facades\Cache;

class WeatherHelper
{


  public static function callWeatherAPI($type, $searchQ)
  {

    $cacheKey = md5($type . $searchQ);
    $value = Cache::get($cacheKey);
    if (!empty($value)) {
      return $value;
    }

    $urlBase = "https://api.openweathermap.org/data/2.5/{$type}";
    $client = new Client();
    $valid = TRUE;
    $weather = ['message' => 'Something went wrong'];
    try {
      $response = $client->request('GET', $urlBase, [
        'query' => "{$searchQ}&appid=858f15fed9292cbe25c341a754c55e45"]);
      $weather = json_decode($response->getBody(), TRUE);
    }
    catch(\Exception $e) {
      $valid = FALSE;
      $message = $e->getMessage();
    }

    $response = [
      'valid' => $valid,
      'weather' => $weather,
    ];
    Cache::put($cacheKey, $response, 3600);
    return $response;
  }

  public static function getCurrentWeather($cityOrArea)
  {
    $result = self::callWeatherAPI('weather', "q={$cityOrArea}");
    if ($result['valid']) {
      return new WeatherObject($result['weather']);
    }
    throw new \Exception("Error - " . $result['weather']['message']);
  }

  public static function getLastNDaysWeather($cityOrArea, $noOfDays = 5)
  {
    $response = self::callWeatherAPI('forecast', "q={$cityOrArea}&cnt={$noOfDays}");
    if ($response['valid']) {
      $weather = $response['weather'];
      $result = [];
      if (isset($weather['list']) && !empty($weather['list'])) {
        foreach ($weather['list'] as $dayWeather) {
          $result[] = new WeatherObject($dayWeather);
        }
      }
      return $result;
    }
    return $response;

  }

}
