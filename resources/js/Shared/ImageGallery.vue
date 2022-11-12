<script lang="ts" setup>
// @ts-ignore
import PhotoSwipeLightbox from 'photoswipe/lightbox'
import { onMounted, onUnmounted, ref } from 'vue'
import type { Image } from '@/types'

interface Props {
  images: Image[] | undefined
  galleryId: number
}

interface Lightbox {
  init: () => any
  destroy: () => any
  loadAndOpen: (id: number) => any
}

const props = defineProps<Props>()
let lightbox = ref<Lightbox | null>(null)

onMounted(() => {
  if (!lightbox.value) {
    lightbox.value = new PhotoSwipeLightbox({
      dataSource: props.images,
      pswpModule: () => import('photoswipe'),
    })

    lightbox.value?.init()
  }
})

onUnmounted(() => {
  if (lightbox.value) {
    lightbox.value.destroy()
    lightbox.value = null
  }
})

const openGallery = () => {
  lightbox.value?.loadAndOpen(0)
}
</script>

<template>
  <div
    @click="openGallery"
    :id="'gallery-' + props.galleryId"
    class="overflow-hidden relative"
  >
    <div
      class="absolute right-3 top-3 p-1 h-8 w-8 text-center text-white z-20 bg-amber-500 rounded-full"
    >
      {{ images.length }}
    </div>
    <div
      class="absolute inset-0 z-10 flex transition hover:opacity-0 hover:cursor-pointer"
    >
      <div class="absolute inset-0 bg-black opacity-50"></div>
    </div>
    <img
      :src="images[0].thumbnail"
      :alt="images[0].alt"
      loading="lazy"
      class="object-cover object-center aspect-square w-full h-full"
    />
  </div>
</template>
