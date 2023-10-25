<script setup>
import MatrixNavDrawer from '@/Components/MatrixNavDrawer.vue'
import MainHeader from '@/Components/MainHeader.vue'
import EditMatrix from '@/Components/EditMatrix.vue'
import { ref } from 'vue'

defineProps(['matrices'])

const matrix = ref({});

function reloadMatrix(key) {
  console.log('emit rcd', key)
  matrix.value = key
  console.log('current matrix', matrix.value)
}



</script>

<template>
  <v-layout>
    <MainHeader></MainHeader>
    <MatrixNavDrawer :matrices="matrices" @loadMatrix="reloadMatrix($event)"> </MatrixNavDrawer>
    <v-main class="p2">
      <EditMatrix :matrix="matrix"/>
    </v-main>
  </v-layout>
</template>  