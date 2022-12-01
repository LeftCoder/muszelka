<script lang="ts" setup>
import FeaturesTable from '@/pages/Dashboard/Partials/FeaturesTable.vue'
import NoItems from '@/shared/NoItems.vue'
import type { Feature } from '@/types'
import { Link } from '@inertiajs/inertia-vue3'
import { Squares2X2Icon } from '@heroicons/vue/24/solid/index.js'

interface Props {
  features: Feature[]
}

const props = defineProps<Props>()
</script>

<script lang="ts">
import AuthenticatedLayout from '@/layouts/Authenticated.vue'

export default {
  layout: AuthenticatedLayout,
}
</script>

<template>
  <Head>
    <title>Dashboard | Lista udogodnień</title>
    <meta name="description" content="Lista udogodnień" />
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
      <h2 class="text-2xl sm:text-4xl font-extrabold dark:text-slate-100">
        Lista udogodnień
      </h2>
    </div>

    <Link href="/dashboard/udogodnienia/create">
      <button
        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
        type="button"
      >
        Nowy pozycja
      </button>
    </Link>
  </div>

  <div v-if="props.features.length > 0">
    <FeaturesTable :features="props.features" />

    <div class="flex justify-start items-center mt-5">
      Łącznie: {{ props.features.length }}
    </div>
  </div>

  <NoItems v-else class="mt-8">
    <h2 class="text-2xl text-slate-900 dark:text-slate-100">
      Brak udogodnień do wyświetlenia.
    </h2>
  </NoItems>
</template>
