<script lang="ts" setup>
import HeroSection from '@/Pages/Home/Partials/HeroSection.vue'
import ReservationForm from '@/Pages/Home/Partials/ReservationForm.vue'
import TestemonialList from '@/Pages/Home/Partials/TestemonialList.vue'
import Navbar from '@/Layouts/Partials/Navbar.vue'
import Footer from '@/Layouts/Partials/Footer.vue'
</script>

<script lang="ts">
export default {
  layout: null,
}
</script>

<template>
  <Head>
    <title>Domki do wynajęcia nad morzem</title>
    <meta
      name="description"
      content="Domki letniskowe Muszelka to idealne miejsce do wypoczynku nad polskim morzem dla całej rodziny."
    />
  </Head>

  <main class="overflow-hidden">
    <div
      class="bg-[url('/storage/images/hero-image.webp')] bg-cover bg-gray-300 bg-blend-multiply h-screen"
    >
      <Navbar />
      <div
        class="mx-auto mt-16 grid w-full max-w-[85rem] grid-cols-1 px-4 sm:mt-20 sm:px-6 lg:px-8 xl:mt-32"
      >
        <HeroSection />
        <ReservationForm />
      </div>
    </div>
    <div
      class="mx-auto mt-16 grid w-full max-w-[85rem] grid-cols-1 px-4 sm:mt-20 sm:px-6 lg:px-8 xl:mt-32"
    >
      <TestemonialList />
    </div>
  </main>
  <Footer />
</template>
