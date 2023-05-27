<script lang="ts" setup>
import type { Period } from '@/types'
import { useForm } from '@inertiajs/vue3'
import LoadingSpinnerIcon from '@/shared/LoadingSpinnerIcon.vue'

interface Props {
  period?: Period
}

const props = defineProps<Props>()

const form = useForm({
  start: props.period ? props.period.start : '',
  end: props.period ? props.period.end : '',
  small: props.period ? props.period.small : '',
  big: props.period ? props.period.big : '',
})

const onSubmit = () => {
  if (props.period) {
    form.patch(`/dashboard/cennik/${props.period.id}`)
  } else {
    form.post(`/dashboard/cennik`)
  }
}
</script>

<template>
  <form @submit.prevent="onSubmit">
    <div class="mb-4">
      <label
        for="start"
        class="block mb-2 text-sm font-medium text-slate-900 dark:text-slate-300"
        >Termin od</label
      >
      <input
        id="start"
        v-model="form.start"
        type="date"
        name="start"
        class="bg-slate-50 border border-slate-300 text-slate-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
        required
      />
      <div
        v-if="form.errors.start"
        class="text-red-500 text-xs mt-1"
        v-text="form.errors.start"
      ></div>
    </div>

    <div class="mb-4">
      <label
        for="end"
        class="block mb-2 text-sm font-medium text-slate-900 dark:text-slate-300"
        >Termin do</label
      >
      <input
        id="end"
        v-model="form.end"
        type="date"
        name="end"
        class="bg-slate-50 border border-slate-300 text-slate-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
        required
      />
      <div
        v-if="form.errors.end"
        class="text-red-500 text-xs mt-1"
        v-text="form.errors.end"
      ></div>
    </div>

    <div class="mb-4">
      <label
        for="small"
        class="block mb-2 text-sm font-medium text-slate-900 dark:text-slate-300"
        >Cena za mały domek</label
      >
      <input
        id="small"
        v-model="form.small"
        type="number"
        name="small"
        class="bg-slate-50 border border-slate-300 text-slate-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
        required
      />
      <div
        v-if="form.errors.small"
        class="text-red-500 text-xs mt-1"
        v-text="form.errors.small"
      ></div>
    </div>

    <div class="mb-4">
      <label
        for="big"
        class="block mb-2 text-sm font-medium text-slate-900 dark:text-slate-300"
        >Cena za duży domek</label
      >
      <input
        id="big"
        v-model="form.big"
        type="number"
        name="big"
        class="bg-slate-50 border border-slate-300 text-slate-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
        required
      />
      <div
        v-if="form.errors.big"
        class="text-red-500 text-xs mt-1"
        v-text="form.errors.big"
      ></div>
    </div>

    <div
      class="flex justify-end items-center bg-slate-50 dark:bg-slate-700 gap-4 -mx-6 -mb-6 p-6"
    >
      <Link href="/dashboard/cennik">
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
        {{ props.period ? 'Aktualizuj' : 'Utwórz' }}
      </button>
    </div>
  </form>
</template>
