<script lang="ts" setup>
import { router } from '@inertiajs/vue3'
import type { Review, Toast } from '@/types'
import { inject } from 'vue'
import { Switch } from '@headlessui/vue'

interface Props {
  reviews: Review[]
}
const props = defineProps<Props>()
const toast = inject('toast') as Toast

const handleChange = (id: number, published: boolean) => {
  router.patch(
    `/dashboard/api/published/${id}`,
    {
      published: !published,
    },
    {
      onSuccess: () => {
        toast('Status zmieniony.')
      },
      only: ['reviews'],
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
          <th scope="col" class="py-3 px-6">Autor</th>
          <th scope="col" class="py-3 px-6">Treść opinii</th>
          <th scope="col" class="py-3 px-6 text-end">Opublikuj</th>
        </tr>
      </thead>
      <tbody>
        <tr
          v-for="review in props.reviews"
          :key="review.id"
          class="bg-white border-b dark:bg-slate-800 dark:border-slate-700"
        >
          <td class="py-4 px-6 text-ellipsis">
            <Link
              class="hover:underline"
              :href="`/dashboard/opinie/${review.id}/edit`"
              >{{ review.author }}</Link
            >
          </td>
          <td class="py-4 px-6 text-ellipsis">
            {{ review.body }}
          </td>
          <td class="py-4 px-6 text-end">
            <Switch
              :class="
                review.published
                  ? 'bg-blue-600'
                  : 'bg-slate-200 dark:bg-slate-700'
              "
              class="relative inline-flex h-6 w-11 items-center rounded-full"
              @click="handleChange(review.id, review.published)"
            >
              <span class="sr-only">Oznacz jako opublikowany</span>
              <span
                :class="review.published ? 'translate-x-6' : 'translate-x-1'"
                class="inline-block h-4 w-4 transform rounded-full bg-white transition"
              />
            </Switch>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>
