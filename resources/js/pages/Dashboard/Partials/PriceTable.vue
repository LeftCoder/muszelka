<script lang="ts" setup>
import type { Period } from '@/types'
import format from '@/utils/format'
import plDate from '@/utils/date'

interface Props {
  periods: Period[]
}

const props = defineProps<Props>()
</script>
<template>
  <div class="overflow-x-auto relative">
    <table class="w-full text-sm text-left text-slate-500 dark:text-slate-400">
      <thead
        class="text-xs text-slate-700 uppercase bg-slate-50 dark:bg-slate-700 dark:text-slate-400"
      >
        <tr>
          <th scope="col" class="py-3 px-6">Termin</th>
          <th scope="col" class="py-3 px-6 text-center">Mały domek</th>
          <th scope="col" class="py-3 px-6 text-center">Duży domek</th>
        </tr>
      </thead>
      <tbody>
        <tr
          v-for="period in props.periods"
          :key="period.id"
          class="bg-white border-b dark:bg-slate-800 dark:border-slate-700"
        >
          <th scope="col" class="py-3 px-6">
            <Link
              class="hover:underline"
              :href="`/dashboard/cennik/${period.id}/edit`"
            >
              {{ plDate(period.start) }} - {{ plDate(period.end) }}
            </Link>
          </th>
          <td class="py-4 px-6 text-center">
            {{ format(period.small) }}
          </td>
          <td class="py-4 px-6 text-center">
            {{ format(period.big) }}
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>
