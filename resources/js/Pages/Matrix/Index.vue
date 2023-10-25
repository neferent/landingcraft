<script setup>
import axios from 'axios';
import { useForm } from '@inertiajs/vue3';
import { Icon } from '@iconify/vue';

import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';

defineProps(['matrices']);

const newMatrix = useForm({
  name: '',
})

let newPageCreated = false;

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
  <Head title="Matrix" />
  <AuthenticatedLayout :matrices="matrices">











    <v-container grid-list-md>
      <v-row v-for="matrix in matrices" :key="matrix.key">
        <v-col cols="12">
          <v-card>
            <v-toolbar flat>
              <v-app-bar-nav-icon>
                <Icon icon="material-symbols:document-scanner-outline-rounded" height="24" />
              </v-app-bar-nav-icon>
              <v-toolbar-title>
                <span class="font-medium">{{ matrix.name }}</span>
              </v-toolbar-title>
              <v-spacer></v-spacer>
              <v-btn icon @click="edit(matrix.key)">
                <Icon icon="material-symbols:edit-document-outline-rounded" height="24" />
              </v-btn>
              <v-btn icon>
                <Icon icon="material-symbols:manage-search-rounded" height="24" />
              </v-btn>
              <v-btn icon @click="deleteMatrix(matrix.key)">
                <Icon icon="material-symbols:delete-outline-rounded" height="24" />
              </v-btn>
              <v-btn icon>
                <Icon icon="material-symbols:more-horiz" height="24" />
              </v-btn>
            </v-toolbar>
          </v-card>
        </v-col>
      </v-row>
    </v-container>

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

    <v-snackbar v-model="newPageCreated">
      New Page: <b>{{ newMatrix.name }}</b> created.
    </v-snackbar>
  </AuthenticatedLayout>
</template>