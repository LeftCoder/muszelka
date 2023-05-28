<script lang="ts" setup>
import ConfirmModal from '@/shared/ConfirmModal.vue'
import ReviewForm from '@/pages/Dashboard/Partials/ReviewForm.vue'
import { router } from '@inertiajs/vue3'
import { ArrowSmallLeftIcon } from '@heroicons/vue/24/solid/index.js'
import { Review } from '@/types'

interface Props {
  review: Review
}

const props = defineProps<Props>()

const deleteReview = () => {
  router.delete(`/dashboard/opinie/${props.review.id}`)
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
    <title>Dashboard | Aktualizuj opinie</title>
    <meta name="description" content="Aktualizuj opinie" />
  </Head>

  <div class="flex items-center mb-4">
    <Link
      href="/dashboard/opinie"
      class="flex items-center text-base p-2 font-normal text-slate-900 rounded-lg dark:text-white hover:bg-slate-100 dark:hover:bg-slate-700 mr-2"
    >
      <ArrowSmallLeftIcon class="h-6 w-6 text-blue-500" />
    </Link>
    <h2 class="text-2xl lg:text-4xl font-extrabold dark:text-slate-100">
      Edytuj opinie
    </h2>
  </div>

  <div class="flex justify-center mt-12">
    <div class="w-full lg:max-w-3xl">
      <div class="flex justify-end mb-4">
        <ConfirmModal @confirm="deleteReview"> Usuń opinię </ConfirmModal>
      </div>

      <div
        class="p-6 bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700 overflow-hidden"
      >
        <ReviewForm :review="props.review" />
      </div>
    </div>
  </div>
</template>
