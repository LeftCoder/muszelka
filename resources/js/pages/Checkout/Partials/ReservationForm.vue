<script lang="ts" setup>
import { useRootStore } from '@/store'
import { useForm } from '@inertiajs/inertia-vue3'
import LoadingSpinnerIcon from '@/shared/LoadingSpinnerIcon.vue'
import PolicyAndTermsModal from '@/pages/Checkout/Partials/PolicyAndTermsModal.vue'

const store = useRootStore()
const form = useForm({
  name: '',
  surname: '',
  phone: '',
  email: '',
  policy: false,
  captcha_token: '',
  max: store.selectedApartmentMax,
  apartmentName: store.selectedApartmentName,
  ...store.reservation,
})

const generateToken = async () => {
  const token = await window.captcha.execute('submit')
  return token
}

const onSubmit = async () => {
  form.captcha_token = await generateToken()

  form.post('/reservation', {
    onSuccess: () => store.$reset(),
  })
}
</script>

<template>
  <h2 class="text-3xl font-bold text-gray-900 mb-4">Dane kontaktowe</h2>
  <form class="flex flex-col" @submit.prevent="onSubmit">
    <div class="mb-6">
      <input type="hidden" name="apartment" v-model="form.apartmentName" />

      <div class="mb-4">
        <label for="name" class="block mb-2 text-sm font-medium text-slate-900"
          >Twoję imię</label
        >
        <input
          id="name"
          type="text"
          name="name"
          v-model="form.name"
          class="bg-slate-50 border border-slate-300 text-slate-900 text-sm rounded-lg focus:ring-cyan-500 focus:border-cyan-500 block w-full p-2.5"
        />
        <div
          v-if="form.errors.name"
          v-text="form.errors.name"
          class="text-red-500 text-xs mt-1"
        ></div>
      </div>

      <div class="mb-4">
        <label
          for="surname"
          class="block mb-2 text-sm font-medium text-slate-900"
          >Twoję nazwisko</label
        >
        <input
          id="surname"
          type="text"
          name="surname"
          v-model="form.surname"
          class="bg-slate-50 border border-slate-300 text-slate-900 text-sm rounded-lg focus:ring-cyan-500 focus:border-cyan-500 block w-full p-2.5"
        />
        <div
          v-if="form.errors.surname"
          v-text="form.errors.surname"
          class="text-red-500 text-xs mt-1"
        ></div>
      </div>

      <div class="mb-4">
        <label for="phone" class="block mb-2 text-sm font-medium text-slate-900"
          >Email do kontaktu</label
        >
        <input
          id="email"
          type="email"
          name="email"
          v-model="form.email"
          class="bg-slate-50 border border-slate-300 text-slate-900 text-sm rounded-lg focus:ring-cyan-500 focus:border-cyan-500 block w-full p-2.5"
        />
        <div
          v-if="form.errors.email"
          v-text="form.errors.email"
          class="text-red-500 text-xs mt-1"
        ></div>
      </div>

      <div class="mb-4">
        <label for="phone" class="block mb-2 text-sm font-medium text-slate-900"
          >Numer telefonu</label
        >
        <input
          id="phone"
          type="tel"
          name="phone"
          v-model="form.phone"
          class="bg-slate-50 border border-slate-300 text-slate-900 text-sm rounded-lg focus:ring-cyan-500 focus:border-cyan-500 block w-full p-2.5"
        />
        <div
          v-if="form.errors.phone"
          v-text="form.errors.phone"
          class="text-red-500 text-xs mt-1"
        ></div>
      </div>

      <div class="mb-4 text-right">
        <p class="flex items-center justify-end mt-2 text-sm text-slate-500">
          <input
            type="checkbox"
            id="policy"
            name="policy"
            v-model="form.policy"
            class="w-4 h-4 text-cyan-600 focus:ring-cyan-500 bg-gray-100 mr-2 rounded border-gray-300 focus:ring-2"
            :class="
              form.errors.policy && !form.policy
                ? 'ring-red-500 ring-2 bg-gray-100'
                : ''
            "
          />
          <label
            class="hover:cursor-pointer hover:text-slate-900 mr-1"
            for="policy"
          >
            Zapoznałem/am się z
          </label>
          <PolicyAndTermsModal @confirm="form.policy = true" />
        </p>
      </div>
    </div>
    <div class="flex justify-end">
      <button
        class="inline-flex justify-center border text-white rounded-lg text-lg bg-amber-500 enabled:hover:bg-amber-400 disabled:opacity-75 shadow-md font-semibold focus:outline-none md:px-6 px-6 md:py-4 py-3 xl:leading-4"
        type="submit"
        :disabled="form.processing"
      >
        <LoadingSpinnerIcon v-if="form.processing" />
        Złóż rezerwację
      </button>
    </div>
  </form>
</template>
