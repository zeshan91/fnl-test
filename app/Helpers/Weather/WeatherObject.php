<?php

namespace App\Helpers\Weather;
use Carbon\Carbon;

class WeatherObject
{
  protected $jsonResult;

  public function __construct($json_result)
  {
    $this->jsonResult = $json_result;
  }

  public function getTime()
  {
    $timestamp = $this->jsonResult['dt'];
    return Carbon::createFromTimestamp($timestamp)->format('Y-m-d H:i:s');
  }

  public function getTemp()
  {
    return round($this->jsonResult['main']['temp'] / 10);
  }

  public function getFeelsLike()
  {
    return round($this->jsonResult['main']['feels_like'] / 10);
  }

  public function getMinTemp()
  {
    return round($this->jsonResult['main']['temp_min'] / 10);
  }

  public function getMaxTemp()
  {
    return round($this->jsonResult['main']['temp_max'] / 10);
  }

  public function getPressure()
  {
    return $this->jsonResult['main']['pressure'];
  }

  public function getHumidity()
  {
    return $this->jsonResult['main']['humidity'];
  }

  public function getMainData()
  {
    return $this->jsonResult['main'];
  }

  public function getIcon()
  {
    return $this->jsonResult['weather'][0]['icon'];
  }

  public function getCloud()
  {
    return $this->jsonResult['weather'][0]['main'];
  }
}