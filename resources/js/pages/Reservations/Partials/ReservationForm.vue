<script lang="ts" setup>
import Datepicker from '@/shared/Datepicker.vue'
import { ref, watch } from 'vue'
import { useRootStore } from '@/store'
import { XMarkIcon } from '@heroicons/vue/20/solid/index.js'

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
  <div class="w-full flex-col flex items-center justify-center mb-12 lg:mb-32">
    <div
      class="bg-white border shadow-md w-10/12 sm:w-11/12 lg:w-9/12 rounded-lg"
    >
      <div class="py-8 px-6 flex flex-col lg:flex-row items-center gap-4">
        <div class="md:w-2/5 xl:border-r xl:mb-0 mb-4 border-gray-300 pr-8">
          <label
            for="datepicker"
            class="block mb-2 text-sm font-medium text-slate-900"
            >Data pobytu</label
          >
          <Datepicker id="datepicker" v-model="dates" />
        </div>
        <div class="md:w-1/5 xl:border-r xl:mb-0 mb-4 border-gray-300 pr-8">
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
        <div class="md:w-1/5 border-gray-300 xl:mb-0 mb-4">
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
        <div class="md:w-1/5 text-right">
          <Link href="/rezerwacje/checkout">
            <button
              type="button"
              class="border text-white rounded-lg text-lg bg-amber-500 hover:bg-amber-400 shadow-md font-semibold focus:outline-none md:px-6 px-6 md:py-4 py-3 xl:leading-4"
            >
              Zarezerwuj pobyt
            </button>
          </Link>
        </div>
      </div>

      <div class="pb-8 px-6">
        <label
          for="apartment"
          class="block mb-2 text-sm font-medium text-slate-900"
          >Nasze domki</label
        >
        <div class="flex items-center gap-4">
          <div class="md:w-3/5 flex relative">
            <select
              id="apartment"
              class="bg-slate-50 border border-slate-300 text-slate-900 text-sm rounded-lg focus:ring-cyan-500 focus:border-cyan-500 block w-full p-2.5"
              v-model="store.reservation.apartment_id"
              name="apartment_id"
            >
              <option
                selected
                disabled
                :value="-1"
                class="text-slate-500 placeholder-slate-500"
              >
                Wszystkie
              </option>
              <option
                v-for="apartment in store.apartments"
                :value="apartment.id"
                :key="apartment.id"
              >
                {{ apartment.name }}
              </option>
            </select>
            <button
              v-if="store.reservation.apartment_id !== -1"
              type="button"
              title="Pokaż wszystkie domki"
              @click="store.resetApartment"
              class="text-slate-900 absolute right-8 top-3"
            >
              <XMarkIcon class="h-5- w-5 text-slate-500" />
            </button>
          </div>
          <div class="md:w-2/5">
            <div class="flex items-center text-sm text-slate-500">
              <input
                type="checkbox"
                id="animals"
                v-model="store.reservation.animals"
                name="animals"
                class="w-4 h-4 text-cyan-600 focus:ring-cyan-500 bg-gray-100 mr-2 rounded border-gray-300 focus:ring-2"
              />
              <label
                class="hover:cursor-pointer hover:text-slate-900 inline-flex items-center"
                for="animals"
              >
                Zabieram ze sobą zwierzaka<span class="text-xl ml-3"
                  >🐶 🐱</span
                >
              </label>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
