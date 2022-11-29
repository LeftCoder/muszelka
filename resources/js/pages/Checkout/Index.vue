<script lang="ts" setup>
import Heading from '@/layouts/Partials/Heading.vue'
import ReservationForm from '@/pages/Checkout/Partials/ReservationForm.vue'
import { ArrowSmallLeftIcon } from '@heroicons/vue/20/solid'
import { useRootStore } from '@/store'
import { computed } from 'vue'
import { usePage } from '@inertiajs/inertia-vue3'

const store = useRootStore()
const errors = computed(() => usePage<any>().props.value.errors)
</script>

<template>
  <Head>
    <title>Twoja Rezerwacja</title>
    <meta
      name="description"
      content="W tym miejscu uzupełnij swoję dane tak abyśmy mogli przyjąć Twoją rezerwację."
    />
  </Head>

  <Heading>
    <template #default>Twoja Rezerwacja</template>
    <template #slogan
      >Uzupełnij swoję dane tak abyśmy mogli przyjąć Twoją rezerwację.</template
    >
  </Heading>

  <div class="mb-64">
    <div class="flex flex-col sm:flex-row">
      <div class="flex flex-col sm:flex-1">
        <div class="mb-12">
          <h2 class="text-3xl font-bold text-gray-900 sm:pr-12">Data pobytu</h2>
          <p class="text-2xl text-gray-500 mt-2">
            {{ store.selectedDates }}
          </p>
          <div
            v-if="errors.start || errors.end"
            v-text="errors.start"
            class="text-red-500 text-xs mt-1"
          ></div>
        </div>

        <div class="mb-12">
          <h2 class="text-3xl font-bold text-gray-900 sm:pr-12">Domek</h2>
          <p class="text-2xl text-gray-500 mt-2">
            {{
              store.selectedApartmentName
                ? store.selectedApartmentName
                : 'Nie wybrano'
            }}
          </p>
          <div
            v-if="errors.apartment_id"
            v-text="errors.apartment_id"
            class="text-red-500 text-xs mt-1"
          ></div>
        </div>

        <div class="mb-12">
          <h2 class="text-3xl font-bold text-gray-900 sm:pr-12">
            Liczba dorosłych oraz dzieci
          </h2>
          <p class="text-2xl text-gray-500 mt-2">
            {{ store.guestsCout }}
          </p>
          <div
            v-if="errors.max"
            v-text="errors.max"
            class="text-red-500 text-xs mt-1"
          ></div>
        </div>

        <div class="mb-12">
          <h2 class="text-3xl font-bold text-gray-900 sm:pr-12">Zwierzęta</h2>
          <p class="text-2xl text-gray-500 mt-2">
            {{ store.reservation.animals ? 'Tak' : 'Nie' }}
          </p>
        </div>

        <div class="order-first sm:order-last mb-12 sm:mb-0">
          <Link
            href="/rezerwacje"
            class="inline-flex justify-center rounded-lg text-sm font-semibold py-2.5 px-4 bg-cyan-900 text-white hover:bg-cyan-700"
          >
            <ArrowSmallLeftIcon class="h-5 w-5 mr-2 text-white" />
            Zmień szczegóły rezerwacji
          </Link>
        </div>
      </div>

      <div class="flex flex-col sm:flex-1 justify-between">
        <ReservationForm />
      </div>
    </div>
  </div>
</template>