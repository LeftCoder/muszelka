<script lang="ts" setup>
import ConfirmModal from '@/shared/ConfirmModal.vue'
import PeriodForm from '@/pages/Dashboard/Partials/PeriodForm.vue'
import { router } from '@inertiajs/vue3'
import { ArrowSmallLeftIcon } from '@heroicons/vue/24/solid/index.js'
import { Period } from '@/types'

interface Props {
  period: Period
}

const props = defineProps<Props>()

const deletePeriod = () => {
  router.delete(`/dashboard/cennik/${props.period.id}`)
}
</script>

<script lang="ts">
import AuthenticatedLayout from '@/layouts/AuthenticatedLayout.vue'

export default {
  layout: AuthenticatedLayout,
}
</script>

<template>
  <Head>
    <title>Dashboard | Aktualizuj termin</title>
    <meta name="description" content="Aktualizuj termin" />
  </Head>

  <div class="flex items-center mb-4">
    <Link
      href="/dashboard/cennik"
      class="flex items-center text-base p-2 font-normal text-slate-900 rounded-lg dark:text-white hover:bg-slate-100 dark:hover:bg-slate-700 mr-2"
    >
      <ArrowSmallLeftIcon class="h-6 w-6 text-blue-500" />
    </Link>
    <h2 class="text-2xl lg:text-4xl font-extrabold dark:text-slate-100">
      Edytuj termin
    </h2>
  </div>

  <div class="flex justify-center mt-12">
    <div class="w-full lg:max-w-3xl">
      <div class="flex justify-end mb-4">
        <ConfirmModal @confirm="deletePeriod"> Usuń tremin </ConfirmModal>
      </div>

      <div
        class="p-6 bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700 overflow-hidden"
      >
        <PeriodForm :period="props.period" />
      </div>
    </div>
  </div>
</template>
