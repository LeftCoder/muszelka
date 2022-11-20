<script lang="ts" setup>
import * as dayjs from 'dayjs'
import type { Reservation, ReservationStatus } from '@/types'

interface Props {
  reservations: Reservation[] | undefined
}
const props = defineProps<Props>()

const colors = (status: ReservationStatus) => {
  switch (status) {
    case 'Przyjęta':
      return 'bg-blue-100 text-blue-800 dark:bg-blue-200 dark:text-blue-800'
    case 'Potwierdzona':
      return 'bg-amber-100 text-amber-800 dark:bg-amber-200 dark:text-amber-900'
    case 'Anulowana':
      return 'bg-slate-100 text-slate-800 dark:bg-slate-700 dark:text-slate-300'
    case 'Zakończona':
      return 'bg-cyan-100 text-cyan-800 dark:bg-cyan-200 dark:text-cyan-900'
  }
}

const formatDate = (date: string) => {
  return dayjs(date).format('DD.MM.YYYY')
}
</script>
<template>
  <div class="overflow-x-auto relative">
    <table class="w-full text-sm text-left text-slate-500 dark:text-slate-400">
      <thead
        class="text-xs text-slate-700 uppercase bg-slate-50 dark:bg-slate-700 dark:text-slate-400"
      >
        <tr>
          <th scope="col" class="py-3 px-6">Nr rezerwacji</th>
          <th scope="col" class="py-3 px-6">Osoba rezerwująca</th>
          <th scope="col" class="py-3 px-6">Status</th>
          <th scope="col" class="py-3 px-6">Domek</th>
          <th scope="col" class="py-3 px-6">Email</th>
          <th scope="col" class="py-3 px-6">Telefon</th>
          <th scope="col" class="py-3 px-6">Liczba gości</th>
          <th scope="col" class="py-3 px-6">Data zameldowania</th>
          <th scope="col" class="py-3 px-6">Data wyjazdu</th>
          <th scope="col" class="py-3 px-6">Doby pobytu</th>
        </tr>
      </thead>
      <tbody>
        <tr
          v-for="reservation in props.reservations"
          class="bg-white dark:bg-slate-800"
          :key="reservation.id"
        >
          <td scope="row" class="py-4 px-6 whitespace-nowrap">
            {{ `${reservation.number}` }}
          </td>
          <th
            scope="row"
            class="py-4 px-6 font-medium text-slate-900 whitespace-nowrap dark:text-white"
          >
            {{ `${reservation.name} ${reservation.surname}` }}
          </th>
          <td scope="row" class="inline-flex py-4 px-6">
            <span
              class="text-xs font-semibold px-2.5 py-0.5 rounded"
              :class="colors(reservation.status)"
              >{{ reservation.status }}</span
            >
          </td>
          <td class="py-4 px-6">
            <Link class="hover:underline" href="/dashboard/domki">{{
              reservation.apartment_id
            }}</Link>
          </td>
          <td class="py-4 px-6">
            <a class="hover:underline" :href="`mail:${reservation.email}`">{{
              reservation.email
            }}</a>
          </td>
          <td class="py-4 px-6 text-right">
            <a class="hover:underline" :href="`tel:${reservation.phone}`">{{
              reservation.phone
            }}</a>
          </td>
          <td class="py-4 px-6 text-right">
            {{ reservation.adults + reservation.children }}
          </td>
          <td class="py-4 px-6 text-right">
            {{ formatDate(reservation.start) }}
          </td>
          <td class="py-4 px-6 text-right">
            {{ formatDate(reservation.end) }}
          </td>
          <td class="py-4 px-6 text-right">{{ reservation.days }}</td>
        </tr>
      </tbody>
    </table>
  </div>
</template>
