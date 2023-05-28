<script lang="ts" setup>
import HeroSection from '@/pages/Home/Partials/HeroSection.vue'
import ReservationForm from '@/pages/Home/Partials/ReservationForm.vue'
import TestemonialList from '@/pages/Home/Partials/TestemonialList.vue'
import StorySection from '@/pages/Home/Partials/StorySection.vue'
import Navbar from '@/layouts/Partials/TheNavbar.vue'
import Footer from '@/layouts/Partials/TheFooter.vue'
import { PropType } from 'vue'
import { Review } from '@/types'

const props = defineProps({
  reviews: {
    type: Object as PropType<Review[]>,
    default: () => ({}),
  },
})
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
      class="bg-[url('/storage/images/hero-image.webp')] bg-auto sm:bg-cover bg-slate-300 bg-blend-multiply min-h-screen"
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
      <StorySection />
      <TestemonialList :reviews="props.reviews" />
    </div>
  </main>
  <Footer />
</template>
