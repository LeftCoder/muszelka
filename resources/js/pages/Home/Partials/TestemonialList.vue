<script lang="ts" setup>
import TestimonialItem from '@/pages/Home/Partials/TestimonialItem.vue'
import AccentImage from '@/shared/AccentImage.vue'
</script>

<template>
  <div class="mt-12 sm:mt-0 mb-24 lg:mb-64">
    <div class="w-full mb-24 text-center">
      <h2
        class="text-slate-900 font-extrabold text-4xl sm:text-5xl lg:text-6xl tracking-tight"
      >
        Co mówią nasi goście?
      </h2>
      <p class="mt-6 text-lg text-slate-600 text-center max-w-3xl mx-auto">
        Dowiedz się o nas trochę wiecej.
      </p>
    </div>
    <div
      class="grid grid-cols-1 gap-12 sm:gap-8 sm:grid-cols-2 lg:grid-cols-3 relative"
    >
      <AccentImage posX="left-[-40px]" posY="top-8" />

      <div class="space-y-8">
        <TestimonialItem
          opinion="Fantastyczne miejsce i super właściciele. Polecam. Każdy domek ma własne miejsce parkingowe dla samochodu. Jest też plac zabaw dla dzieci i bardzo blisko do morza. Miodzio. 😀"
          sign="Łukasz Jagodziński"
        />
        <TestimonialItem
          opinion="Polecam każdej rodzinie z dziećmi, ceniącą prywatność i ciszę. Domki dobrze wyposażone, czyste i zadbane. Duży teren z placem zabaw, można spokojnie pograć w piłkę. Właściciele życzliwi i pomocni. Pozdrawiamy pana Michała, i życzymy powodzenia w dalszym rozwoju ośrodka."
          sign="Marta Cecot"
        />
      </div>
      <div class="space-y-8">
        <TestimonialItem
          opinion="Domki czyste blisko plaży, ośrodek świetne zlokalizowany, cisza, spokój. Polecam."
          sign="Krzysiek Kielar"
        />
        <TestimonialItem
          opinion="Do ośrodka Muszelka w Wici jeździmy od lat. Poprzedni właściciele byli dla nas super niemal jak rodzina. W tym roku mogliśmy poznać nowych właścicieli. Są bardzo mili, można na nich liczyć. Od pierwszego spotkania byli dla nas bardzo życzliwi i otwarci."
          sign="Barbara Ziółkowska"
        />
      </div>
      <div class="space-y-8">
        <TestimonialItem
          opinion="Byliśmy pierwszymi gośćmi nowych właścicieli. Wrażenia niezapomniane. Super ludzie, pomocni, życzliwi, otwarci. Zostaliśmy bardzo miło przyjęci. 🚀 Miejsce jest świetne, domki prawie przy morzu, nocą słychać szum fal. 😍"
          sign="Anna Guzowska"
        />
      </div>

      <AccentImage class="rotate-180" posX="right-[-20px]" posY="bottom-20" />
    </div>
  </div>
</template>
