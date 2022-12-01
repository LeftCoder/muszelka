<script lang="ts" setup></script>

<template>
  <Link
    class="block p-6 max-w-sm bg-white rounded-lg border border-slate-200 shadow-md hover:bg-slate-100 dark:bg-slate-800 dark:border-slate-700 dark:hover:bg-slate-700"
  >
    <div class="max-w-64">
      <h5
        class="mb-2 text-2xl font-bold tracking-tight text-slate-500  dark:text-white"
      >
        <slot name="title"></slot>
      </h5>
      <p class="font-normal text-slate-700 dark:text-slate-400">
        <div
          class="flex justify-center text-6xl font-bold text-blue-500 p-16"
        >
          <slot />
        </div>
      </p>
    </div>
  </Link>
</template>
