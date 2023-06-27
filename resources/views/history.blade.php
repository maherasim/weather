<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
    <title>Weather App - History Data</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #E6F0FD;
            padding: 20px;
        }
        
        h3 {
            color: #303F9F;
        }
        
        .table {
            margin-top: 20px;
            background-color: #FFFFFF;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        
        .table th,
        .table td {
            padding: 10px;
            text-align: center;
        }
        
        .table th {
            background-color: #F5F5F5;
            font-weight: bold;
            color: #424242;
        }
        
        .table td {
            color: #616161;
        }
    </style>
</head>
<body>
    <div class="container">
        <h3>History Data</h3>
        <table class="table">
            <thead>
                <tr>
                    <th>Temperature</th>
                    <th>Humidity</th>
                    <th>Weather Description</th>
                    <th>Wind Speed</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($weatherRecords as $item)
                    <tr>
                        <td>{{ $item->temperature }}</td>
                        <td>{{ $item->humidity }}</td>
                        <td>{{ $item->weather_description }}</td>
                        <td>{{ $item->wind_speed }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
