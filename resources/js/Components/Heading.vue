<template>
  <div ref="heading" class="font-roboto font-normal text-gray-800" :class="classList">
    <slot />
  </div>
</template>

<script setup lang="ts">
import { onMounted, ref } from 'vue'

const props = defineProps({
  large: {
    type: Boolean,
    default: false,
  },
  medium: {
    type: Boolean,
    default: false,
  },
  small: {
    type: Boolean,
    default: false,
  },
  tiny: {
    type: Boolean,
    default: false,
  },
})

const classList = ref<Array<string>>([])

function computeClasses() {
  if (props.large) classList.value.push('text-[32px] leading-10')
  if (props.medium) classList.value.push('text-[28px] leading-9')
  if (props.small) classList.value.push('text-2xl leading-8')
  if (props.tiny) classList.value.push('text-xs leading-7')
}

onMounted(() => {
  computeClasses()
})

</script>
