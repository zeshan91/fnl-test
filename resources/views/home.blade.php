<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Home Page</title>


        @vite(['resources/js/app.js'])
        <!-- Styles -->
        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body>
      <div class="container">

        <div class="card">
          <div class="card-header">
            Search By City
          </div>
          <div class="card-body">
            <form method="get" action="">
              <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">City Or Area</label>
                <input type="cityOrArea" class="form-control" id="cityOrArea"  name="cityOrArea" placeholder="City Or Area" value="{{ $cityOrArea }}">
              </div>
              <button type="submit" class="btn btn-primary">Search</button>
            </form>
          </div>

        </div>


        <div style="width:300px;margin:0 auto;">

          <div class="card shadow-0 border">
            <div class="card-body p-4">
              @isset($weather)
                <h4 class="mb-1 sfw-normal">{{ $cityOrArea }}</h4>
                <p class="mb-2">Current temperature: <strong>{{ $weather->getTemp() }}°C</strong></p>
                <p>Feels like: <strong>{{ $weather->getFeelsLike() }}°C</strong></p>
                <p>Max: <strong>{{ $weather->getMaxTemp() }}°C</strong>, Min: <strong>{{ $weather->getMinTemp() }}°C</strong></p>

                <div class="d-flex flex-row align-items-center">
                  <p class="mb-0 me-4">{{ $weather->getCloud() }}</p>
                  <img src="http://openweathermap.org/img/w/{{ $weather->getIcon() }}.png" class="weather-icon" />
                </div>
              @endisset

              <div id="error">
                {{ $error }}
              </div>

            </div>
          </div>
        </div>




      </div>
    </body>
</html>
