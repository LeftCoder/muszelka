<script setup>
import { Link, useForm } from '@inertiajs/vue3'
import { ArrowSmallLeftIcon } from '@heroicons/vue/24/solid/index.js'

defineProps({
  canResetPassword: Boolean,
  status: { type: String, default: '' },
})

const form = useForm({
  email: '',
  password: '',
  remember: false,
})

const onSubmit = () => {
  form.post('/login', {
    onFinish: () => form.reset('password'),
  })
}
</script>

<script>
import LoginLayout from '@/layouts/LoginLayout.vue'

export default {
  layout: LoginLayout,
}
</script>

<template>
  <Head title="Zaloguj się" />

  <div class="w-full sm:flex h-screen">
    <div class="hidden sm:flex-1 sm:grid sm:place-items-center">
      <Link href="/" class="flex-none text-slate-900">
        <img
          src="/storage/images/logo-dark.svg"
          class="h-96"
          alt="Muszelka Logo"
        />
        <span class="sr-only">Muszelka Logo</span>
      </Link>
    </div>
    <div class="sm:flex-1 bg-cyan-900">
      <div class="h-screen grid place-items-center">
        <div>
          <div class="flex items-center mb-4">
            <Link href="/" title="Wroć na główną">
              <ArrowSmallLeftIcon class="h-6 w-6 mr-2 text-amber-500" />
            </Link>
            <h2 class="text-2xl font-bold text-slate-400 sm:pr-12">
              Logowanie
            </h2>
          </div>

          <div
            class="p-6 w-full max-w-sm bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700"
          >
            <form @submit.prevent="onSubmit">
              <div class="mb-6">
                <label
                  for="email"
                  class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                  >Email</label
                >
                <input
                  id="email"
                  v-model="form.email"
                  type="email"
                  class="bg-slate-50 border border-slate-300 text-slate-900 text-sm rounded-lg focus:ring-cyan-500 focus:border-cyan-500 block w-full p-2.5"
                  required
                />
              </div>
              <div class="mb-6">
                <label
                  for="password"
                  class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                  >Hasło</label
                >
                <input
                  id="password"
                  v-model="form.password"
                  type="password"
                  class="bg-slate-50 border border-slate-300 text-slate-900 text-sm rounded-lg focus:ring-cyan-500 focus:border-cyan-500 block w-full p-2.5"
                  required
                />
              </div>
              <div v-if="form.errors.email" class="text-red-500 text-xs -mt-2">
                {{ form.errors.email }}
              </div>
              <div class="mt-6">
                <button
                  :disabled="form.processing"
                  type="submit"
                  class="flex justify-center w-full border md:text-2xl text-white rounded-lg text-lg bg-amber-500 enabled:hover:bg-amber-400 disabled:opacity-75 shadow-md font-semibold focus:outline-none md:px-6 px-6 md:py-4 py-3 xl:leading-4"
                >
                  Zaloguj
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
