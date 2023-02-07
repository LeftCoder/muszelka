<script lang="ts" setup>
import { Link } from '@inertiajs/inertia-vue3'
import { EnvelopeIcon, PhoneIcon } from '@heroicons/vue/20/solid/index.js'
import PriceTableModal from '@/pages/Home/Partials/PriceTableModal.vue'
const year = new Date().getFullYear()
</script>

<template>
  <footer class="pb-8 sm:pb-16">
    <div class="mx-auto max-w-[85rem] px-4 sm:px-6 lg:px-8">
      <div class="md:flex md:justify-between">
        <div class="hidden mb-6 md:block md:mb-0">
          <Link href="/" class="flex items-center">
            <img
              src="/storage/images/logo-dark.svg"
              class="h-12 sm:h-32"
              alt="Muszelka Logo"
            />
          </Link>
        </div>
        <div
          class="grid grid-cols-1 gap-8 sm:gap-6 sm:grid-cols-2 md:grid-cols-3"
        >
          <div>
            <h2 class="font-semibold text-slate-900">Adres</h2>
            <ul class="mt-3 space-y-2">
              <li>ul. Nadmorska 12</li>
              <li>76-150 Wicie</li>
            </ul>
          </div>
          <div>
            <h2 class="font-semibold text-slate-900">Dokumenty</h2>
            <ul class="mt-3 space-y-2">
              <li>
                <Link href="/polityka-prywatnosci" class="hover:text-slate-900"
                  >Polityka prywatności</Link
                >
              </li>
              <li>
                <Link href="/regulamin" class="hover:text-slate-900"
                  >Regulamin</Link
                >
              </li>
              <li>
                <PriceTableModal></PriceTableModal>
              </li>
            </ul>
          </div>
          <div>
            <h2 class="font-semibold text-slate-900">Kontakt</h2>
            <ul class="mt-3 space-y-2">
              <li>
                <a
                  href="mailto:muszelka@muszelkawicie.pl"
                  class="hover:text-slate-900 flex items-center"
                >
                  <EnvelopeIcon class="w-5 h-5 mr-2" />
                  muszelka@muszelkawicie.pl
                </a>
              </li>
              <li>
                <a
                  href="tel:+48692085935"
                  class="hover:text-slate-900 flex items-center"
                >
                  <PhoneIcon class="w-5 h-5 mr-2" />
                  +48 692 085 935
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <hr class="my-12 border-slate-200 sm:mx-auto lg:my-8" />
      <div
        class="flex flex-col items-center justify-center sm:flex sm:flex-row sm:items-center sm:justify-between"
      >
        <span class="text-sm text-slate-500 sm:text-center"
          >© {{ year }} Muszelka. Wszelkie prawa zastrzeżone.
        </span>
        <div class="flex mt-8 space-x-6 sm:justify-center sm:mt-0">
          <a
            href="https://www.facebook.com/profile.php?id=100069966696462"
            target="_blank"
            title="Facebook"
            class="text-slate-500 hover:text-blue-500"
          >
            <svg
              class="w-5 h-5"
              fill="currentColor"
              viewBox="0 0 24 24"
              aria-hidden="true"
            >
              <path
                fill-rule="evenodd"
                d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"
                clip-rule="evenodd"
              ></path>
            </svg>
            <span class="sr-only">Facebook</span>
          </a>
        </div>
      </div>
    </div>
  </footer>
</template>
