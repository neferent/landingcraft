<template>
  <div class="font-roboto text-base" :class="classList">
    <slot />
  </div>
</template>

<script setup lang="ts">
import { onMounted, ref } from 'vue'

const props = defineProps({
  medium: {
    type: Boolean,
    default: false,
  },
  bold: {
    type: Boolean,
    default: false,
  },
})

const classList = ref<Array<string>>([])

function computeClasses() {
  if (props.medium) classList.value.push('font-medium')
  if (props.bold) classList.value.push('font-bold')
}

onMounted(() => {
  computeClasses()
})

</script>