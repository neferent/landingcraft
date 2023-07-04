<script setup lang="ts">

import { ref } from 'vue';

const props = defineProps({
  matrix: {
    type: Object,
    required: true,
  },
})

function addSection() {
  console.log(props.matrix);
}




// const props = defineProps(['matrix']);

// const clone = ref(props.matrix);


// function addSection() {
//   console.log('test');
//   console.log(clone.sections);
//   console.log(clone);
//   props.matrix.sections.push('test');
// }



</script>

<template>
  <div>
    <div>Editing</div>
    
    {{ matrix }}
    <br />
    <!-- <div>{{ clone }}</div>
    <br /><br />{{  matrix.sections }}



<div>Sections</div>
    <div v-for="section in matrix.sections">{{ section }}</div>

    -->
    <div @click="addSection"> Add Section</div>
  </div>
</template>