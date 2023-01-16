<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Home Page</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet">

        <!-- Styles -->
        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body>
      <div>


        <div style="width:300px;margin:0 auto;">
          <form method="get" action="">
            <div class="form-group">
              <label for="exampleInputEmail1">City Or Area</label>
              <input type="cityOrArea" class="form-control" name="cityOrArea" aria-describedby="cityOrArea" placeholder="Enter City or Area" value="{{ $cityOrArea }}">
              <small id="cityOrAreaHelp" class="form-text text-muted">Enter City or Area.</small>
            </div>
            <button type="submit" class="btn btn-primary">Search</button>
          </form>
        </div>

        @isset($weather)
        <h3 style="text-align:center;">Current Weather Info - {{ $cityOrArea }}</h3>
        <div style="width:300px;margin:0 auto;">
            <table class="table table-boredred">
              <tr>
                <td><b>Time:</b></td>
                <td>{{ $weather->getTime() }}</td>
              </tr>
              <tr>
                <td><b>Temprature:</b></td>
                <td>{{ $weather->getTemp() }}</td>
              </tr>
              <tr>
                <td><b>Feels Like:</b></td>
                <td>{{ $weather->getFeelsLike() }}</td>
              </tr>
              <tr>
                <td><b>Min temp:</b></td>
                <td>{{ $weather->getMinTemp() }}</td>
              </tr>
              <tr>
                <td><b>Max temp:</b></td>
                <td>{{ $weather->getMaxTemp() }}</td>
              </tr>
              <tr>
                <td><b>Pressure:</b></td>
                <td>{{ $weather->getPressure() }}</td>
              </tr>
              <tr>
                <td><b>Humidity:</b></td>
                <td>{{ $weather->getHumidity() }}</td>
              </tr>
            </table>
        </div>
        @endisset

      </div>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"></script>
    </body>
</html>
