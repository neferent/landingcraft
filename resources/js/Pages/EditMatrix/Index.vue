<script setup>
import MatrixNavDrawer from '@/Components/MatrixNavDrawer.vue'
import MainHeader from '@/Components/MainHeader.vue'
import EditMatrix from '@/Components/EditMatrix.vue'
import { onMounted, ref } from 'vue'
import { useMatrixStore } from '@store/matrix'
import { storeToRefs } from 'pinia'

// defineProps(['matrices'])

const matricesLoading = ref(false)
const matrixLoading = ref(false)

const store = useMatrixStore();

const { matrix, matrices } = storeToRefs(store);

function reloadMatrix(key) {
  console.log('emit rcd', key)
  store.fetchMatrix(key);
  console.log('current matrix', matrix.value)
}

async function loadMatrix(key) {
  matrixLoading.value = true
  store.fetchMatrix(key)
  matrixLoading.value = false
}

onMounted( async() => {
  matricesLoading.value = true
  await store.fetchMatrices();
  matricesLoading.value = false
})



</script>

<template>
  <v-layout>
    <MainHeader></MainHeader>
    <MatrixNavDrawer :loading="matricesLoading" @loadMatrix="loadMatrix($event)"> </MatrixNavDrawer>
    <v-main class="p2">
      <EditMatrix :loading="matrixLoading"/>
    </v-main>
  </v-layout>
</template>  