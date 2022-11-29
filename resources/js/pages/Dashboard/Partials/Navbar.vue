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
        <button
          data-collapse-toggle="navbar-default"
          type="button"
          class="inline-flex items-center p-2 text-sm text-slate-500 rounded-lg md:hidden hover:bg-slate-100 focus:outline-none focus:ring-2 focus:ring-slate-200 dark:text-slate-400 dark:hover:bg-slate-700 dark:focus:ring-slate-600"
          aria-controls="navbar-default"
          aria-expanded="false"
        >
          <span class="sr-only">Otwórz główne menu</span>
          <svg
            class="w-6 h-6"
            aria-hidden="true"
            fill="currentColor"
            viewBox="0 0 20 20"
            xmlns="http://www.w3.org/2000/svg"
          >
            <path
              fill-rule="evenodd"
              d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
              clip-rule="evenodd"
            ></path>
          </svg>
        </button>
        <div class="hidden w-full md:block md:w-auto" id="navbar-default">
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
