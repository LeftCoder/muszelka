<script lang="ts" setup>
import { ref, onMounted } from 'vue'
import { MoonIcon, SunIcon } from '@heroicons/vue/20/solid/index.js'

const storageKey = 'theme-preference'

const getColorPreference = () => {
  if (localStorage.getItem(storageKey)) {
    return localStorage.getItem(storageKey) as string
  } else {
    return window.matchMedia('(prefers-color-scheme: dark)').matches
      ? 'dark'
      : 'light'
  }
}

const theme = ref(getColorPreference())

const reflectPreference = () => {
  if (theme.value === 'dark') {
    document.documentElement.classList.add('dark')
  } else {
    document.documentElement.classList.remove('dark')
  }
  document.documentElement.setAttribute('data-theme', theme.value)
}

const setPreference = () => {
  localStorage.setItem(storageKey, theme.value)
  reflectPreference()
}

const onClick = () => {
  theme.value = theme.value === 'light' ? 'dark' : 'light'
  setPreference()
}

onMounted(() => {
  reflectPreference()

  window
    .matchMedia('(prefers-color-scheme: dark)')
    .addEventListener('change', ({ matches: isDark }) => {
      theme.value = isDark ? 'dark' : 'light'
      setPreference()
    })
})
</script>
<template>
  <button
    type="button"
    class="mr-2 flex h-6 w-6 items-center justify-center rounded-lg shadow-md shadow-black/5 ring-1 ring-black/5 dark:bg-slate-700 dark:ring-inset dark:ring-white/5"
    title="Tryb ciemny/jasny"
    :aria-label="theme"
    aria-live="polite"
    @click="onClick"
  >
    <SunIcon
      class="hidden h-5 w-5 text-blue-400 dark:text-gray-400 [[data-theme=light]_&]:block"
    />
    <MoonIcon
      class="hidden h-5 w-5 text-blue-400 dark:text-gray-400 [[data-theme=dark]_&]:block"
    />
  </button>
</template>
