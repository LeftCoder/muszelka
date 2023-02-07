<script lang="ts" setup>
import { Squares2X2Icon } from '@heroicons/vue/24/solid/index.js'
import { Link } from '@inertiajs/inertia-vue3'
import NoItems from '@/shared/NoItems.vue'
</script>

<script lang="ts">
import AuthenticatedLayout from '@/layouts/AuthenticatedLayout.vue'

export default {
  layout: AuthenticatedLayout,
}
</script>

<template>
  <Head>
    <title>Dashboard | Cennik</title>
    <meta name="description" content="Cennnik dla domków" />
  </Head>

  <div
    class="flex flex-col sm:flex-row justify-between sm:items-center mb-12 sm:mb-8"
  >
    <div class="flex items-center mb-4 sm:mb-0">
      <Link
        href="/dashboard"
        class="flex items-center text-base p-2 font-normal text-slate-900 rounded-lg dark:text-white hover:bg-slate-100 dark:hover:bg-slate-700 mr-2"
      >
        <Squares2X2Icon class="h-6 w-6 text-blue-500" />
      </Link>
      <h2 class="text-2xl lg:text-4xl font-extrabold dark:text-slate-100">
        Cennik domków
      </h2>
    </div>

    <Link href="/dashboard/cennik/create"> </Link>
  </div>

  <NoItems class="mt-8">
    <h2 class="text-2xl text-slate-900 text-center dark:text-slate-100">
      Brak gotowego cennika.
    </h2>
  </NoItems>
</template>
