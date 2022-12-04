<script lang="ts" setup>
import { Link } from '@inertiajs/inertia-vue3'
import { Inertia } from '@inertiajs/inertia'
import { Disclosure, DisclosureButton, DisclosurePanel } from '@headlessui/vue'
import { Bars3Icon, XMarkIcon } from '@heroicons/vue/24/outline/index.js'

const changeOverflow = (open: boolean) => {
  document.body.classList.toggle('overflow-hidden', !open)
}

const closeMobileMenu = (close: () => void) => {
  Inertia.on('finish', () => {
    close()
    document.body.classList.remove('overflow-hidden')
  })
}
</script>

<template>
  <header
    class="relative z-50 w-full flex-none bg-white text-sm font-semibold leading-6 text-slate-900"
  >
    <Disclosure v-slot="{ open }" as="nav">
      <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
        <div class="flex items-center">
          <Link href="/" class="mr-auto flex-none text-slate-900">
            <img
              src="/storage/images/logo-dark.svg"
              class="mr-3 h-16 sm:h-24"
              alt="Muszelka Logo"
            />
            <span class="sr-only">Muszelka Logo</span>
          </Link>
          <div class="hidden sm:flex lg:items-center">
            <Link href="/" class="hover:text-amber-500">Start</Link>
            <Link href="/domki" class="ml-8 hover:text-amber-500">Domki</Link>
            <Link href="/faq" class="ml-8 hover:text-amber-500">FAQ</Link>
            <Link href="/regulamin" class="ml-8 hover:text-amber-500"
              >Regulamin</Link
            >
            <Link href="/kontakt" class="ml-8 hover:text-amber-500"
              >Kontakt</Link
            >
            <Link
              href="/rezerwacja"
              class="inline-flex justify-center rounded-lg text-sm font-semibold py-2.5 px-4 bg-cyan-900 text-white hover:bg-cyan-700 -my-2.5 ml-8"
              >Rezerwacja</Link
            >
          </div>

          <div class="flex items-center sm:hidden">
            <!-- Mobile menu button-->
            <DisclosureButton
              class="inline-flex items-center justify-center rounded-md p-2 text-slate-900 hover:bg-slate-200 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-slate-200"
              @click="changeOverflow(open)"
            >
              <span class="sr-only">Otwórz menu</span>
              <Bars3Icon
                v-if="!open"
                class="block h-6 w-6"
                aria-hidden="true"
              />
              <XMarkIcon v-else class="block h-6 w-6" aria-hidden="true" />
            </DisclosureButton>
          </div>
        </div>
      </div>

      <DisclosurePanel v-slot="{ close }" class="sm:hidden mt-[-64px] sm:mt-0">
        <div class="grid items-center h-screen bg-white w-full p-5">
          <div class="text-2xl flex flex-col items-center space-y-10">
            <Link
              href="/"
              class="hover:text-amber-500"
              @click="closeMobileMenu(close)"
              >Start</Link
            >
            <Link
              href="/domki"
              class="hover:text-amber-500"
              @click="closeMobileMenu(close)"
              >Domki</Link
            >
            <Link
              href="/faq"
              class="hover:text-amber-500"
              @click="closeMobileMenu(close)"
              >FAQ</Link
            >
            <Link
              href="/regulamin"
              class="hover:text-amber-500"
              @click="closeMobileMenu(close)"
              >Regulamin</Link
            >
            <Link
              href="/kontakt"
              class="hover:text-amber-500"
              @click="closeMobileMenu(close)"
              >Kontakt</Link
            >
            <Link
              href="/rezerwacja"
              class="inline-flex justify-center rounded-lg text-xl sm:text-sm font-semibold py-2.5 px-4 bg-amber-500 shadow-md text-white hover:bg-amber-400 -my-2.5"
              @click="closeMobileMenu(close)"
              >Rezerwacja</Link
            >
          </div>
        </div>
      </DisclosurePanel>
    </Disclosure>
  </header>
</template>
