<script lang="ts" setup>
import Datepicker from '@/shared/Datepicker.vue'
import { MagnifyingGlassIcon } from '@heroicons/vue/24/outline/index.js'
import { useRootStore } from '@/store'
import { ref, watch } from 'vue'

const store = useRootStore()
const dates = ref({
  startDate: store.reservation.start,
  endDate: store.reservation.end,
})

watch(dates, (newDates) => {
  store.setReservationDates(newDates)
})
</script>

<template>
  <div class="w-full flex flex-col items-center justify-center my-12">
    <div
      class="bg-white border shadow-md w-10/12 sm:w-11/12 lg:w-9/12 rounded-lg"
    >
      <div class="py-8 px-6 flex flex-col sm:flex-row items-center gap-4">
        <div
          class="w-full lg:w-7/12 xl:border-r xl:mb-0 mb-4 border-gray-300 sm:pr-8"
        >
          <label
            for="dates"
            class="block mb-2 text-sm font-medium text-slate-900"
            >Data pobytu</label
          >
          <Datepicker v-model="dates" />
        </div>
        <div
          class="w-full lg:w-2/12 xl:border-r xl:mb-0 mb-4 border-gray-300 sm:pr-8"
        >
          <label
            for="adults"
            class="block mb-2 text-sm font-medium text-slate-900"
            >Dorośli</label
          >

          <input
            id="adults"
            class="bg-slate-50 border border-slate-300 text-slate-900 text-sm rounded-lg focus:ring-cyan-500 focus:border-cyan-500 block w-full p-2.5"
            type="number"
            v-model="store.reservation.adults"
            name="adults"
            min="1"
          />
        </div>
        <div class="w-full lg:w-2/12 border-gray-300 xl:mb-0 mb-4 sm:pr-8">
          <label
            for="children"
            class="block mb-2 text-sm font-medium text-slate-900"
            >Dzieci</label
          >
          <input
            id="children"
            class="bg-slate-50 border border-slate-300 text-slate-900 text-sm rounded-lg focus:ring-cyan-500 focus:border-cyan-500 block w-full p-2.5"
            type="number"
            v-model="store.reservation.children"
            name="children"
            min="0"
          />
        </div>
        <div
          class="w-full lg:w-1/12 block lg:flex lg:justify-center lg:self-end mt-4 lg:mt-0"
        >
          <Link href="/rezerwacje" title="Wybierz domek">
            <button
              class="flex justify-center w-full border md:text-2xl text-white rounded-lg text-lg bg-amber-500 hover:bg-amber-400 shadow-md font-semibold focus:outline-none md:px-6 px-6 md:py-4 py-3 xl:leading-4"
            >
              <MagnifyingGlassIcon class="w-6 h-6 block text-center" />
              <span class="sr-only">Wybierz domek</span>
            </button>
          </Link>
        </div>
      </div>
    </div>
  </div>
</template>
