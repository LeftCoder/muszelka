<script lang="ts" setup>
import ConfirmModal from '@/shared/ConfirmModal.vue'
import ApartmentForm from '@/pages/Dashboard/Partials/ApartmentForm.vue'
import ImageGallery from '@/shared/ImageGallery.vue'
import { Inertia } from '@inertiajs/inertia'
import { ChevronRightIcon, HomeIcon } from '@heroicons/vue/24/solid'
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
import AuthenticatedLayout from '@/layouts/Authenticated.vue'

export default {
  layout: AuthenticatedLayout,
}
</script>
<template>
  <Head>
    <title>Dashboard | Aktualizuj dane domku</title>
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
      Edytuj :: {{ props.apartment.name }}
    </h2>
  </div>

  <div class="flex justify-end mt-12 gap-6">
    <div class="w-full">
      <div class="flex justify-end mb-4">
        <ConfirmModal @confirm="deleteApartment" />
      </div>
      <div
        class="p-6 bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700 overflow-hidden"
      >
        <ApartmentForm :apartment="props.apartment" />
      </div>
    </div>

    <div class="w-full">
      <div class="grid place-items-center h-full">
        <div class="max-w-xl w-full mx-auto">
          <div class="flex justify-end items-center mb-4">
            <h2 class="text-xl">Zdjęcia</h2>
          </div>
          <ImageGallery
            class="rounded-lg"
            :images="props.apartment.images"
            :galleryId="props.apartment.id"
          />
        </div>
      </div>
    </div>
  </div>
</template>
