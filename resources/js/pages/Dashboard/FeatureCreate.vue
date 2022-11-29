<script lang="ts" setup>
import FeatureForm from '@/pages/Dashboard/Partials/FeatureForm.vue'
import { ChevronRightIcon, HomeIcon } from '@heroicons/vue/24/solid'
</script>

<script lang="ts">
import AuthenticatedLayout from '@/layouts/Authenticated.vue'

export default {
  layout: AuthenticatedLayout,
}
</script>
<template>
  <Head>
    <title>Dashboard | Nowe udogodnienie</title>
    <meta name="description" content="Lista rezerwacji" />
  </Head>

  <div class="flex items-center mb-4">
    <Link
      href="/dashboard/domki"
      class="flex items-center text-base p-2 font-normal text-slate-900 rounded-lg dark:text-white hover:bg-slate-100 dark:hover:bg-slate-700"
    >
      <HomeIcon class="h-6 w-6" />
    </Link>
    <ChevronRightIcon class="h-6 w-6 mx-1" />
    <h2 class="text-4xl font-extrabold dark:text-slate-100">
      Nowe udogodnienie
    </h2>
  </div>

  <div class="flex justify-center mt-24">
    <div class="w-full max-w-3xl">
      <div
        class="p-6 bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700 overflow-hidden"
      >
        <FeatureForm />
      </div>
    </div>
  </div>
</template>
