<script setup lang="ts">
import type { MetaInformations } from '@/types'

interface Props {
  meta: MetaInformations | undefined
}

const props = defineProps<Props>()
</script>
<template>
  <div class="flex flex-col sm:flex-row justify-between sm:items-center mt-5">
    <div>Łącznie: {{ props.meta?.total }}</div>
    <div v-if="props.meta && props.meta.links?.length > 3">
      <div
        class="mt-5 sm:mt-0 flex justify-center sm:justify-end sm:flex-wrap text-sm -mb-1"
      >
        <template v-for="(link, key) in props.meta?.links">
          <div
            v-if="link.url === null"
            :key="key"
            class="py-2 px-3 text-slate-400 leading-4"
            v-html="link.label"
          />
          <Link
            v-else
            :key="`link-${key}`"
            class="py-2 px-3 leading-tight hover:bg-slate-100 hover:text-slate-700 dark:border-slate-700 dark:hover:bg-slate-700 dark:hover:text-white"
            :class="
              link.active
                ? 'bg-blue-500 text-slate-100 dark:text-slate-100'
                : 'bg-white dark:bg-slate-800 dark:text-slate-400'
            "
            :href="link.url"
            v-html="link.label"
          />
        </template>
      </div>
    </div>
  </div>
</template>
