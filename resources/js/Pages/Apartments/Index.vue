<script lang="ts" setup>
import Heading from '@/Layouts/Partials/Heading.vue'
import ApartmentsList from '@/Pages/Apartments/Partials/ApartmentsList.vue'
import type { Apartment } from '@/types'
import { PropType } from 'vue'

const props = defineProps({ apartments: Object as PropType<Apartment[]> })
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
