<script lang="ts" setup>
import PolicyContent from '@/Pages/Policy/Partials/PolicyContent.vue'
import { ref } from 'vue'
import {
  TransitionRoot,
  TransitionChild,
  Dialog,
  DialogPanel,
  DialogTitle,
} from '@headlessui/vue'

const emit = defineEmits(['confirm'])
const isOpen = ref(false)

const setIsOpen = (value: boolean) => {
  isOpen.value = value
}

const confirmPolicy = () => {
  setIsOpen(false)
  emit('confirm')
}
</script>

<template>
  <button
    type="button"
    @click="setIsOpen(true)"
    class="font-medium text-cyan-700 hover:underline"
  >
    polityką prywatności
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
              >Polityka prywatności</DialogTitle
            >

            <div class="grid justify-items-start p-5 overflow-y-auto h-full">
              <PolicyContent />
            </div>

            <div class="flex justify-end bg-gray-100 px-6 py-3">
              <button
                type="button"
                class="inline-flex justify-center rounded-lg text-sm font-semibold py-2.5 px-4 bg-cyan-900 text-white hover:bg-cyan-700"
                @click="confirmPolicy"
              >
                Zapoznałem/am się
              </button>
            </div>
          </DialogPanel>
        </TransitionChild>
      </div>
    </Dialog>
  </TransitionRoot>
</template>
