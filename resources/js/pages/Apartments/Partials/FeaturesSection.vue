<script setup lang="ts"></script>

<template>
  <div class="mb-24 lg:mb-44">
    <div class="flex flex-col justify-center items-center space-y-4">
      <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
        <div
          class="p-3 border shadow-md rounded-lg hover:cursor-pointer hover:bg-slate-50"
          title="Klimatyzacja"
        >
          <svg
            class="text-stone-500"
            width="48"
            height="48"
            viewBox="0 0 24 24"
          >
            <path
              fill="currentColor"
              d="M6.59.66c2.34-1.81 4.88.4 5.45 3.84c.43 0 .85.12 1.23.34c.52-.6.98-1.42.8-2.34c-.42-2.15 1.99-3.89 4.28-.92c1.81 2.34-.4 4.88-3.85 5.45c0 .43-.11.86-.34 1.24c.6.51 1.42.97 2.34.79c2.13-.42 3.88 1.98.91 4.28c-2.34 1.81-4.88-.4-5.45-3.84c-.43 0-.85-.13-1.22-.35c-.52.6-.99 1.43-.81 2.35c.42 2.14-1.99 3.89-4.28.92c-1.82-2.35.4-4.89 3.85-5.45c0-.43.13-.85.35-1.23c-.6-.51-1.42-.98-2.35-.8c-2.13.42-3.88-1.98-.91-4.28M5 16h2a2 2 0 0 1 2 2v6H7v-2H5v2H3v-6a2 2 0 0 1 2-2m0 2v2h2v-2H5m7.93-2H15l-2.93 8H10l2.93-8M18 16h3v2h-3v4h3v2h-3a2 2 0 0 1-2-2v-4a2 2 0 0 1 2-2Z"
            />
          </svg>
        </div>
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
      </div>
      <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
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
    <div class="flex flex-col mx-auto space-y-8 sm:items-center">
      <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-8">
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
          <h3 class="font-bold mr-4">centrum</h3>
          <p>350 m.</p>
        </div>
      </div>
      <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
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
