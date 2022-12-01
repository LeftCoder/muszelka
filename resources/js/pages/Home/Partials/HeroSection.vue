<script lang="ts" setup>
import VideoPlayer from '@/pages/Home/Partials/VideoPlayer.vue'
</script>

<template>
  <div class="flex sm:mt-12 lg:mt-0 mb-0 sm:mb-8 lg:mb-32">
    <div class="flex-1 flex flex-col justify-center items-center">
      <div class="mr-0 sm:mr-8">
        <h1
          style="text-shadow: 0 -3px 0 rgba(0, 0, 0, 0.3)"
          class="text-center drop-shadow-xl text-white col-start-1 row-start-2 max-w-[36rem] text-6xl sm:text-7xl font-extrabold tracking-tight xl:max-w-[43.5rem]"
        >
          Muszelka
        </h1>
        <p
          class="text-slate-900 drop-shadow-xl text-center text-xl font-semibold leading-[2.5rem] sm:text-2xl"
        >
          Domki nad morzem.
        </p>
      </div>
    </div>
    <div class="hidden lg:flex-1 lg:flex lg:justify-center lg:items-center">
      <VideoPlayer />
    </div>
  </div>
</template>
