<template>
  <div class="w-full">
    <div class="flex flex-row justify-between items-center w-full px-12 py-4 bg-gray-100">
      <div>LandingCraft</div>
      <div>
        <div class="w-8 h-8 rounded-full bg-gray-500"></div>
      </div>
    </div>
    <div class="flex flex-row justify-around items-center w-full h-28 px-12 py-4 bg-gray-300">
      <div v-if="matrix.data" class="flex flex-row justify-between w-full">
        <div>
          <div class="flex flex-row items-center gap-4">
            <EditableHeading large v-model="localMatrixName" @input="updateLocalMatrixName" />
            <div @click="updateMatrix">
              <Icon icon="material-symbols:check-circle-rounded" height="24" class="cursor-pointer text-gray-800" />
            </div>
          </div>

          <Heading tiny>{{ matrix.data.key }}</Heading>
        </div>
        <div class="flex flex-row gap-4">



          <div>
            <Icon icon="material-symbols:manage-search-rounded" height="24" class="cursor-pointer text-gray-800" />
          </div>
          <div>
            <Icon icon="material-symbols:more-horiz" height="24" class="cursor-pointer text-gray-800" />
          </div>
          
          
          
          
          
 
        
        
        
        </div>
      </div>
      <div v-else>
        <Heading small>No Page Selected</Heading>
      </div>
    </div>
    <div class="flex flex-row justify-around items-center w-full px-12 py-4 bg-gray-50">

      <MatrixList v-if="!matrix.data" @onNewMatrix="openModal" @onOpenMatrix="loadMatrix($event)" />
      <Matrix v-else @onCreateSection="createSection" />

    </div>
  </div>




  <Modal :show="creatingNewMatrix" @close="creatingNewMatrix = false">

    <Heading medium>Create a new page</Heading>
    <div class="flex flex-row items-center gap-4">
      <TextInput v-model="newMatrix.name" autofocus />
      <BasicButton @click="createMatrix">Create Page</BasicButton>


    </div>



  </Modal>
</template>

<script setup>

import Heading from '@/Components/Heading.vue'
import EditableHeading from '@/Components/EditableHeading.vue'
import TextInput from '@/Components/TextInput.vue'
import BasicButton from '@/Components/BasicButton.vue'

import { Icon } from '@iconify/vue';

import MatrixList from '@/Components/MatrixList.vue'
import Matrix from '@/Components/Matrix.vue'
import { onMounted, ref } from 'vue'
import { useForm } from '@inertiajs/vue3'
import { useMatrixStore } from '@store/matrix'
import { mapActions, storeToRefs } from 'pinia'
import Modal from '@/Components/Modal.vue';

import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';

const creatingNewMatrix = ref(false)

const newMatrix = useForm({
  name: '',
})

const updatedMatrix = useForm({
  key: '',
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

const localMatrixName = ref('')

const store = useMatrixStore();

const { matrix, matrices } = storeToRefs(store);

function updateLocalMatrixName(event) {
  localMatrixName.value = event.target.innerText
}

async function createMatrix() {
  matricesLoading.value = true
  creatingNewMatrix.value = false
  await store.createMatrix(newMatrix)
  await store.fetchMatrices()
  matricesLoading.value = false
}

async function loadMatrix(key) {
  await store.fetchMatrix(key)
  localMatrixName.value = matrix.value.data.name
}

async function updateMatrix() {
  console.log(localMatrixName.value, matrix.value.data.name)

  if (localMatrixName.value !== matrix.value.data.name) {
    console.log('doesnt match, updating')
    updatedMatrix.name = localMatrixName.value
    updatedMatrix.key = matrix.value.data.key
    console.log('o', updatedMatrix)
    await store.updateMatrix(updatedMatrix)
    console.log('done')
  }
  await store
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

