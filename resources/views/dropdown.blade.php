@extends('layouts.app')

@section('content')
<!doctype html>
<html lang="en">
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
    <title>Weather App</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }

        .container {
            max-width: 500px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        .form-group label {
            font-weight: bold;
        }

        .btn-primary {
            width: 100%;
        }

        .weather-info {
            text-align: center;
            margin-top: 20px;
            font-size: 18px;
            color: #333;
        }
    </style>
    </head>
    <body>
    <div class="container mt-4">
        <div class="row justify-content-center">
        <div class="col-md-12"> 
        <a href="{{ route('weather.records') }}" class="btn btn-danger">View Weather Records</a>
<br>
            <h2>Weather App</h2>
            <form method="POST" action="{{route('weather.show')}}">
                    @csrf
            <div class="form-group mb-3">
              

                <select name="country" id="country-dd" class="form-control" required>
    <option value="">Select a country</option>

    @foreach ($countries as $id => $name)
        <option value="{{ $id }}">{{ $name }}</option>
    @endforeach
</select>

            </div>
            <div class="form-group mb-3">
                <lable>Select State</lable>
                <select id="state-dd" class="form-control" required></select>
            </div>
            <div class="form-group mb-3">
            <lable>Select City</lable>
                <select id="city-id" name="city_id" class="form-control" required></select>
            </div>
            <div class="form-group">
                        <button type="submit" class="btn btn-primary">Get Weather</button>
                    </div>
            </form>
 
        </div>
        

        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
        $('#country-dd').change(function(event) {
            var idCountry = this.value;
            $('#state-dd').html('');
 
            $.ajax({
            url: "/api/fetch-state",
            type: 'POST',
            dataType: 'json',
            data: {country_id: idCountry,_token:"{{ csrf_token() }}"},
            success:function(response){
                $('#state-dd').html('<option value="">Select State</option>');
                $.each(response.states,function(index, val){
                $('#state-dd').append('<option value="'+val.id+'"> '+val.name+' </option>')
                });
                $('#city-id').html('<option value="">Select City</option>');
            }
            })
        });
        $('#state-dd').change(function(event) {
            var idState = this.value;
            $('#city-id').html('');
            $.ajax({
            url: "/api/fetch-cities",
            type: 'POST',
            dataType: 'json',
            data: {state_id: idState,_token:"{{ csrf_token() }}"},
            success:function(response){
                $('#city-id').html('<option value="">Select State</option>');
                $.each(response.cities,function(index, val){
                $('#city-id').append('<option value="'+val.id+'"> '+val.name+' </option>')
                });
            }
            })
        });
        $('#city-id').change(function(event) {
            var idCity = this.value;
            $('#weather-info').html('Loading...');

            $.ajax({
                url: "/api/fetch-weather",
                type: 'POST',
                dataType: 'json',
                data: { city_id: idCity, _token: "{{ csrf_token() }}" },
                success: function(response) {
                    $('#weather-info').html('Temperature: ' + response.main.temp + '°C');
                    // You can display additional weather information as needed
                }
            });
        });


        });
    </script>
</body>
</html>@endsection
