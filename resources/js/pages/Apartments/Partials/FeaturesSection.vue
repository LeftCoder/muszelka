<script setup lang="ts"></script>

<template>
  <div class="mt-12 sm:mt-0 mb-24 lg:mb-44">
    <div class="flex justify-center">
      <div class="grid grid-cols-3 md:grid-cols-6 gap-4">
        <div
          class="p-3 border shadow-md rounded-lg hover:cursor-pointer hover:bg-slate-50"
          title="Łazienka"
        >
          <svg
            class="text-teal-500"
            width="48"
            height="48"
            viewBox="0 0 24 24"
            stroke-width="2"
            stroke="currentColor"
            fill="none"
            stroke-linecap="round"
            stroke-linejoin="round"
          >
            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
            <path
              d="M4 12h16a1 1 0 0 1 1 1v3a4 4 0 0 1 -4 4h-10a4 4 0 0 1 -4 -4v-3a1 1 0 0 1 1 -1z"
            />
            <path d="M6 12v-7a2 2 0 0 1 2 -2h3v2.25" />
            <path d="M4 21l1 -1.5" />
            <path d="M20 21l-1 -1.5" />
          </svg>
        </div>
        <div
          class="p-3 border shadow-md rounded-lg hover:cursor-pointer hover:bg-slate-50"
          title="Lodówka"
        >
          <svg
            class="text-indigo-400"
            width="48"
            height="48"
            viewBox="0 0 24 24"
            stroke-width="2"
            stroke="currentColor"
            fill="none"
            stroke-linecap="round"
            stroke-linejoin="round"
          >
            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
            <rect x="5" y="3" width="14" height="18" rx="2" />
            <path d="M5 10h14" />
            <path d="M9 13v3" />
            <path d="M9 6v1" />
          </svg>
        </div>
        <div
          class="p-3 border shadow-md rounded-lg hover:cursor-pointer hover:bg-slate-50"
          title="Telewizor"
        >
          <svg
            class="text-orange-400"
            width="48"
            height="48"
            viewBox="0 0 24 24"
            stroke-width="2"
            stroke="currentColor"
            fill="none"
            stroke-linecap="round"
            stroke-linejoin="round"
          >
            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
            <rect x="3" y="7" width="18" height="13" rx="2" />
            <polyline points="16 3 12 7 8 3" />
          </svg>
        </div>
        <div
          class="p-3 border shadow-md rounded-lg hover:cursor-pointer hover:bg-slate-50"
          title="Parking na posesji"
        >
          <svg
            class="text-blue-400"
            width="48"
            height="48"
            viewBox="0 0 24 24"
            stroke-width="2"
            stroke="currentColor"
            fill="none"
            stroke-linecap="round"
            stroke-linejoin="round"
          >
            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
            <rect x="4" y="4" width="16" height="16" rx="2" />
            <path d="M9 16v-8h4a2 2 0 0 1 0 4h-4" />
          </svg>
        </div>
        <div
          class="p-3 border shadow-md rounded-lg hover:cursor-pointer hover:bg-slate-50"
          title="Udostępnione rowery"
        >
          <svg
            class="text-rose-400"
            width="48"
            height="48"
            viewBox="0 0 24 24"
            stroke-width="2"
            stroke="currentColor"
            fill="none"
            stroke-linecap="round"
            stroke-linejoin="round"
          >
            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
            <circle cx="5" cy="18" r="3" />
            <circle cx="19" cy="18" r="3" />
            <polyline points="12 19 12 15 9 12 14 8 16 11 19 11" />
            <circle cx="17" cy="5" r="1" />
          </svg>
        </div>
        <div
          class="p-3 border shadow-md rounded-lg hover:cursor-pointer hover:bg-slate-50"
          title="Możliwość grillowania"
        >
          <svg
            class="text-amber-900"
            width="48"
            height="48"
            viewBox="0 0 24 24"
            stroke-width="2"
            stroke="currentColor"
            fill="none"
            stroke-linecap="round"
            stroke-linejoin="round"
          >
            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
            <path
              d="M19 8h-14a6 6 0 0 0 6 6h2a6 6 0 0 0 5.996 -5.775l.004 -.225z"
            />
            <path d="M17 20a2 2 0 1 1 0 -4a2 2 0 0 1 0 4z" />
            <path d="M15 14l1 2" />
            <path d="M9 14l-3 6" />
            <path d="M15 18h-8" />
            <path d="M15 5v-1" />
            <path d="M12 5v-1" />
            <path d="M9 5v-1" />
          </svg>
        </div>
      </div>
    </div>
    <div class="my-12">
      <p class="text-lg text-center max-w-3xl mx-auto">
        Udogodnienia, odległości
      </p>
    </div>
    <div class="flex justify-center">
      <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
        <div
          class="flex justify-center items-center py-2 px-4 rounded-md bg-slate-50"
        >
          <h3 class="font-bold mr-4">morze</h3>
          <p>250 m.</p>
        </div>
        <div
          class="flex justify-center items-center py-2 px-4 rounded-md bg-slate-50"
        >
          <h3 class="font-bold mr-4">jezioro</h3>
          <p>700 m.</p>
        </div>
        <div
          class="flex justify-center items-center py-2 px-4 rounded-md bg-slate-50"
        >
          <h3 class="font-bold mr-4">las</h3>
          <p>150 m.</p>
        </div>
        <div
          class="flex justify-center items-center py-2 px-4 rounded-md bg-slate-50"
        >
          <h3 class="font-bold mr-4">PKS</h3>
          <p>1.5 km.</p>
        </div>
        <div
          class="flex justify-center items-center py-2 px-4 rounded-md bg-slate-50"
        >
          <h3 class="font-bold mr-4">PKP</h3>
          <p>15 km.</p>
        </div>
        <div
          class="flex justify-center items-center py-2 px-4 rounded-md bg-slate-50"
        >
          <h3 class="font-bold mr-4">gastronomia</h3>
          <p>300 m.</p>
        </div>
      </div>
    </div>
  </div>
</template>
