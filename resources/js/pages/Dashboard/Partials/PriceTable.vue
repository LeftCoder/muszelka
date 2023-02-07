<script lang="ts" setup>
import type { Period } from '@/types'
import format from '@/utils/format'

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
          <th
            v-for="period in props.periods"
            :key="period.id"
            class="text-center"
          >
            <Link
              class="hover:underline"
              :href="`/dashboard/cennik/${period.id}/edit`"
            >
              <div class="mb-1">{{ period.start }}</div>
              <div>{{ period.end }}</div>
            </Link>
          </th>
        </tr>
      </thead>
      <tbody>
        <tr class="bg-white border-b dark:bg-slate-800 dark:border-slate-700">
          <th scope="col" class="py-3 px-6">Mały domek</th>
          <td
            v-for="period in props.periods"
            :key="period.id"
            class="py-4 px-6 text-center"
          >
            {{ format(period.small) }}
          </td>
        </tr>
        <tr class="bg-white border-b dark:bg-slate-800 dark:border-slate-700">
          <th scope="col" class="py-3 px-6">Duży domek</th>
          <td
            v-for="period in props.periods"
            :key="period.id"
            class="py-4 px-6 text-center"
          >
            {{ format(period.big) }}
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>
