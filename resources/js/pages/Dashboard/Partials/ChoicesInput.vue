<script setup lang="ts">
import { Feature } from '@/types'
import Choices, { Choice } from 'choices.js'
import 'choices.js/public/assets/styles/choices.min.css'
import { computed, onMounted, onUnmounted, ref } from 'vue'

interface Props {
  features: Feature[] | undefined
  modelValue: number[]
}

const emit = defineEmits(['update:modelValue'])
const props = defineProps<Props>()
const feat = ref<HTMLSelectElement | null>(null)
const choices = ref<Choices | null>(null)
let allFeatures: Feature[]

const options = {
  removeItemButton: true,
  allowHTML: true,
  duplicateItemsAllowed: false,
  loadingText: 'Wczytywanie...',
  noResultsText: 'Brak wyników',
  noChoicesText: 'Brak opcji do wyboru',
  itemSelectText: 'Naciśnij aby wybrać',
}

const onChange = (e: Event) => {
  const select = e.target as HTMLSelectElement
  let options = Array.from(select.selectedOptions).map((option) =>
    Number(option.value)
  )
  emit('update:modelValue', options)
}

const settingChoices = computed<Choice[]>(() => {
  return allFeatures.map((feature) => ({
    label: feature.name,
    value: feature.id,
    selected: props.features?.find((f) => f.id === feature.id) ? true : false,
  }))
})

onMounted(() => {
  window.axios.get(`/dashboard/api/features`).then((result) => {
    allFeatures = result.data ?? []
    if (feat.value) {
      choices.value = new Choices(feat.value, {
        ...options,
        maxItemCount: allFeatures.length,
      })
      choices.value.setChoices(settingChoices.value)
    }
  })
})

onUnmounted(() => {
  choices.value?.destroy()
})
</script>

<template>
  <select
    :value="props.modelValue"
    @change="onChange"
    ref="feat"
    multiple
  ></select>
</template>
