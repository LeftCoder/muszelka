<script lang="ts" setup>
import { GoogleMap, Marker, InfoWindow } from 'vue3-google-map'
const center = { lat: 54.508996, lng: 16.476286 }
const googleMapKey = import.meta.env.VITE_GOOGLE_MAPS_API_KEY
</script>

<template>
  <h2 class="text-white lg:text-5xl text-2xl font-bold mb-4">Mapa</h2>
  <GoogleMap
    :api-key="googleMapKey"
    style="width: 100%; height: 500px"
    :center="center"
    :zoom="15"
  >
    <Marker :options="{ position: center }" />
    <InfoWindow :options="{ position: center, offsetY: 10 }">
      <h3 class="text-lg tracking-wider font-semibold text-slate-900">
        Muszelka
      </h3>
      <p class="text-sm font-normal">ul. Nadmorska 12</p>
      <p class="text-sm font-normal">76-150 Wicie</p>
      <div class="flex justify-center mt-2">
        <a
          href="https://www.google.com/maps/dir//Domki+Letniskowe+MUSZELKA,+Nadmorska+12,+76-150+Wicie,+Polska/@54.509108,16.476964,17z/data=!4m9!4m8!1m0!1m5!1m1!1s0x46fe2dd841676f07:0x797a03c8aa3b641b!2m2!1d16.4762933!2d54.5088734!3e0?hl=pl"
          target="_blank"
        >
          <button
            class="border text-white rounded-lg text-lg bg-amber-500 hover:bg-amber-400 shadow-md font-semibold focus:outline-none px-3 py-2 xl:leading-4"
            type="button"
          >
            Wyznacz trasę
          </button>
        </a>
      </div>
    </InfoWindow>
  </GoogleMap>
</template>

<style scoped>
div[role='dialog'] button[draggable='false'] {
  visibility: hidden !important;
  display: none !important;
}
</style>
