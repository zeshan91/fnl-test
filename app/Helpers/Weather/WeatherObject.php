<?php

namespace App\Helpers\Weather;

class WeatherObject
{
  protected $jsonResult;

  public function __construct($json_result)
  {
    $this->jsonResult = $json_result;
  }

  public function getTime()
  {
    return $this->jsonResult['dt'];
  }

  public function getTemp()
  {
    return $this->jsonResult['main']['temp'];
  }

  public function getFeelsLike()
  {
    return $this->jsonResult['main']['feels_like'];
  }

  public function getMinTemp()
  {
    return $this->jsonResult['main']['temp_min'];
  }

  public function getMaxTemp()
  {
    return $this->jsonResult['main']['temp_max'];
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
}