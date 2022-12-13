<script lang="ts" setup>
//@ts-ignore
import VueTailwindDatepicker from 'vue-tailwind-datepicker'
import { useMediaQuery } from '@vueuse/core'
import { ref, computed } from 'vue'

interface Props {
  modelValue:
    | [Date, Date]
    | { start: Date | string; end: Date | string }
    | {
        startDate: Date | string
        endDate: Date | string
      }
    | string
}
const props = defineProps<Props>()
const emit = defineEmits(['update:modelValue'])
const isDesktop = useMediaQuery('(min-width: 640px)')

const dateValue = computed({
  get() {
    return props.modelValue
  },
  set(value) {
    emit('update:modelValue', value)
  },
})

const options = ref({
  shortcuts: {
    today: 'Dzisiaj',
    yesterday: 'Wczoraj',
    past: (period: string) => period + ' dni',
    currentMonth: 'Bierzący miesiąc',
    pastMonth: 'Poprzedni miesiąc',
  },
  footer: {
    apply: 'Wybierz',
    cancel: 'Anuluj',
  },
})

const formatter = ref({
  date: 'DD.MM.YYYY',
  month: 'MMM',
})

const dDate = (date: Date): boolean => {
  const start = new Date()
  start.setUTCHours(0, 0, 0, 0)
  return date < start
}
</script>

<template>
  <div>
    <VueTailwindDatepicker
      v-model="dateValue"
      :formatter="formatter"
      :placeholder="
        isDesktop ? 'Zameldowanie ~ Wymeldowanie' : 'Początek ~ Koniec'
      "
      :options="options"
      :shortcuts="false"
      :disable-date="dDate"
      :auto-apply="isDesktop"
      i18n="pl"
      input-classes="bg-slate-50 border border-slate-300 text-slate-900 text-sm rounded-lg focus:ring-cyan-500 focus:border-cyan-500 block w-full p-2.5"
    />
  </div>
</template>
