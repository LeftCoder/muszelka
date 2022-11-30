<script lang="ts" setup>
// @ts-ignore
import PhotoSwipeLightbox from 'photoswipe/lightbox'
import type { Image, Toast } from '@/types'
import { onMounted, onUnmounted, ref, inject } from 'vue'
import swipe_pl from '@/utils/swipe_pl'
import 'photoswipe/style.css'
import NoItems from '@/shared/NoItems.vue'
import { MinusIcon } from '@heroicons/vue/20/solid/index.js'
import { Inertia } from '@inertiajs/inertia'

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
const Toast = inject('toast') as Toast

onMounted(() => {
  if (props.images?.length && !lightbox.value) {
    lightbox.value = new PhotoSwipeLightbox({
      gallery: '#gallery-' + props.galleryId,
      children: 'a',
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

const deleteImage = (image: number, event: MouseEvent) => {
  const element = event.target as HTMLElement
  if (element.tagName === 'BUTTON' || element.tagName === 'svg') {
    event.stopPropagation()
    event.preventDefault()

    Inertia.delete(`/dashboard/api/delete/${image}`, {
      onSuccess: () => {
        Toast('Zdjęcie usunięte.')
      },
      only: ['apartment'],
    })
  }
}
</script>

<template>
  <div v-if="props.images?.length">
    <div :id="'gallery-' + props.galleryId" class="grid grid-cols-3 gap-2">
      <a
        v-for="image in props.images"
        :key="image.id"
        :href="image.src"
        :data-pswp-width="image.width"
        :data-pswp-height="image.height"
        target="_blank"
        @click="deleteImage(image.id, $event)"
        class="overflow-hidden relative"
        rel="noreferrer"
      >
        <button
          type="button"
          class="absolute right-2 top-2 p-1 h-8 w-8 grid place-items-center z-30 text-white bg-red-500 rounded-full"
        >
          <MinusIcon class="h-4 w-4 text-white" />
        </button>

        <div
          class="absolute inset-0 z-10 flex transition hover:opacity-0 hover:cursor-pointer"
        >
          <div class="absolute inset-0 bg-black opacity-50"></div>
        </div>
        <img
          :src="image.thumbnail"
          :alt="image.alt"
          loading="lazy"
          class="object-cover object-center aspect-square"
        />
      </a>
    </div>
  </div>

  <NoItems v-else>
    <h2 class="text-2xl text-slate-900 dark:text-slate-100">
      Brak zdjęć do wyświetlenia.
    </h2></NoItems
  >
</template>
