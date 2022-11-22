<script lang="ts" setup>
import { ref } from 'vue'
import { PlayCircleIcon, PauseIcon } from '@heroicons/vue/24/solid/index.js'

const player = ref<HTMLVideoElement | null>(null)
const playing = ref(false)

const play = () => {
  if (player.value?.paused) {
    player.value.play()
    playing.value = true
  } else {
    player.value?.pause()
    playing.value = false
  }
}

const fullScreen = () => {
  player.value?.requestFullscreen()
}
</script>

<template>
  <div
    class="relative group hover:cursor-pointer"
    @dblclick="fullScreen"
    @click="play"
  >
    <video
      ref="player"
      width="500"
      class="aspect-video shadow-xl rounded-xl"
      poster="/storage/images/video-poster.jpeg"
      preload="none"
    >
      <source src="/storage/muszelka_wicie.mp4" type="video/mp4" />
    </video>

    <div
      class="absolute left-[50%] top-[50%] translate-x-[-50%] translate-y-[-50%]"
    >
      <button type="button" title="Wystartuj lub zatrzymaj video">
        <PlayCircleIcon v-if="playing === false" class="w-32 h-32 text-white" />
        <PauseIcon
          v-if="playing === true"
          class="w-32 h-32 text-white opacity-0 group-hover:opacity-100 transition"
        />
      </button>
    </div>
  </div>
</template>
