<script lang="ts" setup>
// @ts-ignore
import PhotoSwipeLightbox from 'photoswipe/lightbox'
import swipe_pl from '@/utils/swipe_pl'
import type { Image } from '@/types'
import { onMounted, onUnmounted, ref } from 'vue'
import 'photoswipe/style.css'

interface Props {
  images?: Image[]
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
  if (props.images?.length && !lightbox.value) {
    lightbox.value = new PhotoSwipeLightbox({
      dataSource: props.images,
      pswpModule: () => import('photoswipe'),
      ...swipe_pl,
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
      {{ props.images?.length ?? 0 }}
    </div>
    <div
      class="absolute inset-0 z-10 flex transition hover:opacity-0 hover:cursor-pointer"
    >
      <div class="absolute inset-0 bg-black opacity-50"></div>
    </div>
    <img
      v-if="props.images"
      :src="props.images[0]?.thumbnail ?? '/storage/images/default.jpg'"
      :alt="props.images[0]?.alt ?? 'Muszelka Wicie'"
      loading="lazy"
      class="object-cover object-center aspect-square w-full h-full"
    />
  </div>
</template>
