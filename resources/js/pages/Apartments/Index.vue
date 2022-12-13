<script lang="ts" setup>
import Heading from '@/layouts/Partials/AppHeading.vue'
import ApartmentsList from '@/pages/Apartments/Partials/ApartmentsList.vue'
import type { Apartment } from '@/types'
import { PropType } from 'vue'

const props = defineProps({
  apartments: {
    type: Object as PropType<Apartment[]>,
    default: () => ({}),
  },
})
</script>

<template>
  <Head>
    <title>Nasze domki</title>
    <meta
      name="description"
      content="Zajrzyj do środka naszych domków letniskowych i wybierz coś dla siebie."
    />
  </Head>
  <Heading>
    <template #default>Nasze domki</template>
    <template #slogan>Zajrzyj do środka i wybierz coś dla siebie.</template>
  </Heading>
  <ApartmentsList :apartments="props.apartments" />
</template>
