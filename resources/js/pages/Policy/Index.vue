<script lang="ts" setup>
import Heading from '@/layouts/Partials/AppHeading.vue'
import PolicyContent from '@/pages/Policy/Partials/PolicyContent.vue'
</script>
<template>
  <Head>
    <title>Polityka prywatności</title>
    <meta
      name="description"
      content="Zapoznaj się z naszą polityką przetwarzania danych."
    />
  </Head>

  <Heading>
    <template #default>Polityka prywatności</template>
    <template #slogan
      >Zapoznaj się z naszymi zasadami przetwarzania danych.</template
    >
  </Heading>

  <div class="mb-24 lg:mb-64">
    <PolicyContent />
  </div>
</template>
