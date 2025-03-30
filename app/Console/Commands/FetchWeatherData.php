<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Weather;
use Illuminate\Support\Facades\Http;

class FetchWeatherData extends Command
{
    protected $signature = 'weather:fetch';
    protected $description = 'Fetch weather data from OpenWeatherMap API';

    public function handle(): void
    {
        $city = 'Chisinau';
        $apiKey = env('OPENWEATHER_API_KEY');
        $url = "https://api.openweathermap.org/data/2.5/weather?q={$city}&appid={$apiKey}&units=metric&lang=ru";

        $response = Http::get($url);

        if ($response->successful()) {
            Weather::create([
                'city' => $city,
                'response_json' => $response->json()
            ]);

            $this->info("Weather data for {$city} fetched successfully.");
        } else {
            $this->error("Failed to fetch weather data.");
        }
    }
}

