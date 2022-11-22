<script lang="ts" setup>
import VideoPlayer from '@/pages/Home/Partials/VideoPlayer.vue'
</script>

<template>
  <div class="hidden sm:flex sm:mt-12 lg:mt-0 mb-8 lg:mb-32">
    <div class="flex-1 flex flex-col justify-center items-center">
      <div>
        <h1
          class="text-center lg:text-left col-start-1 row-start-2 mt-4 max-w-[36rem] text-4xl font-extrabold tracking-tight sm:text-7xl xl:max-w-[43.5rem] text-cyan-900"
        >
          Muszelka
        </h1>
        <p class="text-white font-semibold text-right sm:text-xl">
          domki do wynajęcia nad morzem
        </p>
      </div>
    </div>
    <div class="hidden lg:flex-1 lg:flex lg:justify-center lg:items-center">
      <VideoPlayer />
    </div>
  </div>
</template>
