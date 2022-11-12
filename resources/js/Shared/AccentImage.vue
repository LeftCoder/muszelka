<script lang="ts" setup>
interface Props {
  posX: string
  posY: string
}

const props = defineProps<Props>()
</script>

<template>
  <img
    class="absolute -z-10"
    :class="`${props.posX} ${props.posY}`"
    width="250"
    src="storage/images/waves.png"
    alt="Obrazek dekorujący tło"
  />
</template>
