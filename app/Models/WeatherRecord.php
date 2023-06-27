<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WeatherRecord extends Model
{
    use HasFactory;
    protected $fillable = ['temperature', 'humidity', 'weather_description', 'wind_speed'];

}
