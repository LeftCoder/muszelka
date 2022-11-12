<script lang="ts" setup>
import ReservationsTable from '@/Pages/Dashboard/Partials/ReservationsTable.vue'
import Pagination from '@/Pages/Dashboard/Partials/Pagination.vue'
import type { MetaInformations, PaginationLinks, Reservation } from '@/types'
import { PropType } from 'vue'

interface Props {
  data: Reservation[]
  links: PaginationLinks
  meta: MetaInformations
}

const props = defineProps({
  reservations: Object as PropType<Props>,
})
</script>

<script lang="ts">
import AuthenticatedLayout from '@/Layouts/Authenticated.vue'

export default {
  layout: AuthenticatedLayout,
}
</script>

<template>
  <Head>
    <title>Dashboard | Rezerwacje</title>
    <meta name="description" content="Lista rezerwacji" />
  </Head>

  <h2 class="text-4xl font-extrabold dark:text-slate-100 mb-4">
    Lista rezerwacji
  </h2>
  <ReservationsTable :reservations="props.reservations?.data" />
  <Pagination :meta="props.reservations?.meta" />
</template>
