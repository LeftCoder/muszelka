<script lang="ts" setup>
import QuestionItem from '@/pages/Faq/Partials/QuestionItem.vue'
import Heading from '@/layouts/Partials/AppHeading.vue'
import AccentImage from '@/shared/AccentImage.vue'
import NoItems from '@/shared/NoItems.vue'
import type { Faq } from '@/types'

interface Props {
  faqs: Faq[]
}
const props = defineProps<Props>()
</script>

<template>
  <Head>
    <title>FAQ</title>
    <meta
      name="description"
      content="Tutaj znajdziesz odpowiedzi na najczęściej pojawiające się pytania."
    />
  </Head>

  <Heading>
    <template #default>Faq</template>
    <template #slogan>Najcześciej zadawane pytania.</template>
  </Heading>

  <div v-if="props.faqs.length" class="mb-24 lg:mb-64 relative">
    <div>
      <QuestionItem
        v-for="question in props.faqs"
        :key="question.id"
        :faq="question"
      />
    </div>
    <AccentImage pos-x="right-[-20px]" pos-y="top-[-50px]" />
  </div>
  <NoItems v-else class="mb-40">
    <h2 class="text-2xl text-slate-900 dark:text-slate-100">
      Brak pytań w sekcji FAQ.
    </h2></NoItems
  >
</template>
