<script lang="ts" setup>
import ApartmentForm from '@/Pages/Dashboard/Partials/ApartmentForm.vue'
import { HomeIcon } from '@heroicons/vue/24/solid'
import { Apartment } from '@/types'

interface Props {
  apartment: Apartment
}

const props = defineProps<Props>()
</script>

<script lang="ts">
import AuthenticatedLayout from '@/Layouts/Authenticated.vue'

export default {
  layout: AuthenticatedLayout,
  components: { HomeIcon },
}
</script>
<template>
  <div class="flex items-center mb-4">
    <Link
      href="/dashboard/domki"
      class="flex items-center text-base p-2 font-normal text-slate-900 rounded-lg dark:text-white hover:bg-slate-100 dark:hover:bg-slate-700 mr-2"
    >
      <HomeIcon class="h-6 w-6" />
    </Link>
    <h2 class="text-4xl font-extrabold dark:text-slate-100">
      Edytuj :: {{ props.apartment.name }}
    </h2>
  </div>

  <div class="w-full mx-auto">
    <div
      class="p-6 max-w-3xl bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700"
    >
      <ApartmentForm :apartment="props.apartment" />
    </div>
  </div>
</template>
