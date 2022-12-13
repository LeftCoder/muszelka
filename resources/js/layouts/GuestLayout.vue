<script lang="ts" setup>
import Footer from '@/layouts/Partials/TheFooter.vue'
import Navbar from '@/layouts/Partials/TheNavbar.vue'
</script>

<template>
  <div class="min-h-screen flex flex-col justify-start">
    <Navbar />
    <main>
      <div
        class="mx-auto mt-0 grid w-full max-w-[85rem] grid-cols-1 px-4 sm:mt-20 sm:px-6 lg:px-8 xl:mt-32"
      >
        <slot />
      </div>
    </main>
    <Footer class="mt-auto" />
  </div>
</template>
