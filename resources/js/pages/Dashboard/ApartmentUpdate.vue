<script lang="ts" setup>
import ConfirmModal from '@/shared/ConfirmModal.vue'
import ApartmentForm from '@/pages/Dashboard/Partials/ApartmentForm.vue'
import ApsGallery from '@/pages/Dashboard/Partials/ApsGallery.vue'
import { Inertia } from '@inertiajs/inertia'
import { ArrowSmallLeftIcon } from '@heroicons/vue/24/solid/index.js'
import { Apartment } from '@/types'

interface Props {
  apartment: Apartment
}

const props = defineProps<Props>()

const deleteApartment = () => {
  Inertia.delete(`/dashboard/domki/${props.apartment.id}`)
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
    <title>Dashboard | Aktualizuj domek</title>
    <meta name="description" content="Aktualizuj domek" />
  </Head>

  <div class="flex items-center mb-4">
    <Link
      href="/dashboard/domki"
      class="flex items-center text-base p-2 font-normal text-slate-900 rounded-lg dark:text-white hover:bg-slate-100 dark:hover:bg-slate-700 mr-2"
    >
      <ArrowSmallLeftIcon class="h-6 w-6 text-blue-500" />
    </Link>
    <h2 class="text-2xl lg:text-4xl font-extrabold dark:text-slate-100">
      Edytuj :: {{ props.apartment.name }}
    </h2>
  </div>

  <div class="flex flex-col lg:flex-row gap-24 lg:gap-6 mt-12">
    <div class="w-full">
      <div class="flex justify-end mb-4">
        <ConfirmModal @confirm="deleteApartment"> Usuń domek </ConfirmModal>
      </div>
      <div
        class="p-6 bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700 overflow-hidden"
      >
        <ApartmentForm :apartment="props.apartment" />
      </div>
    </div>

    <div class="w-full">
      <div class="lg:max-w-xl w-full mx-auto">
        <div class="flex lg:justify-end items-center mb-4">
          <h2 class="text-xl">Zdjęcia</h2>
        </div>
        <ApsGallery
          class="rounded-lg"
          :images="props.apartment.images"
          :gallery-id="props.apartment.id"
        />
      </div>
    </div>
  </div>
</template>
