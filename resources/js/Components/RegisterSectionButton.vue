<template>
  <div class="flex items-center content-center justify-center w-auto h-12 bg-gray-200 rounded cursor-pointer px-4">
    {{ title }}
  </div>
</template>

<script setup>

const props = defineProps(['title']);


</script>