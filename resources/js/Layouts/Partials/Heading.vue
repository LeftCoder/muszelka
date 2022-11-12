<script lang="ts" setup></script>
<template>
  <div class="w-full mb-24 text-center">
    <h1
      class="text-slate-900 font-extrabold text-4xl sm:text-5xl lg:text-6xl tracking-tight"
    >
      <slot />
    </h1>
    <p class="mt-6 text-lg text-center max-w-3xl mx-auto">
      <slot name="slogan" />
    </p>
  </div>
</template>
