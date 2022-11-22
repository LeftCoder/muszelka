<script lang="ts" setup>
import QuestionItem from '@/pages/Faq/Partials/QuestionItem.vue'
import Heading from '@/layouts/Partials/Heading.vue'
import AccentImage from '@/shared/AccentImage.vue'
import { useRootStore } from '@/store'
import NoItems from '@/shared/NoItems.vue'

const store = useRootStore()
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

  <div v-if="store.questions.length" class="mb-40 relative">
    <div>
      <QuestionItem
        v-for="question in store.questions"
        :key="question.id"
        :question="question"
      />
    </div>
    <AccentImage posX="right-[-20px]" posY="top-[-50px]" />
  </div>
  <NoItems class="mb-40" v-else>Brak pytań w sekcji FAQ.</NoItems>
</template>
