<script lang="ts" setup>
import { computed, watch, provide } from 'vue'
import { usePage } from '@inertiajs/inertia-vue3'
import Sidebar from '@/pages/Dashboard/Partials/Sidebar.vue'
import Navbar from '@/pages/Dashboard/Partials/Navbar.vue'
import Toast from '@/utils/toast'
import '@/../css/toast.css'

provide('toast', Toast)
const message = computed<string>(() => usePage<any>().props.value.flash.message)

watch(
  () => message.value,
  message => {
    if (message) {
      Toast(message)
    }
  }
)
</script>

<template>
  <Head>
    <meta name="robots" content="noindex,nofollow" />
  </Head>

  <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
    <Navbar />
    <div class="flex h-full min-h-[calc(100vh_-_80px)]">
      <Sidebar />
      <div class="flex-1 w-full h-full px-8 py-5">
        <slot />
      </div>
    </div>
  </div>
</template>
