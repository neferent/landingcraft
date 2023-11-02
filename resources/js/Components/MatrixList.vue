<template>
  <div class="flex flex-col shadow rounded-xl">
    <div class="flex flex-col p-4 bg-white rounded-tl-xl rounded-tr-xl">
      <div class="text-gray-800 font-medium mb-4">Pages</div>
      <div class="flex flex-row items-center gap-2 w-96 bg-gray-100 rounded p-2 mb-4">
        <Icon icon="material-symbols:search-rounded" height="24" class="text-gray-800"/>
        <div class="text-base text-gray-600">Search (disabled)</div>
      </div>
      <div class="flex flex-col gap-4 ">
        <div v-for="matrix in matrices.data" :key="matrix.key"
          class="flex flex-row items-center justify-between px-2 py-4 rounded hover:bg-gray-50 cursor-pointer">
          <div class="flex flex-row items-center gap-2">
            <div class="w-2 h-2 rounded-full bg-blue-700"></div>
            <div class="text-base text-gray-800">{{ matrix.name }}</div>
          </div>
          <div class="text-xs text-gray-600">{{ matrix.key }}</div>
        </div>
      </div>
    </div>
    <div class="flex flex-row justify-end bg-gray-100 p-4 rounded-bl-xl rounded-br-xl">
      <div class="bg-blue-200 hover:bg-blue-300 px-4 py-2 text-gray-900 font-bold cursor-pointer rounded">New</div>
    </div>
  </div>
</template>

<script setup>
import { useMatrixStore } from '@store/matrix'
import { storeToRefs } from 'pinia'
import { Icon } from '@iconify/vue';
import { useForm } from '@inertiajs/vue3';

const store = useMatrixStore();

const { matrices } = storeToRefs(store);

const newMatrix = useForm({
  name: '',
})

 




let newPageCreated = false

function createMatrix() {
  newPageCreated = true
  newMatrix.post('/matrix/new')
  setTimeout(() => {
    newPageCreated = false
  }, 5000);
}


</script>