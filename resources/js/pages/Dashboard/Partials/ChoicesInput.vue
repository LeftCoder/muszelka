<script setup lang="ts">
import { Feature } from '@/types'
import Choices, { Choice } from 'choices.js'
import 'choices.js/public/assets/styles/choices.min.css'
import { computed, onMounted, onUnmounted, ref } from 'vue'

interface Props {
  features: Feature[]
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

<style>
.choices__inner {
  border: 1px solid rgb(203 213 225 / 1);
  padding: 0.625rem;
  border-radius: 0.5rem;
  font-size: 0.875rem;
  line-height: 1.25rem;
  background-color: rgb(248 250 252 / 1);
  color: rgb(15 23 42 / 1);
  min-height: min-content;
}

html.dark .choices__inner {
  border: 1px solid #374151;
  background-color: #374151;
}

html.dark .choices__input {
  background-color: #374151;
  color: #f1f5f9;
}

.choices__list--multiple .choices__item.is-highlighted,
.choices__list--multiple .choices__item {
  background-color: #3b82f6;
  border: 1px solid #3b82f6;
}

.choices[data-type*='select-multiple'] .choices__button,
.choices[data-type*='text'] .choices__button {
  border-left: none;
}

.choices__input {
  font-size: inherit;
  margin-bottom: 0;
}
</style>
