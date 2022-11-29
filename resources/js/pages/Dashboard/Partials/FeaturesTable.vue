<script lang="ts" setup>
import type { Feature } from '@/types'

interface Props {
  features: Feature[]
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
          <th scope="col" class="py-3 px-6">Nazwa udogodnienia</th>
        </tr>
      </thead>
      <tbody>
        <tr
          v-for="feature in props.features"
          :key="feature.id"
          class="bg-white border-b dark:bg-slate-800 dark:border-slate-700"
        >
          <td class="py-4 px-6">
            <Link
              class="hover:underline"
              :href="`/dashboard/udogodnienia/${feature.id}/edit`"
              >{{ feature.name }}</Link
            >
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>
