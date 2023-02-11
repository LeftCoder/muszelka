<script lang="ts" setup>
import type { Apartment } from '@/types'
import PriceTableModal from '@/pages/Home/Partials/PriceTableModal.vue'
import { UsersIcon } from '@heroicons/vue/24/solid/index.js'
import ImageGallery from '@/shared/ImageGallery.vue'

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
        :gallery-id="props.apartment.id"
      />
    </div>
    <div class="lg:flex-1 flex flex-col lg:p-8 py-8 px-4">
      <section class="mb-12">
        <div class="flex flex-col lg:flex-row lg:justify-between mb-4">
          <h2 class="mb-4 lg:mb-0 text-3xl font-bold text-gray-900">
            {{ props.apartment.name }}
          </h2>

          <div
            class="mb-4 lg:mb-0 h-9 rounded-full w-max inline-flex whitespace-nowrap px-3 bg-blue-50 text-blue-900 items-center text-md"
          >
            <UsersIcon class="h-6 w-6 mr-2" />
            {{ props.apartment.max }} osób/y
          </div>
        </div>
        <PriceTableModal :button="true"></PriceTableModal>
        <div class="text-sm mt-4 text-slate-500">
          <ul class="list-disc list-inside marker:text-amber-500">
            <li>Ceny różnią się zależnie od wybranego terminu.</li>
            <li>Istnieje możliwość negocjacji ceny.</li>
            <li>Dodatkowa osoba to koszt 40 zł za dobę.</li>
          </ul>
        </div>
      </section>

      <section class="flex-1">
        <p class="text-lg text-slate-500">{{ props.apartment.description }}</p>
      </section>

      <section v-if="apartment.features" class="mt-16 lg:mt-0">
        <div class="flex flex-wrap lg:flex-nowrap lg:space-x-3 justify-end">
          <span
            v-for="feature in props.apartment.features"
            :key="feature.id"
            class="bg-slate-100 text-slate-900 mb-2 lg:mb-0 text-md font-medium px-3 py-1 mr-3 lg:mr-0 rounded-full"
            >{{ feature.name }}</span
          >
        </div>
      </section>
    </div>
  </div>
</template>
