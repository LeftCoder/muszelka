<script lang="ts" setup>
import { onMounted, ref } from 'vue'
import {
  BellAlertIcon,
  HomeIcon,
  GiftIcon,
  Squares2X2Icon,
  QuestionMarkCircleIcon,
} from '@heroicons/vue/24/solid/index.js'

interface ResponseData {
  booked: number
}

const booked = ref(0)
onMounted(() => {
  window.axios.get<ResponseData>(`/dashboard/api/booked`).then(({ data }) => {
    booked.value = data.booked
  })
})
</script>
<template>
  <aside
    class="w-64 hidden lg:block bg-slate-500 dark:bg-slate-800"
    aria-label="Sidebar"
  >
    <div class="overflow-y-auto py-4 px-3">
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
            <Squares2X2Icon class="w-6 h-6 dark:text-blue-400 text-slate-700" />
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
            <BellAlertIcon class="w-6 h-6 dark:text-blue-400 text-slate-700" />
            <span class="flex-1 ml-3 whitespace-nowrap">Rezerwacje</span>
            <span
              v-if="booked !== 0"
              class="inline-flex justify-center items-center p-3 ml-3 w-3 h-3 text-sm font-medium text-blue-600 bg-blue-200 rounded-full"
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
            <HomeIcon class="h-6 w-6 dark:text-blue-400 text-slate-700" />
            <span class="flex-1 ml-3 whitespace-nowrap">Domki</span>
          </Link>
        </li>
        <li>
          <Link
            href="/dashboard/udogodnienia"
            class="flex items-center p-2 text-base font-normal text-slate-900 rounded-lg dark:text-white hover:bg-slate-100 dark:hover:bg-slate-700"
            :class="{
              'bg-slate-100 dark:bg-slate-700': $page.url.startsWith(
                '/dashboard/udogodnienia'
              ),
            }"
          >
            <GiftIcon class="h-6 w-6 dark:text-blue-400 text-slate-700" />
            <span class="flex-1 ml-3 whitespace-nowrap">Udogodnienia</span>
          </Link>
        </li>
        <li>
          <Link
            href="/dashboard/faq"
            class="flex items-center p-2 text-base font-normal text-slate-900 rounded-lg dark:text-white hover:bg-slate-100 dark:hover:bg-slate-700"
            :class="{
              'bg-slate-100 dark:bg-slate-700':
                $page.url.startsWith('/dashboard/faq'),
            }"
          >
            <QuestionMarkCircleIcon
              class="h-6 w-6 dark:text-blue-400 text-slate-700"
            />
            <span class="flex-1 ml-3 whitespace-nowrap">Faq</span>
          </Link>
        </li>
      </ul>
    </div>
  </aside>
</template>
