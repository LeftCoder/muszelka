<script lang="ts" setup>
import ApartmentsTable from '@/Pages/Dashboard/Partials/ApartmentsTable.vue'
import type { Apartment } from '@/types'

interface Props {
  apartments: Apartment[]
}

const props = defineProps<Props>()
</script>

<script lang="ts">
import AuthenticatedLayout from '@/Layouts/Authenticated.vue'

export default {
  layout: AuthenticatedLayout,
}
</script>

<template>
  <Head>
    <title>Dashboard | Domki</title>
    <meta name="description" content="Lista domków" />
  </Head>

  <div class="flex justify-between items-center mb-4">
    <h2 class="text-4xl font-extrabold dark:text-slate-100">Lista domków</h2>

    <Link href="/dashboard/domki/create">
      <button
        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
        type="button"
      >
        Nowy domek
      </button>
    </Link>
  </div>
  <ApartmentsTable :apartments="props.apartments" />
</template>
