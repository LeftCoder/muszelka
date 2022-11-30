<script lang="ts" setup>
import {
  QuestionMarkCircleIcon,
  ChevronDownIcon,
} from '@heroicons/vue/20/solid/index.js'
import { ref } from 'vue'
import type { Faq } from '@/types'

interface Props {
  faq: Faq
}

const props = defineProps<Props>()
const open = ref(false)
</script>

<template>
  <div
    class="bg-white font-medium text-left text-slate-900 border border-slate-200 focus:ring-4 focus:ring-slate-200 hover:bg-slate-100"
  >
    <button
      @click="open = !open"
      type="button"
      class="flex items-center justify-between w-full px-5 py-6"
      :class="open ? 'bg-slate-200' : ''"
      aria-expanded="false"
    >
      <span class="flex items-center">
        <QuestionMarkCircleIcon class="h-5 w-5 text-amber-400 mr-2" />
        <h2>{{ props.faq.question }}</h2>
      </span>

      <ChevronDownIcon
        class="h-5 w-5 text-slate-500"
        :class="open ? 'rotate-180' : 'rotate-0'"
      />
    </button>

    <div :class="open ? 'block' : 'hidden'">
      <div class="p-5 border bg-white border-b-0 border-slate-200">
        <p class="text-lg font-normal text-slate-500">
          {{ props.faq.answer }}
        </p>
      </div>
    </div>
  </div>
</template>
