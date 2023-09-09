<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class SearchWeatherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // 
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function getForecast(Request $request)
    {
        $endpoint = config('weather.open_weather.url');
        $token = config('weather.open_weather.token');
        $lat = $request->input('lat') ?? null;
        $lon = $request->input('lon') ?? null;
        $units = $request->input('units') ?? null;
        $weatherForecast = "{$endpoint}weather?lat={$lat}&lon={$lon}&appid={$token}&units={$units}";
        $headers = ['headers' => ['accept' => 'application/json']];
        $client = new Client();
        $weatherResponse = $client->get($weatherForecast, $headers);
        $forecasts = json_decode($weatherResponse->getBody());
        $openWeatherIcon = collect($forecasts->weather)->first()->icon;
        $skyCons = config("weather.icon_mapping.{$openWeatherIcon}");
        $forecasts->skycons = $skyCons;
        $forecasts->sys->sunrise = now()
            ->createFromTimestamp($forecasts->sys->sunrise)
            ->format('g:i A');
        $forecasts->sys->sunset = now()
            ->createFromTimestamp($forecasts->sys->sunset)
            ->format('g:i A');

        return $forecasts ?? [];
    }
}
