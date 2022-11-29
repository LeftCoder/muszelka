<script lang="ts" setup>
import ConfirmModal from '@/shared/ConfirmModal.vue'
import FeatureForm from '@/pages/Dashboard/Partials/FeatureForm.vue'
import { Inertia } from '@inertiajs/inertia'
import { ChevronRightIcon, HomeIcon } from '@heroicons/vue/24/solid'
import { Feature } from '@/types'

interface Props {
  feature: Feature
}

const props = defineProps<Props>()

const deleteFeature = () => {
  Inertia.delete(`/dashboard/udogodnienia/${props.feature.id}`)
}
</script>

<script lang="ts">
import AuthenticatedLayout from '@/layouts/Authenticated.vue'

export default {
  layout: AuthenticatedLayout,
}
</script>
<template>
  <Head>
    <title>Dashboard | Aktualizuj udogodnienie</title>
    <meta name="description" content="Lista rezerwacji" />
  </Head>

  <div class="flex items-center mb-4">
    <Link
      href="/dashboard/domki"
      class="flex items-center text-base p-2 font-normal text-slate-900 rounded-lg dark:text-white hover:bg-slate-100 dark:hover:bg-slate-700"
    >
      <HomeIcon class="h-6 w-6" />
    </Link>
    <ChevronRightIcon class="h-6 w-6 mx-1" />
    <h2 class="text-4xl font-extrabold dark:text-slate-100">
      Edytuj :: {{ props.feature.name }}
    </h2>
  </div>

  <div class="flex justify-end mt-12 gap-6">
    <div class="w-full max-w-3xl mx-auto">
      <div class="flex justify-end mb-4">
        <ConfirmModal @confirm="deleteFeature">
          Usuń udogodnienie
        </ConfirmModal>
      </div>

      <div
        class="p-6 bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700 overflow-hidden"
      >
        <FeatureForm :feature="props.feature" />
      </div>
    </div>
  </div>
</template>
