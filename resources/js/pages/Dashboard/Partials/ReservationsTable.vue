<script lang="ts" setup>
import plDate from '@/utils/date'
import type { Reservation, Toast } from '@/types'
import StatusModal from '@/pages/Dashboard/Partials/StatusModal.vue'
import { router } from '@inertiajs/vue3'
import { inject } from 'vue'

interface Props {
  reservations: Reservation[] | undefined
}

const toast = inject('toast') as Toast
const props = defineProps<Props>()

const updateStatus = (status: number, id: number) => {
  router.patch(
    `/dashboard/api/status/${id}`,
    { status },
    {
      onSuccess: () => {
        toast('Status zmieniony.')
      },
      only: ['reservations'],
    }
  )
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
          <th scope="col" class="py-3 px-6">Email</th>
          <th scope="col" class="py-3 px-6 text-right">Telefon</th>
          <th scope="col" class="py-3 px-6 text-right">Liczba gości</th>
          <th scope="col" class="py-3 px-6">Domek</th>
          <th scope="col" class="py-3 px-6 text-right">Data zameldowania</th>
          <th scope="col" class="py-3 px-6 text-right">Data wyjazdu</th>
          <th scope="col" class="py-3 px-6 text-right">Doby pobytu</th>
        </tr>
      </thead>
      <tbody>
        <tr
          v-for="reservation in props.reservations"
          :key="reservation.id"
          class="bg-white dark:bg-slate-800"
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
          <td scope="row" class="py-4 px-6">
            <StatusModal
              :id="reservation.id"
              :status="reservation.status"
              @confirm="updateStatus"
            />
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
            {{ reservation.adults }} + {{ reservation.children }}
          </td>
          <td class="py-4 px-6">
            <Link
              class="hover:underline"
              :href="`/dashboard/domki/${reservation.apartment.id}/edit`"
              >{{ reservation.apartment.name }}</Link
            >
          </td>
          <td class="py-4 px-6 text-right">
            {{ plDate(reservation.start) }}
          </td>
          <td class="py-4 px-6 text-right">
            {{ plDate(reservation.end) }}
          </td>
          <td class="py-4 px-6 text-right">{{ reservation.days }}</td>
        </tr>
      </tbody>
    </table>
  </div>
</template>
