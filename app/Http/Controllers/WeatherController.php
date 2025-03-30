<?php

namespace App\Http\Controllers;

use App\Models\Weather;
use Illuminate\Http\Request;

class WeatherController extends Controller
{
    public function index(Request $request)
    {
        $query = Weather::query();

        if ($request->has('city')) {
            $query->where('city', 'like', '%' . $request->city . '%');
        }

        $weatherData = $query->latest()->paginate(10);

        return view('weather.index', compact('weatherData'));
    }
}
