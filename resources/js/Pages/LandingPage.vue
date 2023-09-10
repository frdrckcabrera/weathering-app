<script setup>
import { Head } from '@inertiajs/vue3';
import { onMounted, ref } from 'vue';
import SearchLocation from '../Components/SearchLocation.vue';

const displayForecast = ref({
    main: {
        temp: 0
    },
    name: 'Manila',
    sys: {
        country: 'PH'
    },
    wind: {
        deg: '',
        gust: '',
        speed: ''
    },
    weather: [{
        main: '',
        description: ''
    }],
    clouds: {
        all: ''
    },
    rain_per_hr: 0
});

const fetchIcons = (iconId, iconName) => {
    let skycons = new Skycons({ 'monochrome': false });
    skycons.add(iconId, iconName);
    skycons.play();
}

const setForecast = (response) => {
    displayForecast.value = response;
    fetchIcons('mainIcon', response.skycons);
}

onMounted(() => {
    fetchIcons('mainIcon', 'clear-day');
    fetchIcons('windIcon', 'wind');
    fetchIcons('sunriseIcon', 'clear-day');
    fetchIcons('sunsetIcon', 'clear-night');
    fetchIcons('cloudIcon', 'cloudy');
    fetchIcons('rainIcon', 'rain');
})
</script>

<template>
    <Head title="Weathering App" />
    <div class="flex flex-col items-center justify-center w-screen min-h-screen text-gray-700 p-10 bg-gradient-to-br from-yellow-200 via-orange-200 to-red-400">
    <!-- Component Start -->
    <SearchLocation @get-forecast="setForecast"></SearchLocation>
    <div class="w-full max-w-screen-sm bg-white p-10 mt-10 rounded-xl ring-8 ring-white ring-opacity-40">
        <div class="flex justify-between ml-5 mr-5">
            <div class="flex flex-col">
                <span class="text-6xl font-bold">{{ parseInt(displayForecast.main.temp) }}°C</span>
                <span class="text-lg font-semibold mt-1 text-gray-500">
                    {{ displayForecast.name }}, {{ displayForecast.sys.country }}
                </span>
                <span class="text-xs text-gray-400">
                    Feels like {{ parseInt(displayForecast.main.feels_like) }}°C. {{ displayForecast.weather[0].main }}, {{ displayForecast.weather[0].description }}
                </span>
                <span class="text-xs text-gray-400">
                    Humidity: {{ displayForecast.main.humidity }}% Visibility: {{ displayForecast.visibility / 1000 }}km
                </span>
            </div>
            <canvas id="mainIcon" width="128" height="128"></canvas>
        </div>
        <div class="flex justify-between mt-12">
            <div class="flex flex-col items-center">
                <span class="font-semibold text-md">Sunrise</span>
                <canvas id="sunriseIcon" width="32" height="32"></canvas>
                <span class="text-xs text-gray-400">{{ displayForecast.sys.sunrise }}</span>
            </div>
            <div class="flex flex-col items-center">
                <span class="font-semibold text-md">Sunset</span>
                <canvas id="sunsetIcon" width="32" height="32"></canvas>
                <span class="text-xs text-gray-400">{{ displayForecast.sys.sunset }}</span>
            </div>
            <div class="flex flex-col items-center">
                <span class="font-semibold text-md">Clouds</span>
                <canvas id="cloudIcon" width="32" height="32"></canvas>
                <span class="text-xs text-gray-400">{{ displayForecast.clouds.all }} %</span>
            </div>
            <div class="flex flex-col items-center">
                <span class="font-semibold text-md">Rain</span>
                <canvas id="rainIcon" width="32" height="32"></canvas>
                <span class="text-xs text-gray-400">{{ displayForecast.rain_per_hr }}mm</span>
            </div>
            <div class="flex flex-col items-center">
                <span class="font-semibold text-md">Wind</span>
                <canvas id="windIcon" width="32" height="32"></canvas>
                <span class="text-xs text-gray-400">Degree: {{ displayForecast.wind.deg }} </span>
                <span class="text-xs text-gray-400">Speed: {{ displayForecast.wind.speed }} </span>
                <span class="text-xs text-gray-400">Gust: {{ displayForecast.wind.gust }} </span>
            </div>
        </div>
    </div>
<!-- Component End  -->

    </div>
</template>
