<script lang="ts" setup>
import Menu from '@/pages/Dashboard/Partials/Menu.vue'
import ThemeToggle from '@/shared/ThemeToggle.vue'
</script>

<template>
  <nav class="bg-white border-slate-200 px-2 sm:px-4 dark:bg-slate-800">
    <div class="flex flex-wrap justify-between items-center">
      <Link href="/dashboard" class="mr-auto flex-none text-slate-900">
        <img
          src="/storage/images/logo-dark.svg"
          class="mr-3 h-20 dashboard-logo"
          alt="Muszelka Logo"
        />
        <span class="sr-only">Muszelka Logo</span>
      </Link>

      <div class="flex gap-5 items-center">
        <ThemeToggle />
        <div id="navbar-default">
          <Menu />
        </div>
      </div>
    </div>
  </nav>
</template>

<style scoped>
html.dark .dashboard-logo {
  filter: brightness(0) invert(1);
}
</style>
