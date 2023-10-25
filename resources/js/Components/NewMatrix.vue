<script setup>
import axios from 'axios';
import { useForm } from '@inertiajs/vue3';





const newMatrix = useForm({
  name: '',
})

let newPageCreated = false;
let newMatrixModalOpen = false;

function edit(key) {
  window.location.href = `matrix/edit/${key}`;
}

function createMatrix() {
  newPageCreated = true
  newMatrix.post('/matrix/new')
  setTimeout(() => {
    newPageCreated = false
  }, 5000);
}

async function deleteMatrix(key) {
  await axios.delete(`/matrix/delete/${key}`).then((response) => {
    console.log(key, 'deleted');
  })


}

</script>



<template>
 <v-container>
    <v-card width="400" class="mx-auto">
      <template v-slot:title>Create a new page</template>
      <template v-slot:text>
        <v-form>
          <v-text-field v-model="newMatrix.name" label="Name of page"></v-text-field>
          <v-btn @click="createMatrix">Create</v-btn>
        </v-form>
      </template>
    </v-card>
  </v-container> 

</template>