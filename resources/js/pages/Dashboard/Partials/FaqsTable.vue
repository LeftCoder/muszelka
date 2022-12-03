<script lang="ts" setup>
import type { Faq } from '@/types'

interface Props {
  faqs: Faq[]
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
          <th scope="col" class="py-3 px-6">Pytanie</th>
          <th scope="col" class="py-3 px-6">Odpowiedź</th>
        </tr>
      </thead>
      <tbody>
        <tr
          v-for="faq in props.faqs"
          :key="faq.id"
          class="bg-white border-b dark:bg-slate-800 dark:border-slate-700"
        >
          <td class="py-4 px-6 text-ellipsis">
            <Link
              class="hover:underline"
              :href="`/dashboard/faq/${faq.id}/edit`"
              >{{ faq.question }}</Link
            >
          </td>
          <td class="py-4 px-6 text-ellipsis">
            {{ faq.answer }}
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>
