<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weather</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #E6F0FD;
            padding: 20px;
            text-align: center;
        }
        
        h2 {
            color: #303F9F;
        }
        
        .weather-info {
            margin: 20px auto;
            width: 300px;
            padding: 20px;
            background-color: #FFFFFF;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        
        .weather-info p {
            margin: 10px 0;
            font-size: 16px;
            color: #424242;
        }
        
        .weather-info .failed {
            color: #FF0000;
        }
        
        .weather-icon {
            width: 80px;
            height: 80px;
            margin: 0 auto 20px;
        }
        
        .weather-icon img {
            width: 100%;
            height: 100%;
        }
    </style>
</head>
<body>
    <h2>Weather Information</h2>
    <div class="weather-info">
        @if ($weatherData)
            <div class="weather-icon">
                <img src="https://openweathermap.org/img/wn/{{ $weatherData['weather'][0]['icon'] }}.png" alt="Weather Icon">
            </div>
            <p><strong>Temperature:</strong> {{ $weatherData['main']['temp'] }}°C</p>
            <p><strong>Humidity:</strong> {{ $weatherData['main']['humidity'] }}%</p>
            <p><strong>Weather Description:</strong> {{ $weatherData['weather'][0]['description'] }}</p>
            <p><strong>Wind Speed:</strong> {{ $weatherData['wind']['speed'] }} m/s</p>
            <!-- Add more data fields as needed -->
        @else
            <p class="failed">Failed to fetch weather data.</p>
        @endif
    </div>



  


</body>
</html>
