<script lang="ts" setup>
import { computed } from 'vue'
import { useForm, usePage } from '@inertiajs/vue3'
import SuccessMessage from '@/pages/Contact/Partials/SuccessMessage.vue'
import PolicyModal from '@/pages/Contact/Partials/PolicyModal.vue'
import LoadingSpinnerIcon from '@/shared/LoadingSpinnerIcon.vue'
import type { PageProps } from '@/types'
import AccentImage from '@/shared/AccentImage.vue'

const message = computed(() => usePage<PageProps>().props.flash.message)

const form = useForm({
  author: '',
  body: '',
  policy: false,
  captcha_token: '',
})

const generateToken = async () => {
  const token = await window.captcha.execute('submit')
  return token
}

const onSubmit = async () => {
  form.captcha_token = await generateToken()

  form.post('/opinie', {
    preserveScroll: true,
    onSuccess: () => form.reset(),
  })
}
</script>
<template>
  <div class="mt-12 sm:mt-0 mb-24 lg:mb-64">
    <div class="w-full mb-20 text-center">
      <h2
        id="zostaw-opinie"
        class="text-slate-900 font-extrabold text-4xl sm:text-5xl lg:text-6xl tracking-tight"
      >
        Zostaw swoją opinię
      </h2>
      <p class="mt-6 text-lg text-slate-600 text-center max-w-3xl mx-auto">
        Podziel się wrażeniami z pobytu w Muszelce.
      </p>
    </div>

    <div class="flex justify-center">
      <form class="relative w-full lg:w-1/2" @submit.prevent="onSubmit">
        <AccentImage
          pos-x="right-[-40px]"
          pos-y="top-[-50px]"
          class="hidden lg:block"
        />
        <div class="mb-4">
          <label
            for="author"
            class="block mb-2 text-sm font-medium text-slate-900"
            >Twoję imię</label
          >
          <input
            id="author"
            v-model="form.author"
            type="text"
            name="author"
            aria-describedby="helper-text-explanation"
            class="bg-slate-50 border border-slate-300 text-slate-900 text-sm rounded-lg focus:ring-cyan-500 focus:border-cyan-500 block w-full p-2.5"
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
            for="body"
            class="block mb-2 text-sm font-medium text-slate-900"
            >Twoja opinia</label
          >
          <textarea
            id="body"
            v-model="form.body"
            name="body"
            rows="4"
            class="block p-2.5 w-full text-sm text-slate-900 bg-slate-50 rounded-lg border border-slate-300 focus:ring-cyan-500 focus:border-cyan-500"
            required
          ></textarea>
          <div
            v-if="form.errors.body"
            class="text-red-500 text-xs mt-1"
            v-text="form.errors.body"
          ></div>
        </div>

        <div>
          <p
            class="flex items-center lg:justify-end mt-2 text-sm text-slate-500"
          >
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
    </div>
  </div>
</template>
