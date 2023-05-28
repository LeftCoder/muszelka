<script lang="ts" setup>
import TestimonialItem from '@/pages/Home/Partials/TestimonialItem.vue'
import AccentImage from '@/shared/AccentImage.vue'
import { Review } from '@/types'

interface Props {
  reviews: Review[]
}

const props = defineProps<Props>()
</script>

<template>
  <div class="mt-12 sm:mt-0 mb-24 lg:mb-64">
    <div class="w-full mb-24 text-center">
      <h2
        class="text-slate-900 font-extrabold text-4xl sm:text-5xl lg:text-6xl tracking-tight"
      >
        Co mówią nasi goście?
      </h2>
      <p class="mt-6 text-lg text-slate-600 text-center max-w-3xl mx-auto">
        Dowiedz się o nas trochę wiecej.
      </p>
    </div>
    <div class="relative">
      <AccentImage pos-x="left-[-40px]" pos-y="top-8" />

      <div
        class="grid grid-cols-1 gap-6 pt-6 items-start lg:gap-8 sm:grid-cols-2 lg:grid-cols-3 max-h-[33rem] overflow-hidden"
      >
        <TestimonialItem
          v-for="review in props.reviews"
          :key="review.id"
          :opinion="review.body"
          :sign="review.author"
        />
      </div>

      <AccentImage class="rotate-180" pos-x="right-[-20px]" pos-y="bottom-20" />

      <div
        class="inset-x-0 bottom-0 flex justify-center bg-gradient-to-t from-white pt-32 pb-8 pointer-events-none dark:from-slate-900 absolute"
      >
        <button
          type="button"
          class="border text-white rounded-lg text-lg bg-amber-500 hover:bg-amber-400 shadow-md font-semibold focus:outline-none md:px-6 px-6 md:py-4 py-3 xl:leading-4 flex items-center pointer-events-auto"
        >
          Zobacz więcej...
        </button>
      </div>
    </div>
  </div>
</template>
