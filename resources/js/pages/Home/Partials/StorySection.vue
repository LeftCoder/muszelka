<script setup lang="ts"></script>

<template>
  <div class="mt-12 sm:mt-0 mb-24 lg:mb-64">
    <div class="w-full mb-24 text-center">
      <h2
        class="text-slate-900 font-extrabold text-4xl sm:text-5xl lg:text-6xl tracking-tight"
      >
        Kilka słów o nas
      </h2>
      <p class="mt-6 text-lg text-slate-600 text-center max-w-3xl mx-auto">
        Poznaj bliżej ośrodek wypoczynkowy Muszelka.
      </p>
    </div>
    <div class="flex">
      <div class="w-full lg:w-1/2 relative hidden lg:block">
        <img
          src="/storage/images/fp-2.jpg"
          loading="lazy"
          alt="Weranda jednego z domków"
          class="rounded-lg absolute top-0 left-0 w-3/4"
        />

        <img
          src="/storage/images/fp-1.jpg"
          loading="lazy"
          alt="Plac zabaw dla dzieci"
          class="rounded-lg absolute top-48 left-32 w-3/4"
        />
      </div>
      <div class="w-full lg:w-1/2 px-6">
        <div class="mb-4">
          <h2 class="text-2xl font-sign">Szanowni Państwo,</h2>
        </div>

        <p class="mb-4">
          Miejscowość nasza znaduje się na środkowym wybrzeżu Bałyku, pomiędzy
          Darłowem a Jarosławcem, od południa odgrodzona jest jeziorem Kopań i
          Wzgórzem Barzowickim a z drugiej strony linią brzegową morza.
        </p>

        <p class="mb-4">
          Ta piękna kraina obfituje w skarby przyrody, piaszczyste plaże,
          rozległe równiny, lesiste wzgórza, zielone łąki. Jeśli szukacie
          Państwo ciszy i spokoju to nasza miejscowość posiada wysokie walory
          wypoczynkowe służące regeneracji sił fizycznych.
        </p>
        <p class="mb-4">
          Można także wypoczywać czynnie, gdyż u nas znajduje się bardzo ciekawy
          szlak rowerowy (rowery na wyposażeniu Ośrodka) nad samym morzem w
          stronę Darłówka i Jarosławca.
        </p>
        <p class="mb-12 lg:mb-8">
          Nasz Ośrodek to duży teren, na którym znajdują się domki (50 miejsc
          noclegowych). Domki są tak usytuowane, że zapewniają komfort
          wypoczynku. Na terenie jest dużo zieleni, dwa place zabaw, boisko do
          gier (odległość do morza 250m).
        </p>

        <div class="flex gap-4 justify-center lg:justify-end">
          <Link href="/domki">
            <button
              type="button"
              class="border text-slate-900 rounded-lg text-lg bg-white hover:bg-slate-100 shadow-md font-semibold focus:outline-none md:px-6 px-6 md:py-4 py-3 xl:leading-4"
            >
              Nasze domki
            </button>
          </Link>
          <Link href="/rezerwacja">
            <button
              type="button"
              class="border text-white rounded-lg text-lg bg-amber-500 hover:bg-amber-400 shadow-md font-semibold focus:outline-none md:px-6 px-6 md:py-4 py-3 xl:leading-4"
            >
              Rezerwacja
            </button>
          </Link>
        </div>
      </div>
    </div>
  </div>
</template>
