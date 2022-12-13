<script lang="ts" setup>
import { InertiaPage } from '@/types'
import { Menu, MenuButton, MenuItems, MenuItem } from '@headlessui/vue'
import {
  ChevronDownIcon,
  BellAlertIcon,
  HomeIcon,
  GiftIcon,
  Squares2X2Icon,
  ArrowRightOnRectangleIcon,
  ArrowTopRightOnSquareIcon,
  QuestionMarkCircleIcon,
} from '@heroicons/vue/20/solid/index.js'
import { usePage } from '@inertiajs/inertia-vue3'
import { computed } from 'vue'

const user = computed(() => usePage<InertiaPage>().props.value.auth.user.name)
</script>

<template>
  <Menu as="div" class="relative inline-block text-left z-50">
    <div>
      <MenuButton
        class="inline-flex w-full justify-center rounded-md bg-white py-2 px-4 text-sm font-medium text-slate-900 focus:outline-none border border-slate-200 hover:bg-slate-100 focus:ring-4 focus:ring-slate-200 dark:focus:ring-slate-700 dark:bg-slate-800 dark:text-slate-400 dark:border-slate-600 dark:hover:text-white dark:hover:bg-slate-700"
      >
        {{ user }}
        <ChevronDownIcon
          class="ml-2 -mr-1 h-5 w-5 text-blue-400"
          aria-hidden="true"
        />
      </MenuButton>
    </div>

    <transition
      enter-active-class="transition duration-100 ease-out"
      enter-from-class="transform scale-95 opacity-0"
      enter-to-class="transform scale-100 opacity-100"
      leave-active-class="transition duration-75 ease-in"
      leave-from-class="transform scale-100 opacity-100"
      leave-to-class="transform scale-95 opacity-0"
    >
      <MenuItems
        class="absolute right-0 mt-2 w-56 origin-top-right divide-y divide-slate-100 dark:divide-slate-600 rounded-md bg-white dark:bg-slate-800 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
      >
        <div class="px-1 py-1">
          <MenuItem v-slot="{ active }">
            <Link
              href="/"
              :class="[
                active
                  ? 'bg-blue-500 text-white'
                  : 'text-slate-900 dark:text-slate-400',
                'group flex w-full items-center rounded-md px-2 py-2 text-sm',
              ]"
            >
              <ArrowTopRightOnSquareIcon
                class="mr-2 h-5 w-5"
                :class="[active ? 'text-white' : 'text-blue-400']"
                aria-hidden="true"
              />
              Strona główna
            </Link>
          </MenuItem>
        </div>
        <div class="px-1 py-1">
          <MenuItem v-slot="{ active, close }">
            <Link
              href="/dashboard"
              :class="[
                active
                  ? 'bg-blue-500 text-white'
                  : 'text-slate-900 dark:text-slate-400',
                'group flex w-full items-center rounded-md px-2 py-2 text-sm',
              ]"
              @click="close"
            >
              <Squares2X2Icon
                class="mr-2 h-5 w-5"
                :class="[active ? 'text-white' : 'text-blue-400']"
                aria-hidden="true"
              />
              Dashboard
            </Link>
          </MenuItem>
          <MenuItem v-slot="{ active, close }">
            <Link
              href="/dashboard/rezerwacje"
              :class="[
                active
                  ? 'bg-blue-500 text-white'
                  : 'text-slate-900 dark:text-slate-400',
                'group flex w-full items-center rounded-md px-2 py-2 text-sm',
              ]"
              @click="close"
            >
              <BellAlertIcon
                class="mr-2 h-5 w-5"
                :class="[active ? 'text-white' : 'text-blue-400']"
                aria-hidden="true"
              />
              Rezerwacje
            </Link>
          </MenuItem>
          <MenuItem v-slot="{ active, close }">
            <Link
              href="/dashboard/domki"
              :class="[
                active
                  ? 'bg-blue-500 text-white'
                  : 'text-slate-900 dark:text-slate-400',
                'group flex w-full items-center rounded-md px-2 py-2 text-sm',
              ]"
              @click="close"
            >
              <HomeIcon
                class="mr-2 h-5 w-5"
                :class="[active ? 'text-white' : 'text-blue-400']"
                aria-hidden="true"
              />
              Domki
            </Link>
          </MenuItem>
          <MenuItem v-slot="{ active, close }">
            <Link
              href="/dashboard/udogodnienia"
              :class="[
                active
                  ? 'bg-blue-500 text-white'
                  : 'text-slate-900 dark:text-slate-400',
                'group flex w-full items-center rounded-md px-2 py-2 text-sm',
              ]"
              @click="close"
            >
              <GiftIcon
                class="mr-2 h-5 w-5"
                :class="[active ? 'text-white' : 'text-blue-400']"
                aria-hidden="true"
              />
              Udogodnienia
            </Link>
          </MenuItem>
          <MenuItem v-slot="{ active, close }">
            <Link
              href="/dashboard/faq"
              :class="[
                active
                  ? 'bg-blue-500 text-white'
                  : 'text-slate-900 dark:text-slate-400',
                'group flex w-full items-center rounded-md px-2 py-2 text-sm',
              ]"
              @click="close"
            >
              <QuestionMarkCircleIcon
                class="mr-2 h-5 w-5"
                :class="[active ? 'text-white' : 'text-blue-400']"
                aria-hidden="true"
              />
              Faq
            </Link>
          </MenuItem>
        </div>

        <div class="px-1 py-1">
          <MenuItem v-slot="{ active }">
            <Link
              href="/logout"
              method="post"
              as="button"
              :class="[
                active
                  ? 'bg-blue-500 text-white'
                  : 'text-slate-900 dark:text-slate-400',
                'group flex w-full items-center rounded-md px-2 py-2 text-sm',
              ]"
            >
              <ArrowRightOnRectangleIcon
                class="mr-2 h-5 w-5"
                :class="[active ? 'text-white' : 'text-blue-400']"
                aria-hidden="true"
              />
              Wyloguj
            </Link>
          </MenuItem>
        </div>
      </MenuItems>
    </transition>
  </Menu>
</template>
