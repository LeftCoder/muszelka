<script lang="ts" setup>
import { computed, watch, provide } from 'vue'
import type { PageProps } from '@/types'
import { usePage } from '@inertiajs/vue3'
import Sidebar from '@/pages/Dashboard/Partials/DashSidebar.vue'
import Navbar from '@/pages/Dashboard/Partials/DashNavbar.vue'
import Toast from '@/utils/toast'
import '@/../css/toast.css'

provide('toast', Toast)
const message = computed(() => usePage<PageProps>().props.flash.message)

watch(
  () => message.value,
  (message) => {
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
