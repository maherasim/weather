<?php

use App\Http\Controllers\DropDownController;
use App\Http\Controllers\WeatherController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Auth::routes();

// Route::get('/',[DropDownController::class,'index']);
Route::post('api/fetch-state',[DropDownController::class,'fatchState']);
Route::post('api/fetch-cities',[DropDownController::class,'fatchCity']);
Route::post('/weather',[DropDownController::class,'weather'])->name('weather.show');

Route::post('/api/fetch-weather', [WeatherController::class, 'weather'])->name('fetch-weather');
Route::get('/weather-records', [DropDownController::class, 'showWeatherRecords'])->name('weather.records');



Route::get('/', [DropDownController::class, 'index'])->name('home')->middleware('auth');
