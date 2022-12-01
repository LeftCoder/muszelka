<script lang="ts" setup>
import ApartmentForm from '@/pages/Dashboard/Partials/ApartmentForm.vue'
import { ArrowSmallLeftIcon } from '@heroicons/vue/24/solid/index.js'
</script>

<script lang="ts">
import AuthenticatedLayout from '@/layouts/Authenticated.vue'

export default {
  layout: AuthenticatedLayout,
  components: { ArrowSmallLeftIcon },
}
</script>

<template>
  <Head>
    <title>Dashboard | Nowy domek</title>
    <meta name="description" content="Nowy domek" />
  </Head>

  <div class="flex items-center mb-4">
    <Link
      href="/dashboard/domki"
      class="flex items-center text-base p-2 font-normal text-slate-900 rounded-lg dark:text-white hover:bg-slate-100 dark:hover:bg-slate-700 mr-2"
    >
      <ArrowSmallLeftIcon class="h-6 w-6 text-blue-500" />
    </Link>
    <h2 class="text-2xl sm:text-4xl font-extrabold dark:text-slate-100">
      Nowy domek
    </h2>
  </div>

  <div class="flex justify-center sm:mt-24 mt-8">
    <div class="w-full max-w-3xl">
      <div
        class="p-6 bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700 overflow-hidden"
      >
        <ApartmentForm />
      </div>
    </div>
  </div>
</template>
