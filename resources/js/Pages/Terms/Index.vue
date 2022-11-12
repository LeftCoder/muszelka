<script lang="ts" setup>
import Heading from '@/Layouts/Partials/Heading.vue'
import TermsContent from '@/Pages/Terms/Partials/TermsContent.vue'
</script>

<template>
  <Head>
    <title>Regulamin</title>
    <meta
      name="description"
      content="Zapoznaj się z naszym regulaminem. Bardzo prosimy o jego przestrzeganie."
    />
  </Head>

  <Heading>
    <template #default>Regulamin</template>
    <template #slogan>Bardzo prosimy o jego przestrzeganie.</template>
  </Heading>

  <section class="mb-32">
    <p class="text-lg">
      Serdecznie witamy w Muszelce, Mamy nadzieję, że przestrzeganie poniższych
      punktów zapewni Państwu komfort i spokojny wypoczynek. Właściciele
      Muszelki służą wszelką pomocą i są do Państwa dyspozycji w domu lub pod
      numerem telefonu 692 085 935.
    </p>
  </section>

  <TermsContent />

  <div class="text-right mt-24 mb-48">
    <h2 class="text-2xl font-sign">Życzymy Państwu miłego pobytu,</h2>
    <h2 class="text-2xl font-sign">właściciele Muszelki</h2>
  </div>
</template>
