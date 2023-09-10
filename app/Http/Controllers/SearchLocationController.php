<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class SearchLocationController extends Controller
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

    public function getGpsCoordinate(Request $request)
    {
        try {
            $keyword = $request->input('keyword') ?? 'Tokyo';
            $url = config("weather.four_square.url") . "?query={$keyword}&types=geo&limit=5";
            $headers = [
                'headers' => [
                    'Authorization' => config("weather.four_square.token"),
                    'accept' => 'application/json',
                ]
            ];
            $client = new Client();
            $response = $client->get($url, $headers);
            $data = json_decode($response->getBody());
            $countries = collect($data->results)->map(function ($row) {
                return [
                    "code" => $row->geo->name,
                    "name" => $row->geo->name,
                    "latitude" => $row->geo->center->latitude,
                    "longitude" => $row->geo->center->longitude,
                ];
            })
            ->values();
    
            return $countries ?? [];
        } catch (\Throwable $error) {
            logger()->error($error);

            return [];
        }
    }
}
