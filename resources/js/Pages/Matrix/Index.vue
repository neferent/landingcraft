<script setup>
import { useForm } from '@inertiajs/vue3';
import { Icon } from '@iconify/vue';

defineProps(['matrices']);

const newMatrix = useForm({
  name: '',
})

function edit(key) {
  window.location.href = `matrix/edit/${key}`;
}

</script>

<template>
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
            <v-btn icon>
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



<v-form @submit.prevent="newMatrix.post('/matrix/new')">

  <v-text-field v-model="newMatrix.name" label="name"></v-text-field>
  <v-btn type="submit"></v-btn>

</v-form>
<!--  
  <div class="w-100 bg-gray-50 flex flex-col justify-center">

    <form>

      <InputLabel for="name" value="Name :" />
      <TextInput id="name" type="string" v-model="newMatrix.name" required autofocus />
      <PrimaryButton class="mt-4">Create Matrix</PrimaryButton>

    </form>
  </div> -->
  
  </template>