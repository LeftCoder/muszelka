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

  <h2 class="text-4xl font-extrabold dark:text-slate-100 mb-4">Lista domków</h2>
  <ApartmentsTable :apartments="props.apartments" />
</template>
