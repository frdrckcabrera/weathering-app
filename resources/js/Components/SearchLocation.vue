<script setup>
import Multiselect from 'vue-multiselect';
import { ref, onMounted } from 'vue';
import axios from 'axios';

const selectedCountry = ref({
    code: 'Tokyo, Tōkyō, Japan',
    name: 'Tokyo, Tōkyō, Japan',
    latitude: '35.6895',
    longitude: '139.6917'
});
const countries = ref([]);

const searchLocation = (keyword) => {
    axios.post(`/api/get-gps-coordinate?keyword=${keyword}`)
    .then(response => {
        countries.value = response.data;
    });
};

const emit = defineEmits();

const searchWeather = (selected, id) => {
    axios.post(`/api/get-forecast?lat=${selected.latitude}&lon=${selected.longitude}&units=metric`)
    .then(response => {
        emit('getForecast', response.data);
        console.log(response.data);
    });
};

onMounted(() => {
    axios.post('/api/get-forecast?lat=35.6895&lon=139.6917&units=metric')
    .then(response => {
        emit('getForecast', response.data);
    });
})

</script>

<template>
    <div class="w-full max-w-screen-sm bg-white p-10 rounded-xl ring-8 ring-white ring-opacity-40">
        <div class="flex justify-between">
            <Multiselect
                label="name"
                track-by="code"
                v-model="selectedCountry"
                :searchable="true"
                :options="countries"
                @select="searchWeather"
                @search-change="searchLocation"
            ></Multiselect>
        </div>
    </div>
</template>

<style src="vue-multiselect/dist/vue-multiselect.css"></style>