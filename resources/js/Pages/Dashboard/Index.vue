<template>
  <div class="w-full">
    <div class="flex flex-row justify-between items-center w-full px-12 py-4 bg-gray-100">
      <div>LandingCraft</div>
      <div>
        <div class="w-8 h-8 rounded-full bg-gray-500"></div>
      </div>
    </div>
    <div class="flex flex-row justify-around items-center w-full h-28 px-12 py-4 bg-gray-500">
      <div>Contextual Menu</div>
    </div>
    <div class="flex flex-row justify-around items-center w-full px-12 py-4 bg-gray-50">
      <MatrixList @onNewMatrix="openModal" />
    </div>
  </div>
  <NewMatrixModal />
</template>

<script setup>

import MatrixList from '@/Components/MatrixList.vue'
import { onMounted, ref } from 'vue'
import { useMatrixStore } from '@store/matrix'
import { storeToRefs } from 'pinia'

import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';


const matricesLoading = ref(false)
const matrixLoading = ref(false)

const props = defineProps(['matrices']);

const store = useMatrixStore();

const { matrix } = storeToRefs(store);

async function loadMatrix(key) {
  matrixLoading.value = true
  store.fetchMatrix(key)
  matrixLoading.value = false
}

function openModal() {
  console.log('emit rcvd')
  modal.open(NewMatrixModal, [
    {
      label: "Save",
      callback: (dataFromView) => {
        console.log(dataFromView);
        modal.close();
      },
    },
  ]);
}

onMounted(async () => {
  matricesLoading.value = true
  await store.fetchMatrices();
  matricesLoading.value = false
  setTimeout(() => {
    console.log(props.matrices)
  }, 4000)

})

</script>

