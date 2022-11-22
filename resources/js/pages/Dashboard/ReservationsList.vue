<script lang="ts" setup>
import NoItems from '@/shared/NoItems.vue'
import SearchBox from '@/pages/Dashboard/Partials/SearchBox.vue'
import SelectBox from '@/pages/Dashboard/Partials/SelectBox.vue'
import Pagination from '@/pages/Dashboard/Partials/Pagination.vue'
import ReservationsTable from '@/pages/Dashboard/Partials/ReservationsTable.vue'
import type { MetaInformations, PaginationLinks, Reservation } from '@/types'
import { Inertia } from '@inertiajs/inertia'
import { PropType, reactive, watch } from 'vue'
import throttle from 'lodash/throttle'
import pickBy from 'lodash/pickBy'

interface Props {
  data: Reservation[]
  links: PaginationLinks
  meta: MetaInformations
}

const props = defineProps({
  reservations: Object as PropType<Props>,
  filters: Object as PropType<{ search: string; status: number | string }>,
})

const form = reactive({
  status: props.filters ? props.filters.status : '',
  search: props.filters ? props.filters.search : '',
})

watch(
  form,
  throttle(() => {
    Inertia.get('/dashboard/rezerwacje', pickBy(form), {
      preserveState: true,
      replace: true,
    })
  }, 150)
)
</script>

<script lang="ts">
import AuthenticatedLayout from '@/layouts/Authenticated.vue'

export default {
  layout: AuthenticatedLayout,
}
</script>

<template>
  <Head>
    <title>Dashboard | Rezerwacje</title>
    <meta name="description" content="Lista rezerwacji" />
  </Head>

  <div class="flex justify-between items center mb-4">
    <h2 class="w-2/3 text-4xl font-extrabold dark:text-slate-100">
      Lista rezerwacji
    </h2>

    <div class="w-1/3 flex justify-center items-center gap-4">
      <SelectBox v-model="form.status" />
      <SearchBox v-model="form.search" />
    </div>
  </div>

  <div v-if="props.reservations?.data.length">
    <ReservationsTable :reservations="props.reservations?.data" />
    <Pagination :meta="props.reservations?.meta" />
  </div>

  <NoItems v-else class="mt-8"> Brak rezerwacji do wyświetlenia. </NoItems>
</template>
