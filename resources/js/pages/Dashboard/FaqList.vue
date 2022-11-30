<script lang="ts" setup>
import { PropType } from 'vue'
import type { Faq, MetaInformations, PaginationLinks } from '@/types'
import NoItems from '@/shared/NoItems.vue'
import FaqsTable from '@/pages/Dashboard/Partials/FaqsTable.vue'
import Pagination from '@/pages/Dashboard/Partials/Pagination.vue'

interface Props {
  data: Faq[]
  links: PaginationLinks
  meta: MetaInformations
}

const props = defineProps({
  faqs: Object as PropType<Props>,
})
</script>

<script lang="ts">
import AuthenticatedLayout from '@/layouts/Authenticated.vue'

export default {
  layout: AuthenticatedLayout,
  components: { Pagination },
}
</script>

<template>
  <Head>
    <title>Dashboard | Faq</title>
    <meta name="description" content="Lista pytań" />
  </Head>

  <div class="flex justify-between items-center mb-4">
    <h2 class="text-4xl font-extrabold dark:text-slate-100">Lista pytań</h2>

    <Link href="/dashboard/faq/create">
      <button
        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
        type="button"
      >
        Nowy pozycja
      </button>
    </Link>
  </div>

  <div v-if="props.faqs?.data.length">
    <FaqsTable :faqs="props.faqs?.data" />
    <Pagination :meta="props.faqs?.meta" />
  </div>

  <NoItems v-else class="mt-8">
    <h2 class="text-2xl text-slate-900 dark:text-slate-100">
      Brak pyań do wyświetlenia.
    </h2>
  </NoItems>
</template>
