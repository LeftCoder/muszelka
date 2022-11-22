<script lang="ts" setup>
import type { Apartment } from '@/types'
import { UsersIcon } from '@heroicons/vue/24/solid/index.js'
import ImageGallery from '@/shared/ImageGallery.vue'
import format from '@/utils/format'

interface Props {
  apartment: Apartment
}

const props = defineProps<Props>()
</script>

<template>
  <div class="block lg:flex bg-white border shadow-md rounded-lg">
    <div class="lg:flex-1 relative overflow-hidden rounded-lg bg-slate-100">
      <ImageGallery
        :images="props.apartment.images"
        :galleryId="props.apartment.id"
      />
    </div>
    <div class="lg:flex-1 flex flex-col justify-between p-8">
      <section>
        <div class="flex flex-col lg:flex-row lg:justify-between">
          <h2 class="text-3xl font-bold text-gray-900 sm:pr-12">
            {{ props.apartment.name }}
          </h2>

          <div
            class="h-9 my-4 lg:my-0 rounded-full inline-flex whitespace-nowrap px-3 bg-blue-50 text-blue-900 items-center text-md"
          >
            <UsersIcon class="h-6 w-6 mr-2" />
            max. {{ props.apartment.max }} osób/y
          </div>
        </div>

        <p class="text-2xl my-4 lg:my-0 text-gray-500 mt-2">
          {{ format(props.apartment.price) }} / doba
        </p>
      </section>

      <section class="my-8 lg:my-0">
        <p class="text-lg text-slate-500">{{ props.apartment.description }}</p>
      </section>

      <section>
        <div class="flex flex-wrap lg:flex-nowrap space-x-3 lg:justify-end">
          <span
            v-for="feature in props.apartment.features"
            :key="feature.id"
            class="bg-slate-100 text-slate-900 mb-2 text-md font-medium px-2.5 py-0.5 rounded-full"
            >{{ feature.name }}</span
          >
        </div>
      </section>
    </div>
  </div>
</template>
