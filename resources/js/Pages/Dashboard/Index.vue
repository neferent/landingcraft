<template>
  <div class="w-full">
    <div class="flex flex-row justify-between items-center w-full px-12 py-4 bg-gray-100">
      <div>LandingCraft</div>
      <div>
        <div class="w-8 h-8 rounded-full bg-gray-500"></div>
      </div>
    </div>
    <div class="flex flex-row justify-around items-center w-full h-28 px-12 py-4 bg-gray-500">
      <div>Contextual Menu{{ matrix.data }}</div>
    </div>
    <div class="flex flex-row justify-around items-center w-full px-12 py-4 bg-gray-50">

      <MatrixList v-if="!matrix.data" @onNewMatrix="openModal" @onOpenMatrix="loadMatrix($event)"/>
      <Matrix v-else @onCreateSection="createSection"/>
      
    </div>
  </div>




  <Modal :show="creatingNewMatrix" @close="creatingNewMatrix = false">

    <Header medium>Create a new page</Header>
    <div class="flex flex-row items-center gap-4">
      <TextInput v-model="newMatrix.name" autofocus />
      <BasicButton @click="createMatrix">Create Page</BasicButton>
      

    </div>



  </Modal>
</template>

<script setup>

import Header from '@/Components/Header.vue'
import TextInput from '@/Components/TextInput.vue'
import BasicButton from '@/Components/BasicButton.vue'



import MatrixList from '@/Components/MatrixList.vue'
import Matrix from '@/Components/Matrix.vue'
import { onMounted, ref } from 'vue'
import { useForm } from '@inertiajs/vue3'
import { useMatrixStore } from '@store/matrix'
import { storeToRefs } from 'pinia'
import Modal from '@/Components/Modal.vue';

import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';

const creatingNewMatrix = ref(false)

const newMatrix = useForm({
  name: '',
})

const newSection = {
  name: 'Unnamed section',
  key: null,
}

async function createSection() {
  console.log('dd', matrix.value.data.key)
  newSection.key = matrix.value.data.key
  console.log('section key', newSection.key)
  await store.makeEmptySection(newSection)
}



const matricesLoading = ref(false)
const matrixLoading = ref(false)

const store = useMatrixStore();

const { matrix, matrices } = storeToRefs(store);


async function createMatrix() {
  matricesLoading.value = true
  creatingNewMatrix.value = false
  await store.createMatrix(newMatrix)
  await store.fetchMatrices()
  matricesLoading.value = false

}

async function loadMatrix(key) {
  console.log('key', key)
  store.fetchMatrix(key)
}

function openModal() {
  creatingNewMatrix.value = true
}

onMounted(async () => {
  matricesLoading.value = true
  await store.fetchMatrices();
  matricesLoading.value = false
  setTimeout(() => {
    console.log(matrices.value.data)
  }, 2000)

})

</script>

