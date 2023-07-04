<script setup>

import { ref } from 'vue';




const props = defineProps(['matrix']);

const clone = ref(props.matrix);






</script>

<template>
  <div>
    <div>Showing {{ matrix.name }}</div>
    
    {{ matrix }}
    <br />
    <div>{{ clone }}</div>


    <div>Add Section</div>
  </div>
</template>