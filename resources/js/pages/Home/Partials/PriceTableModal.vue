<script lang="ts" setup>
import { computed, ref } from 'vue'
import {
  TransitionRoot,
  TransitionChild,
  Dialog,
  DialogPanel,
  DialogTitle,
} from '@headlessui/vue'
import PriceTableContent from '@/pages/Home/Partials/PriceTableContent.vue'
import { PageProps } from '@/types'
import { usePage } from '@inertiajs/vue3'

interface Props {
  button?: boolean
}

const periods = computed(() => usePage<PageProps>().props.periods)
const props = defineProps<Props>()
const emit = defineEmits(['confirm'])
const isOpen = ref(false)

const setIsOpen = (value: boolean) => {
  isOpen.value = value
}

const closeModal = () => {
  setIsOpen(false)
  emit('confirm')
}
</script>

<template>
  <button
    type="button"
    :class="
      props.button
        ? 'max-w-min border text-slate-900 rounded-lg text-lg bg-white hover:bg-slate-100 shadow-md font-semibold focus:outline-none md:px-6 px-6 md:py-4 py-3 xl:leading-4'
        : ''
    "
    class="hover:text-slate-900"
    @click="setIsOpen(true)"
  >
    Cennik
  </button>

  <TransitionRoot appear :show="isOpen" as="template">
    <Dialog
      as="div"
      class="relative z-50"
      :open="isOpen"
      @close="setIsOpen(false)"
    >
      <TransitionChild
        as="template"
        enter="duration-300 ease-out"
        enter-from="opacity-0"
        enter-to="opacity-100"
        leave="duration-200 ease-in"
        leave-from="opacity-100"
        leave-to="opacity-0"
      >
        <div
          class="fixed inset-0 backdrop-blur @supports(backdrop-filter:blur(0))]:bg-black/25"
          aria-hidden="true"
        />
      </TransitionChild>

      <div class="fixed inset-0 flex items-center justify-center p-4 sm:p-0">
        <TransitionChild
          as="template"
          enter="duration-300 ease-out"
          enter-from="opacity-0 scale-95"
          enter-to="opacity-100 scale-100"
          leave="duration-200 ease-in"
          leave-from="opacity-100 scale-100"
          leave-to="opacity-0 scale-95"
        >
          <DialogPanel
            class="grid grid-rows-modal max-w-xl w-full h-[80vh] transform overflow-hidden rounded-2xl bg-white text-left align-middle shadow-xl transition-all"
          >
            <DialogTitle
              as="h3"
              class="text-lg font-medium leading-6 text-slate-900 bg-gray-100 px-6 py-3"
              >Cennik</DialogTitle
            >

            <div class="grid justify-items-start p-5 overflow-y-auto h-full">
              <PriceTableContent :periods="periods" />
            </div>

            <div class="flex justify-end bg-gray-100 px-6 py-3">
              <button
                type="button"
                class="inline-flex justify-center rounded-lg text-sm font-semibold py-2.5 px-4 bg-white text-slate-900 hover:bg-slate-100"
                @click="closeModal"
              >
                Zamknij
              </button>
            </div>
          </DialogPanel>
        </TransitionChild>
      </div>
    </Dialog>
  </TransitionRoot>
</template>
