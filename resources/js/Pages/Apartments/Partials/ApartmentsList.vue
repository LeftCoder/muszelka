<script lang="ts" setup>
import type { Apartment } from '@/types'
import NoItems from '@/Shared/NoItems.vue'
import ApartmentItem from '@/Pages/Apartments/Partials/ApartmentItem.vue'

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
    <NoItems v-else>Nie masz w tej chwili dodanych domków.</NoItems>
  </div>
</template>
