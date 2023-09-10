<?php

return [
    'open_weather' => [
        'url' => env('OPEN_WEATHER_URL', ''),
        'token' => env('OPEN_WEATHER_TOKEN', ''),
    ],
    'four_square' => [
        'url' => env('FOUR_SQUARE_URL', ''),
        'token' => env('FOUR_SQUARE_TOKEN', ''),
    ],
    'icon_mapping' => [
        '01d' => 'clear-day',
        '02d' => 'partly-cloudy-day',
        '03d' => 'cloudy',
        '04d' => 'cloudy',
        '09d' => 'rain',
        '10d' => 'showers-day',
        '11d' => 'thunder-showers-day',
        '13d' => 'snow',
        '50d' => 'fog',
        '01n' => 'clear-night',
        '02n' => 'partly-cloudy-night',
        '03n' => 'cloudy',
        '04n' => 'cloudy',
        '09n' => 'rain',
        '10n' => 'showers-night',
        '11n' => 'thunder-showers-night',
        '13n' => 'snow',
        '50n' => 'fog',
    ],
];