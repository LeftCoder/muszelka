<script lang="ts" setup>
import { computed } from 'vue'
import { useRootStore } from '@/store'
import type { Apartment } from '@/types'
import NoBookingDate from '@/shared/NoBookingDate.vue'
import ApartmentItem from '@/pages/Apartments/Partials/ApartmentItem.vue'
import NoItems from '@/shared/NoItems.vue'

interface Props {
  apartments: Apartment[] | undefined
}

const props = defineProps<Props>()
const store = useRootStore()
const aparmentIsBusy = computed(() => {
  const datesPicked = store.reservation.start && store.reservation.end
  const apartmentSelected = store.reservation.apartment_id !== -1
  return datesPicked && apartmentSelected
})
</script>

<template>
  <div class="grid grid-cols-1 gap-24 mb-24 lg:mb-64">
    <ApartmentItem
      v-for="apartment in props.apartments"
      v-if="props.apartments?.length"
      :apartment="apartment"
    />
    <NoBookingDate v-else-if="aparmentIsBusy" />
    <NoItems v-else
      ><h2 class="text-2xl text-slate-900 text-center dark:text-slate-100">
        Brak domków do wyświetlenia.
      </h2></NoItems
    >
  </div>
</template>
