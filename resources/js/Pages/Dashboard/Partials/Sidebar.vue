<script lang="ts" setup>
import { onMounted, ref } from 'vue'
import {
  FireIcon,
  HomeIcon,
  Squares2X2Icon,
} from '@heroicons/vue/24/solid/index.js'

const booked = ref(0)
onMounted(() => {
  window.axios.get(`/dashboard/api/booked`).then((result) => {
    booked.value = result.data.booked
  })
})
</script>
<template>
  <aside class="w-64" aria-label="Sidebar">
    <div
      class="overflow-y-auto py-4 px-3 bg-slate-500 dark:bg-slate-800 min-h-screen h-full"
    >
      <ul class="space-y-2">
        <li>
          <Link
            href="/dashboard"
            class="flex items-center p-2 text-base font-normal text-slate-900 rounded-lg dark:text-white hover:bg-slate-100 dark:hover:bg-slate-700"
            :class="{
              'bg-slate-100 dark:bg-slate-700':
                $page.component === 'Dashboard/Index',
            }"
          >
            <Squares2X2Icon class="w-6 h-6" />
            <span class="ml-3">Dashboard</span>
          </Link>
        </li>
        <li>
          <Link
            href="/dashboard/rezerwacje"
            class="flex items-center p-2 text-base font-normal text-slate-900 rounded-lg dark:text-white hover:bg-slate-100 dark:hover:bg-slate-700"
            :class="{
              'bg-slate-100 dark:bg-slate-700': $page.url.startsWith(
                '/dashboard/rezerwacje'
              ),
            }"
          >
            <FireIcon class="w-6 h-6" />
            <span class="flex-1 ml-3 whitespace-nowrap">Rezerwacje</span>
            <span
              v-if="booked !== 0"
              class="inline-flex justify-center items-center p-3 ml-3 w-3 h-3 text-sm font-medium text-blue-600 bg-blue-200 rounded-full dark:bg-blue-900 dark:text-blue-200"
              >{{ booked }}</span
            >
          </Link>
        </li>
        <li>
          <Link
            href="/dashboard/domki"
            class="flex items-center p-2 text-base font-normal text-slate-900 rounded-lg dark:text-white hover:bg-slate-100 dark:hover:bg-slate-700"
            :class="{
              'bg-slate-100 dark:bg-slate-700':
                $page.url.startsWith('/dashboard/domki'),
            }"
          >
            <HomeIcon class="h-6 w-6" />
            <span class="flex-1 ml-3 whitespace-nowrap">Domki</span>
          </Link>
        </li>
      </ul>
    </div>
  </aside>
</template>
