<script lang="ts" setup>
import { Period } from '@/types'
import plDate from '@/utils/date'

interface Props {
  periods: Period[]
}

const props = defineProps<Props>()
const year = new Date().getFullYear()
</script>

<template>
  <div class="space-y-12">
    <section>
      <h2
        class="text-3xl sm:text-4xl font-extrabold text-slate-900 tracking-tight mb-4"
      >
        Sezon {{ year }}
      </h2>
      <p class="text-lg mb-12">
        Ceny przedstawione poniżej obejmują obłożenie komfortowe, tj.
        <span class="font-semibold">4 osoby</span> w małym domku i
        <span class="font-semibold">5 osób</span> w dużym domku.
      </p>

      <ul class="text-lg space-y-8 mb-12">
        <li v-for="period in props.periods" :key="period.id">
          <div class="mb-3">
            <div class="font-semibold">
              {{ plDate(period.start) }} - {{ plDate(period.end) }}
            </div>
            <div class="text-sm">Możliwa + 1 osoba 40 zł/doba</div>
          </div>
          <div>Mały domek {{ period.small }} zł/doba</div>
          <div>Duży domek {{ period.big }} zł/doba</div>
        </li>
      </ul>
    </section>
  </div>
</template>
