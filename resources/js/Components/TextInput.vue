
<template>
  <input class="flex flex-row items-center gap-2 w-full h-10 bg-gray-100 rounded p-2 placeholder-gray-400 text-gray-800 border border-transparent hover:border-gray-200" :value="modelValue"
    @input="$emit('update:modelValue', ($event.target as HTMLInputElement).value)" ref="input" placeholder="Page Name"/>
</template>



<script setup lang="ts">
import { onMounted, ref } from 'vue';

const props = defineProps({
  modelValue: {
    type: String,
    default: ''
  }
})


defineEmits(['update:modelValue']);

const input = ref<HTMLInputElement | null>(null);

onMounted(() => {
  if (input.value?.hasAttribute('autofocus')) {
    input.value?.focus();
  }
});

defineExpose({ focus: () => input.value?.focus() });
</script>