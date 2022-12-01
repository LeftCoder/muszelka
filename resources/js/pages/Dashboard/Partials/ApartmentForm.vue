<script lang="ts" setup>
import type { Apartment } from '@/types'
import { useForm } from '@inertiajs/inertia-vue3'
import FilePondInput from '@/pages/Dashboard/Partials/FilePondInput.vue'
import ChoicesInput from '@/pages/Dashboard/Partials/ChoicesInput.vue'
import LoadingSpinnerIcon from '@/shared/LoadingSpinnerIcon.vue'

interface Props {
  apartment?: Apartment
}

const props = defineProps<Props>()

const form = useForm({
  name: props.apartment ? props.apartment.name : '',
  description: props.apartment ? props.apartment.description : '',
  price: props.apartment ? props.apartment.price : '',
  max: props.apartment ? props.apartment.max : '',
  features:
    props.apartment && props.apartment.features
      ? props.apartment.features.map((feature) => feature.id)
      : [],
  folders: [],
})

const onSubmit = () => {
  if (props.apartment) {
    form.patch(`/dashboard/domki/${props.apartment.id}`)
  } else {
    form.post(`/dashboard/domki`)
  }
}
</script>

<template>
  <form @submit.prevent="onSubmit">
    <div class="mb-4">
      <label
        for="name"
        class="block mb-2 text-sm font-medium text-slate-900 dark:text-slate-300"
        >Nazwa domku</label
      >
      <input
        type="text"
        id="name"
        name="name"
        v-model="form.name"
        class="bg-slate-50 border border-slate-300 text-slate-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
        required
      />
      <div
        v-if="form.errors.name"
        v-text="form.errors.name"
        class="text-red-500 text-xs mt-1"
      ></div>
    </div>

    <div class="mb-4">
      <label
        for="description"
        class="block mb-2 text-sm font-medium text-slate-900 dark:text-slate-300"
        >Opis domku</label
      >
      <textarea
        id="description"
        name="description"
        rows="4"
        v-model="form.description"
        class="bg-slate-50 border border-slate-300 text-slate-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
        required
      />
      <div
        v-if="form.errors.description"
        v-text="form.errors.description"
        class="text-red-500 text-xs mt-1"
      ></div>
    </div>

    <div class="mb-4">
      <label
        for="price"
        class="block mb-2 text-sm font-medium text-slate-900 dark:text-slate-300"
        >Cena za dobę</label
      >
      <input
        type="number"
        min="0"
        id="price"
        name="price"
        v-model="form.price"
        class="bg-slate-50 border border-slate-300 text-slate-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
        required
      />
      <div
        v-if="form.errors.price"
        v-text="form.errors.price"
        class="text-red-500 text-xs mt-1"
      ></div>
    </div>

    <div class="mb-4">
      <label
        for="max"
        class="block mb-2 text-sm font-medium text-slate-900 dark:text-slate-300"
        >Maksymalna liczba gości</label
      >
      <input
        type="number"
        min="1"
        id="max"
        name="max"
        v-model="form.max"
        class="bg-slate-50 border border-slate-300 text-slate-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
        required
      />
      <div
        v-if="form.errors.max"
        v-text="form.errors.max"
        class="text-red-500 text-xs mt-1"
      ></div>
    </div>

    <div class="my-10">
      <label
        for="features"
        class="block mb-2 text-sm font-medium text-slate-900 dark:text-slate-300"
        >Udogodnienia</label
      >
      <ChoicesInput
        id="features"
        name="features[]"
        v-model="form.features"
        :features="props.apartment?.features ?? []"
      />
    </div>

    <div class="my-10">
      <FilePondInput v-model="form.folders" />
    </div>

    <div
      class="flex justify-end items-center bg-slate-50 dark:bg-slate-700 gap-4 -mx-6 -mb-6 p-6"
    >
      <Link href="/dashboard/domki">
        <button
          type="button"
          class="text-slate-900 dark:text-slate-100 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700"
        >
          Anuluj
        </button>
      </Link>
      <button
        type="submit"
        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
        :disabled="form.processing"
      >
        <LoadingSpinnerIcon v-if="form.processing" />
        {{ props.apartment ? 'Aktualizuj' : 'Utwórz' }}
      </button>
    </div>
  </form>
</template>
