<script lang="ts" setup>
import { ref } from 'vue'
import type { ReservationStatus } from '@/types'
import { Status } from '@/types'
import {
  TransitionRoot,
  TransitionChild,
  Dialog,
  DialogPanel,
  DialogTitle,
  RadioGroup,
  RadioGroupLabel,
  RadioGroupOption,
} from '@headlessui/vue'
import { statuses } from '@/utils/status'

interface Props {
  status: ReservationStatus
  id: number
}

const props = defineProps<Props>()
const emit = defineEmits<{
  (e: 'confirm', status: number, id: number): void
}>()

const colors = (status: ReservationStatus) => {
  switch (status) {
    case Status.NEW:
      return 'bg-blue-100 text-blue-800 dark:bg-blue-200 dark:text-blue-800'
    case Status.CONFIRMED:
      return 'bg-amber-100 text-amber-800 dark:bg-amber-200 dark:text-amber-900'
    case Status.CANCELED:
      return 'bg-slate-100 text-slate-800 dark:bg-slate-700 dark:text-slate-300'
    case Status.DONE:
      return 'bg-cyan-100 text-cyan-800 dark:bg-cyan-200 dark:text-cyan-900'
  }
}

const isOpen = ref(false)
const selected = ref(
  statuses.find((status) => status.name === props.status)?.id ?? 0
)

const setIsOpen = (value: boolean) => {
  isOpen.value = value
}

const confirmUpdate = () => {
  setIsOpen(false)
  emit('confirm', selected.value, props.id)
}
</script>

<template>
  <button type="button" @click="setIsOpen(true)">
    <span
      class="text-xs font-semibold px-2.5 py-0.5 rounded"
      :class="colors(props.status)"
      >{{ props.status }}</span
    >
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
              >Aktualizuj status</DialogTitle
            >

            <div class="p-5">
              <RadioGroup v-model="selected">
                <RadioGroupLabel class="sr-only"
                  >Status rezerwacji</RadioGroupLabel
                >
                <div class="space-y-4 w-full">
                  <RadioGroupOption
                    as="template"
                    v-for="status in statuses"
                    :key="status.name"
                    :value="status.id"
                    v-slot="{ active, checked }"
                  >
                    <div
                      :class="[
                        active
                          ? 'ring-2 ring-white ring-opacity-60 ring-offset-2 ring-offset-sky-300'
                          : '',
                        checked
                          ? 'bg-blue-500 text-white '
                          : 'bg-slate-100 dark:bg-slate-500 dark:text-white',
                      ]"
                      class="relative flex cursor-pointer rounded-lg px-5 py-4 shadow-md focus:outline-none"
                    >
                      <div
                        class="flex flex-1 w-full items-center justify-between"
                      >
                        <div class="flex items-center">
                          <div class="text-sm">
                            <RadioGroupLabel
                              as="p"
                              :class="checked ? 'text-white' : 'text-gray-900'"
                              class="font-medium"
                            >
                              {{ status.name }}
                            </RadioGroupLabel>
                          </div>
                        </div>
                        <div v-show="checked" class="shrink-0 text-white ml-2">
                          <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none">
                            <circle
                              cx="12"
                              cy="12"
                              r="12"
                              fill="#fff"
                              fill-opacity="0.2"
                            />
                            <path
                              d="M7 13l3 3 7-7"
                              stroke="#fff"
                              stroke-width="1.5"
                              stroke-linecap="round"
                              stroke-linejoin="round"
                            />
                          </svg>
                        </div>
                      </div>
                    </div>
                  </RadioGroupOption>
                </div>
              </RadioGroup>
            </div>

            <div
              class="flex justify-end items-center dark:text-white text-slate-900 bg-gray-100 dark:bg-slate-800 gap-4 px-6 py-3"
            >
              <button @click="setIsOpen(false)" type="button">Anuluj</button>
              <button
                type="button"
                :disabled="!selected"
                class="inline-flex text-white disabled:opacity-70 disabled:hover:cursor-default disabled:hover:bg-blue-700 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                @click="confirmUpdate"
              >
                Aktualizuj
              </button>
            </div>
          </DialogPanel>
        </TransitionChild>
      </div>
    </Dialog>
  </TransitionRoot>
</template>
