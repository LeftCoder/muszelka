<script lang="ts" setup>
import ConfirmModal from '@/shared/ConfirmModal.vue'
import FaqForm from '@/pages/Dashboard/Partials/FaqForm.vue'
import { Inertia } from '@inertiajs/inertia'
import { ChevronRightIcon, HomeIcon } from '@heroicons/vue/24/solid/index.js'
import { Faq } from '@/types'

interface Props {
  faq: Faq
}

const props = defineProps<Props>()

const deleteFaq = () => {
  Inertia.delete(`/dashboard/faq/${props.faq.id}`)
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
    <title>Dashboard | Aktualizuj pytanie</title>
    <meta name="description" content="Aktualizuj pytanie" />
  </Head>

  <div class="flex items-center mb-4">
    <Link
      href="/dashboard/udogodnienia"
      class="flex items-center text-base p-2 font-normal text-slate-900 rounded-lg dark:text-white hover:bg-slate-100 dark:hover:bg-slate-700"
    >
      <HomeIcon class="h-6 w-6" />
    </Link>
    <ChevronRightIcon class="h-6 w-6 mx-1" />
    <h2 class="text-4xl font-extrabold dark:text-slate-100">
      Edytuj :: Pytanie
    </h2>
  </div>

  <div class="flex justify-end mt-12 gap-6">
    <div class="w-full max-w-3xl mx-auto">
      <div class="flex justify-end mb-4">
        <ConfirmModal @confirm="deleteFaq"> Usuń pytanie </ConfirmModal>
      </div>

      <div
        class="p-6 bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700 overflow-hidden"
      >
        <FaqForm :faq="props.faq" />
      </div>
    </div>
  </div>
</template>
