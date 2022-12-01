<script lang="ts" setup>
import ContactForm from '@/pages/Contact/Partials/ContactForm.vue'
import GoogleMap from '@/pages/Contact/Partials/GoogleMap.vue'
import Heading from '@/layouts/Partials/Heading.vue'
import AccentImage from '@/shared/AccentImage.vue'
</script>

<template>
  <Head>
    <title>Kontakt</title>
    <meta
      name="description"
      content="Mapa dojazdu oraz formularz kontaktowy są do Twojej dyspozycji."
    />
  </Head>
  <Heading>
    <template #default>Kontakt</template>
    <template #slogan>Jeśli masz pytania, wyślij do nas wiadomość.</template>
  </Heading>

  <div class="flex flex-col lg:flex-row gap-32 sm:gap-8 mb-24 lg:mb-64">
    <div
      class="order-last sm:order-none w-full mb-0 sm:mb-12 lg:mb-0 lg:w-1/2 p-8 bg-cyan-900 rounded-lg"
    >
      <GoogleMap />
    </div>
    <div class="relative w-full lg:w-1/2 flex items-center">
      <AccentImage
        posX="right-[-30px]"
        posY="top-[104px]"
        class="hidden lg:block"
      />
      <ContactForm />
    </div>
  </div>
</template>
