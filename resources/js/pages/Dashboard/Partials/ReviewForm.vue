<script lang="ts" setup>
import type { Review } from '@/types'
import { useForm } from '@inertiajs/vue3'
import LoadingSpinnerIcon from '@/shared/LoadingSpinnerIcon.vue'

interface Props {
  review?: Review
}

const props = defineProps<Props>()

const form = useForm({
  author: props.author ? props.review.question : '',
  body: props.body ? props.review.answer : '',
})

const onSubmit = () => {
  if (props.review) {
    form.patch(`/dashboard/opinie/${props.review.id}`)
  } else {
    form.post(`/dashboard/opinie`)
  }
}
</script>

<template>
  <form @submit.prevent="onSubmit">
    <div class="mb-4">
      <label
        for="name"
        class="block mb-2 text-sm font-medium text-slate-900 dark:text-slate-300"
        >Autor</label
      >
      <input
        id="author"
        v-model="form.author"
        type="text"
        name="author"
        class="bg-slate-50 border border-slate-300 text-slate-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
        required
      />
      <div
        v-if="form.errors.author"
        class="text-red-500 text-xs mt-1"
        v-text="form.errors.author"
      ></div>
    </div>

    <div class="mb-4">
      <label
        for="answer"
        class="block mb-2 text-sm font-medium text-slate-900 dark:text-slate-300"
        >Treść opinii</label
      >
      <textarea
        id="answer"
        v-model="form.body"
        name="answer"
        rows="4"
        class="bg-slate-50 border border-slate-300 text-slate-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
        required
      />
      <div
        v-if="form.errors.body"
        class="text-red-500 text-xs mt-1"
        v-text="form.errors.body"
      ></div>
    </div>

    <div
      class="flex justify-end items-center bg-slate-50 dark:bg-slate-700 gap-4 -mx-6 -mb-6 p-6"
    >
      <Link href="/dashboard/opinie">
        <button
          type="button"
          class="text-slate-900 dark:text-slate-100 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700"
        >
          Anuluj
        </button>
      </Link>
      <button
        type="submit"
        class="text-white inline-flex bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
        :disabled="form.processing"
      >
        <LoadingSpinnerIcon v-if="form.processing" />
        {{ props.review ? 'Aktualizuj' : 'Utwórz' }}
      </button>
    </div>
  </form>
</template>
