<script lang="ts" setup>
import { ref } from 'vue'
import { TrashIcon } from '@heroicons/vue/20/solid/index.js'
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

const confirmDelete = () => {
  setIsOpen(false)
  emit('confirm')
}
</script>

<template>
  <button
    type="button"
    @click="setIsOpen(true)"
    class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm w-full sm:w-auto px-3 py-2 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800"
  >
    <TrashIcon class="h-8 w-8 p-2" />
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
            class="grid grid-rows-modal max-w-sm w-full transform overflow-hidden rounded-2xl bg-white dark:bg-slate-700 text-left align-middle shadow-xl transition-all"
          >
            <DialogTitle
              as="h3"
              class="text-lg font-medium leading-6 dark:text-white text-slate-900 bg-gray-100 dark:bg-slate-800 px-6 py-3"
              >Usuń wybrany domek</DialogTitle
            >

            <div class="grid justify-items-center overflow-y-auto h-full py-5">
              <h2 class="text-xl">Czy jesteś pewny?</h2>
            </div>

            <div
              class="flex justify-end items-center dark:text-white text-slate-900 bg-gray-100 dark:bg-slate-800 gap-4 px-6 py-3"
            >
              <button @click="setIsOpen(false)" type="button">Anuluj</button>
              <button
                type="button"
                class="inline-flex justify-center rounded-lg text-sm font-semibold py-2.5 px-4 text-white bg-red-700 hover:bg-red-800 focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800"
                @click="confirmDelete"
              >
                Usuń
              </button>
            </div>
          </DialogPanel>
        </TransitionChild>
      </div>
    </Dialog>
  </TransitionRoot>
</template>
