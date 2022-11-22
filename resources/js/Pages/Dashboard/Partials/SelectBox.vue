<script lang="ts" setup>
import { computed } from 'vue'
import {
  Listbox,
  ListboxButton,
  ListboxOptions,
  ListboxOption,
} from '@headlessui/vue'
import { CheckIcon, ChevronUpDownIcon } from '@heroicons/vue/20/solid'

const props = defineProps({ modelValue: [Number, String] })
const emit = defineEmits(['update:modelValue'])

const statuses = [
  {
    id: '',
    name: 'Wszystkie',
  },
  {
    id: 1,
    name: 'Przyjęta',
  },
  {
    id: 2,
    name: 'Potwierdzona',
  },
  {
    id: 3,
    name: 'Anulowana',
  },
  {
    id: 4,
    name: 'Zakończona',
  },
]

const selectedStatus = computed(
  () => statuses.find((status) => status.id === props.modelValue)?.name
)
</script>

<template>
  <Listbox
    :value="props.modelValue"
    @update:modelValue="(value) => emit('update:modelValue', value)"
  >
    <div class="relative flex-1">
      <ListboxButton
        class="relative block w-full text-left p-4 text-sm text-slate-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
      >
        <span class="block truncate dark:text-gray-400">{{
          selectedStatus ? selectedStatus : 'Wszystkie'
        }}</span>
        <span
          class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-2"
        >
          <ChevronUpDownIcon class="h-5 w-5 text-gray-400" aria-hidden="true" />
        </span>
      </ListboxButton>

      <transition
        leave-active-class="transition duration-100 ease-in"
        leave-from-class="opacity-100"
        leave-to-class="opacity-0"
      >
        <ListboxOptions
          class="absolute mt-1 max-h-60 w-full z-50 overflow-auto rounded-md bg-white dark:bg-gray-700 py-1 text-base shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none sm:text-sm"
        >
          <ListboxOption
            v-slot="{ active, selected }"
            v-for="status in statuses"
            :key="status.name"
            :value="status.id"
            as="template"
          >
            <li
              :class="[
                active
                  ? 'bg-blue-100 text-blue-900'
                  : 'text-slate-900 dark:text-white',
                'relative cursor-default select-none py-2 pl-10 pr-4',
              ]"
            >
              <span
                :class="[
                  selected ? 'font-medium' : 'font-normal',
                  'block truncate',
                ]"
                >{{ status.name }}</span
              >
              <span
                v-if="selected"
                class="absolute inset-y-0 left-0 flex items-center pl-3 text-blue-600"
              >
                <CheckIcon class="h-5 w-5" aria-hidden="true" />
              </span>
            </li>
          </ListboxOption>
        </ListboxOptions>
      </transition>
    </div>
  </Listbox>
</template>
