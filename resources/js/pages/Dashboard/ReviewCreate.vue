<script lang="ts" setup>
import ReviewForm from '@/pages/Dashboard/Partials/ReviewForm.vue'
import { ArrowSmallLeftIcon } from '@heroicons/vue/24/solid/index.js'
</script>

<script lang="ts">
import AuthenticatedLayout from '@/layouts/AuthenticatedLayout.vue'

export default {
  layout: AuthenticatedLayout,
}
</script>
<template>
  <Head>
    <title>Dashboard | Nowa opinia</title>
    <meta name="description" content="Nowa opinia" />
  </Head>

  <div class="flex items-center mb-4">
    <Link
      href="/dashboard/opinie"
      class="flex items-center text-base p-2 font-normal text-slate-900 rounded-lg dark:text-white hover:bg-slate-100 dark:hover:bg-slate-700 mr-2"
    >
      <ArrowSmallLeftIcon class="h-6 w-6 text-blue-500" />
    </Link>
    <h2 class="text-2xl lg:text-4xl font-extrabold dark:text-slate-100">
      Nowa opinia
    </h2>
  </div>

  <div class="flex justify-center mt-12">
    <div class="w-full lg:max-w-3xl">
      <div
        class="p-6 bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700 overflow-hidden"
      >
        <ReviewForm />
      </div>
    </div>
  </div>
</template>
