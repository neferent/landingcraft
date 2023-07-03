<script setup>

import { ref } from 'vue';




const props = defineProps(['matrix']);

const clone = ref(props.matrix);






</script>

<template>
  <div>
    <div>Editing</div>
    
    {{ matrix }}
    <br />
    <div>{{ clone }}</div>
  </div>
</template>