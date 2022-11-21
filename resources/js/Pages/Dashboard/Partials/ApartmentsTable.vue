<script lang="ts" setup>
import type { Apartment, Toast } from '@/types'
import { inject } from 'vue'
import { Switch } from '@headlessui/vue'
import { Inertia } from '@inertiajs/inertia'
import NoItems from '@/Shared/NoItems.vue'

interface Props {
  apartments: Apartment[]
}

const Toast = inject('toast') as Toast
const props = defineProps<Props>()

const handleChange = (id: number, occupied: boolean) => {
  Inertia.patch(
    `/dashboard/api/occupied/${id}`,
    {
      occupied: !occupied,
    },
    {
      onSuccess: () => {
        Toast('Status zmieniony.')
      },
      only: ['apartments'],
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
          <th scope="col" class="py-3 px-6">Nazwa domku</th>
          <th scope="col" class="py-3 px-6">Cena wynajmu (zł)</th>
          <th scope="col" class="py-3 px-6">Maksymalna l. gości</th>
          <th scope="col" class="py-3 px-6">Ostatnia rezerwacja</th>
          <th scope="col" class="py-3 px-6 text-right">Onacz jako wynajęty</th>
        </tr>
      </thead>
      <tbody>
        <tr
          v-for="apartment in props.apartments"
          :key="apartment.id"
          class="bg-white border-b dark:bg-slate-800 dark:border-slate-700"
        >
          <td class="py-4 px-6">
            <Link
              class="hover:underline"
              :href="`/dashboard/domki/${apartment.id}/edit`"
              >{{ apartment.name }}</Link
            >
          </td>
          <td class="py-4 px-6 text-right">
            {{ apartment.price }}
          </td>
          <td class="py-4 px-6 text-right">
            {{ apartment.max }}
          </td>
          <td class="py-4 px-6">
            {{
              apartment.last_reservation
                ? `${apartment.last_reservation?.name} ${apartment.last_reservation?.surname}`
                : '...'
            }}
          </td>
          <td class="py-4 px-6 text-right">
            <Switch
              @click="handleChange(apartment.id, apartment.occupied)"
              :class="
                apartment.occupied
                  ? 'bg-blue-600'
                  : 'bg-slate-200 dark:bg-slate-700'
              "
              class="relative inline-flex h-6 w-11 items-center rounded-full"
            >
              <span class="sr-only">Oznacz jako wynajęty</span>
              <span
                :class="apartment.occupied ? 'translate-x-6' : 'translate-x-1'"
                class="inline-block h-4 w-4 transform rounded-full bg-white transition"
              />
            </Switch>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>
