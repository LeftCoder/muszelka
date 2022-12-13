<script lang="ts" setup>
import { ref, onMounted } from 'vue'
import Card from '@/pages/Dashboard/Partials/DashCard.vue'

interface ResponseData {
  confirmed: number
  apartments: number
}

const confirmed = ref(0)
const apartments = ref(0)
onMounted(() => {
  window.axios.get<ResponseData>(`/dashboard/api/stats`).then(({ data }) => {
    confirmed.value = data.confirmed
    apartments.value = data.apartments
  })
})
</script>

<script lang="ts">
import AuthenticatedLayout from '@/layouts/AuthenticatedLayout.vue'

export default {
  layout: AuthenticatedLayout,
}
</script>

<template>
  <Head>
    <title>Dashboard</title>
    <meta name="description" content="Dashboard dla właścicieli" />
  </Head>

  <div class="flex flex-wrap gap-10 mt-4">
    <Card href="/dashboard/rezerwacje?status=2">
      <template #title>Potwierdzone</template>
      {{ confirmed }}
    </Card>
    <Card href="/dashboard/domki">
      <template #title>Domki</template>
      {{ apartments }}
    </Card>
  </div>
</template>
