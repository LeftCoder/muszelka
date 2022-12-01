<script lang="ts" setup>
import { ref, onMounted } from 'vue'
import Card from '@/pages/Dashboard/Partials/Card.vue'

const confirmed = ref(0)
const apartments = ref(0)
onMounted(() => {
  window.axios.get(`/dashboard/api/stats`).then((result) => {
    confirmed.value = result.data.confirmed
    apartments.value = result.data.apartments
  })
})
</script>

<script lang="ts">
import AuthenticatedLayout from '@/layouts/Authenticated.vue'

export default {
  layout: AuthenticatedLayout,
}
</script>

<template>
  <Head>
    <title>Dashboard</title>
    <meta name="description" content="Dashboard dla właścicieli" />
  </Head>

  <div class="w-full flex flex-col sm:flex-row gap-10">
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
