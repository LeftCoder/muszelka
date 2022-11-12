<script lang="ts" setup>
import { Apartment } from '@/types'
import { useForm } from '@inertiajs/inertia-vue3'

interface Props {
  apartment: Apartment
}

const props = defineProps<Props>()

const form = useForm({
  name: props.apartment.name,
  description: props.apartment.description,
  price: props.apartment.price,
  max: props.apartment.max,
})

const handleSubmit = () => {
  form.post('reservation')
}
</script>

<template>
  <form @submit="handleSubmit">
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
        v-model="form.description"
        class="bg-slate-50 border border-slate-300 text-slate-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
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
        id="max"
        name="max"
        v-model="form.max"
        class="bg-slate-50 border border-slate-300 text-slate-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
      />
      <div
        v-if="form.errors.max"
        v-text="form.errors.max"
        class="text-red-500 text-xs mt-1"
      ></div>
    </div>

    <div class="flex justify-end items-center gap-4">
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
        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
      >
        Aktualizuj
      </button>
    </div>
  </form>
</template>
