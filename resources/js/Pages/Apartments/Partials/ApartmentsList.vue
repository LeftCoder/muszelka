<script lang="ts" setup>
import type { Apartment } from '@/types'
import ApartmentItem from './ApartmentItem.vue'

interface Props {
  apartments: Apartment[] | undefined
}

const props = defineProps<Props>()
</script>

<template>
  <div class="grid grid-cols-1 gap-24 mb-64">
    <ApartmentItem
      v-for="apartment in props.apartments"
      :apartment="apartment"
    />
  </div>
</template>
