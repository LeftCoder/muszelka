<script lang="ts" setup>
import NoItems from '@/shared/NoItems.vue'
import SearchBox from '@/pages/Dashboard/Partials/SearchBox.vue'
import SelectBox from '@/pages/Dashboard/Partials/SelectBox.vue'
import Pagination from '@/pages/Dashboard/Partials/Pagination.vue'
import ReservationsTable from '@/pages/Dashboard/Partials/ReservationsTable.vue'
import type { MetaInformations, PaginationLinks, Reservation } from '@/types'
import { Squares2X2Icon } from '@heroicons/vue/24/solid/index.js'
import { Link } from '@inertiajs/inertia-vue3'
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
    <title>Dashboard | Lista rezerwacji</title>
    <meta name="description" content="Lista rezerwacji" />
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
        Lista rezerwacji
      </h2>
    </div>

    <div
      class="sm:w-1/3 flex flex-col sm:flex-row justify-center sm:items-center gap-4 my-8 sm:my-0"
    >
      <SelectBox v-model="form.status" />
      <SearchBox v-model="form.search" />
    </div>
  </div>

  <div v-if="props.reservations?.data.length">
    <ReservationsTable :reservations="props.reservations?.data" />
    <Pagination :meta="props.reservations?.meta" />
  </div>

  <NoItems v-else class="mt-8"
    ><h2 class="text-2xl text-slate-900 text-center dark:text-slate-100">
      Brak rezerwacji do wyświetlenia.
    </h2>
  </NoItems>
</template>
