<script lang="ts" setup>
import Heading from '@/layouts/Partials/AppHeading.vue'
import ApartmentsList from '@/pages/Apartments/Partials/ApartmentsList.vue'
import ReservationForm from '@/pages/Reservations/Partials/ReservationForm.vue'
import type { Apartment } from '@/types'
import { useRootStore } from '@/store'
import { onMounted } from 'vue'

interface Props {
  apartments: Apartment[]
}

const store = useRootStore()
const props = defineProps<Props>()

onMounted(() => {
  store.setApartments(props.apartments)
})
</script>

<template>
  <Head>
    <title>Rezerwacja</title>
    <meta
      name="description"
      content="Wybierz odpowiedni domek dla siebie i Twojej rodziny i zarezerwuj swój pobyt."
    />
  </Head>

  <Heading>
    <template #default>Rezerwacja</template>
    <template #slogan
      >Zarezerwuj swój pobyt w jednym z naszych domków.</template
    >
  </Heading>
  <ReservationForm />
  <ApartmentsList :apartments="store.filterApartments" />
</template>
