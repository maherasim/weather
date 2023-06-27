<?php

namespace App\Http\Controllers;
use App\Models\{Country,City,State};
use App\Models\WeatherRecord;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Nnjeim\World\World;

class DropDownController extends Controller
{
    public function index()
    {
        $action = World::countries();
    
        if ($action->success) {
            $countries = $action->data->pluck('name', 'id')->toArray();
        } else {
            $countries = [];
        }
    
        return view('dropdown', compact('countries'));
    }

    public function fatchState(Request $request)
    {
        $data['states'] = State::where('country_id',$request->country_id)->get(['name','id']);
 
        return response()->json($data);
    }
 
    public function fatchCity(Request $request)
    {
        $data['cities'] = City::where('state_id',$request->state_id)->get(['name','id']);
 
        return response()->json($data);
    } 

    public function storeWeatherData(Request $request)
{
    $cityName = $request->city_id;

    $response = Http::get('https://api.openweathermap.org/data/2.5/weather', [
        'appid' => '15f0561ec5c3d0c4d827a38fb88e476f',
        'q' => $cityName,
        'units' => 'metric',
    ]);

    $weatherData = $response->json();

    // Store the weather data in the database
    $weatherRecord = new WeatherRecord([
        'temperature' => $weatherData['main']['temp'],
        'humidity' => $weatherData['main']['humidity'],
        'weather_description' => $weatherData['weather'][0]['description'],
        'wind_speed' => $weatherData['wind']['speed'],
        // Add other fields as needed
    ]);

    $weatherRecord->save();

    // Optionally, you can return a response or redirect to another page
}
public function weather(Request $request)
{
    $cityName = $request->city_id;

    $response = Http::get('https://api.openweathermap.org/data/2.5/weather', [
        'appid' => '15f0561ec5c3d0c4d827a38fb88e476f',
        'q' => $cityName,
        'units' => 'metric',
    ]);

    $weatherData = $response->json();  
    $this->storeWeatherData($request); 
    return view('welcome', compact('weatherData'));
}
public function showWeatherRecords()
{
    $weatherRecords = WeatherRecord::all(); // Retrieve all weather records from the database
    return view('history', compact('weatherRecords'));
}
    
    

    

    
}
