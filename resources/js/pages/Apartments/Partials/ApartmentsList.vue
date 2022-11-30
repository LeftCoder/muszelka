<script lang="ts" setup>
import type { Apartment } from '@/types'
import NoBookingDate from '@/shared/NoBookingDate.vue'
import ApartmentItem from '@/pages/Apartments/Partials/ApartmentItem.vue'

interface Props {
  apartments: Apartment[] | undefined
}

const props = defineProps<Props>()
</script>

<template>
  <div class="grid grid-cols-1 gap-24 mb-64">
    <ApartmentItem
      v-if="props.apartments?.length"
      v-for="apartment in props.apartments"
      :apartment="apartment"
    />
    <NoBookingDate v-else />
  </div>
</template>
