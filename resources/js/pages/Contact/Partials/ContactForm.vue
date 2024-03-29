<script lang="ts" setup>
import { computed } from 'vue'
import { useForm, usePage } from '@inertiajs/vue3'
import SuccessMessage from '@/pages/Contact/Partials/SuccessMessage.vue'
import PolicyModal from '@/pages/Contact/Partials/PolicyModal.vue'
import LoadingSpinnerIcon from '@/shared/LoadingSpinnerIcon.vue'
import type { PageProps } from '@/types'

const message = computed(() => usePage<PageProps>().props.flash.message)

const form = useForm({
  name: '',
  email: '',
  message: '',
  policy: false,
  captcha_token: '',
})

const generateToken = async () => {
  const token = await window.captcha.execute('submit')
  return token
}

const onSubmit = async () => {
  form.captcha_token = await generateToken()

  form.post('/contact', {
    preserveScroll: true,
    onSuccess: () => form.reset(),
  })
}
</script>
<template>
  <form class="w-full" @submit.prevent="onSubmit">
    <div class="mb-4">
      <label for="name" class="block mb-2 text-sm font-medium text-slate-900"
        >Twoję imię</label
      >
      <input
        id="name"
        v-model="form.name"
        type="text"
        name="name"
        aria-describedby="helper-text-explanation"
        class="bg-slate-50 border border-slate-300 text-slate-900 text-sm rounded-lg focus:ring-cyan-500 focus:border-cyan-500 block w-full p-2.5"
        required
      />
      <div
        v-if="form.errors.name"
        class="text-red-500 text-xs mt-1"
        v-text="form.errors.name"
      ></div>
    </div>

    <div class="mb-4">
      <label for="email" class="block mb-2 text-sm font-medium text-slate-900"
        >Email</label
      >
      <input
        id="email"
        v-model="form.email"
        type="email"
        name="email"
        aria-describedby="helper-text-explanation"
        class="bg-slate-50 border border-slate-300 text-slate-900 text-sm rounded-lg focus:ring-cyan-500 focus:border-cyan-500 block w-full p-2.5"
        required
      />
      <div
        v-if="form.errors.email"
        class="text-red-500 text-xs mt-1"
        v-text="form.errors.email"
      ></div>
    </div>

    <div class="mb-4">
      <label for="message" class="block mb-2 text-sm font-medium text-slate-900"
        >Twoja wiadomość</label
      >
      <textarea
        id="message"
        v-model="form.message"
        name="message"
        rows="4"
        class="block p-2.5 w-full text-sm text-slate-900 bg-slate-50 rounded-lg border border-slate-300 focus:ring-cyan-500 focus:border-cyan-500"
        required
      ></textarea>
      <div
        v-if="form.errors.message"
        class="text-red-500 text-xs mt-1"
        v-text="form.errors.message"
      ></div>
    </div>

    <div>
      <p class="flex items-center lg:justify-end mt-2 text-sm text-slate-500">
        <input
          id="policy"
          v-model="form.policy"
          type="checkbox"
          name="policy"
          class="w-4 h-4 text-cyan-600 focus:ring-cyan-500 bg-gray-100 mr-2 rounded border-gray-300 focus:ring-2"
          :class="
            form.errors.policy && !form.policy
              ? 'ring-red-500 ring-2 bg-gray-100'
              : ''
          "
          required
        />
        <label
          class="hover:cursor-pointer hover:text-slate-900 mr-1"
          for="policy"
        >
          Zapoznałem/am się z
        </label>
        <PolicyModal @confirm="form.policy = true" />
      </p>
    </div>

    <div>
      <button
        class="mt-12 w-full lg:mt-0 lg:w-min inline-flex justify-center rounded-lg text-sm font-semibold py-2.5 px-4 bg-cyan-900 text-white enabled:hover:bg-cyan-700 disabled:opacity-75"
        type="submit"
        :disabled="form.processing"
      >
        <LoadingSpinnerIcon v-if="form.processing" />
        Wyślij
      </button>
    </div>

    <SuccessMessage :message="message" />
  </form>
</template>
