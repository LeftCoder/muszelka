<script lang="ts" setup>
import Card from '@/Pages/Dashboard/Partials/Card.vue'
</script>

<script lang="ts">
import AuthenticatedLayout from '@/Layouts/Authenticated.vue'

export default {
  layout: AuthenticatedLayout,
}
</script>

<template>
  <Head>
    <title>Dashboard</title>
    <meta name="description" content="Dashboard dla właścicieli" />
  </Head>

  <div class="flex gap-10">
    <Card href="/dashboard/rezerwacje">
      <template #title>Aktywne Rezerwacje</template>
      10
    </Card>
    <Card href="/dashboard/domki">
      <template #title>Wolne Domki</template>
      8
    </Card>
  </div>
</template>
