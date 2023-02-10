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
          src="/storage/images/default.jpg"
          loading="lazy"
          alt="Plac zabaw dla dzieci"
          class="rounded-lg absolute top-48 left-32 w-3/4 z-10"
        />
        <img
          src="/storage/images/fp-1.jpg"
          loading="lazy"
          alt="Jeden z domków znajdujących się w ośrodku"
          class="rounded-lg absolute top-96 left-8 w-3/4"
        />
      </div>
      <div class="w-full lg:w-1/2 px-6">
        <div class="mb-4">
          <h2 class="text-2xl font-sign">Szanowni Państwo,</h2>
        </div>

        <p class="mb-4">
          W zacisznej Miejscowości Wicie, w sąsiedztwie lasu, w pierwszej linii
          brzegowej, przy jednej z bocznych ulic kilkanaście lat temu powstała
          Muszelka. Miejsce wyjątkowe, które daje odskocznie od codzienności.
          Miejsce, w którym można naładować baterie, odpocząć, pobyć bliżej
          natury jednocześnie nie rezygnując z komfortu.
        </p>

        <p class="mb-4">
          W pobliżu znajdziesz świetną ścieżkę rowerową biegnącą tuż obok plaży.
          Prawdziwa gratka dla miłośników przejażdżek rowerowych, a także dla
          tych, którzy kochają rolki, hulajnogi, oraz dla mam z wózkami 😊 A
          jeśli zatęsknisz za miejskim zgiełkiem – nic prostszego! W kilka minut
          znajdziesz się przy głównej ulicy, gdzie roi się od sklepików z
          pamiątkami i restauracji.
        </p>

        <p class="mb-4">
          No i najważniejsze – morze! Nasz piękny Bałtyk znajdujący się w
          odległości zaledwie 250 metrów od naszych domków, którego szum słychać
          podczas wieczornego relaksu na tarasie.
        </p>

        <p class="mb-4">
          Każdy z 10 domków został usytuowany w taki sposób aby dawać swobodę i
          intymność. W 2023 roku domki zostały wyremontowane, a ich wyposażenie
          wymienione na zupełnie nowe! Dla zapewnienia komfortu zostały
          wyposażone w klimatyzacje, a okna w moskitiery i rolety. Nowoczesne
          kuchnie, z dużą ilością miejsca do przechowywania, lodówka, płyta
          indukcyjna, czajnik, komplet nowych talerzy, garnków, sztućców i
          wszystkiego co niezbędne do samodzielnego przygotowania posiłków.
          Jeśli natomiast nie masz na to ochoty podpowiemy Ci gdzie można zjeść
          pyszną rybkę! 😊
        </p>

        <div class="mb-12 lg:mb-8">
          <details>
            <summary class="mb-4 hover:cursor-pointer hover:text-slate-900">
              Więcej szczegółów...
            </summary>

            <p class="mb-4">
              W skład małych domków wchodzi salon z rozkładaną kanapą wraz z
              aneksem kuchennym, łazienka, i sypialnia w której znajduje się
              trzyosobowe łóżko piętrowe. Duże domki posiadają dodatkowo
              sypialnie z łóżkiem małżeńskim lub rozkładaną sofą. No i
              oczywiście taras! Najważniejsze miejsce dla wszystkich
              urlopowiczów, kojarzące się z zapachem grilla, kwintesencja
              każdego urlopu.
            </p>

            <p class="mb-4">
              Każdy z domków posiada telewizor z telewizją naziemną, oraz
              możliwością podłączenia konsoli do gier.
            </p>

            <p class="mb-4">
              Na zewnątrz mnóstwo atrakcji znajdą także najmłodsi. Któż z nas
              będąc dzieckiem nie marzył o własnym drewnianym domku, z którego
              można stworzyć twierdzę? Lub wczuć się w rolę żeglarza wypatrując
              piratów 😊 Dzieciaki mają tutaj taką możliwość! Dwa place zabaw
              wyposażone w domek, zjeżdżalnie, wspinaczki, huśtawki, piaskownicę
              i wiele innych… Dzieciaki pozostając pod okiem rodziców mogą się
              bezpiecznie bawić, ponieważ teren jest ogrodzony i monitorowany.
            </p>

            <p class="mb-4">
              Do dyspozycji są także nowe rowery, leżaki, oraz parawany. Macie
              ochotę zabrać na urlop także swojego pupila? Zadzwońcie! W
              niektórych domkach możemy gościć także zwierzęta.
            </p>

            <p class="mb-4">
              Dla tych, którzy pragną więcej atrakcji polecamy wycieczkę do
              pobliskiego Darłowa, czy Jarosławca. Polecamy także wyjazd do
              Aquaparku, lub Doliny Charlotty z ZOO i fokarium.
            </p>
          </details>
        </div>
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
