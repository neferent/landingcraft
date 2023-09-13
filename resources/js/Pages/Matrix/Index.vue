<script setup>

import PrimaryButton from '@/Components/PrimaryButton.vue';
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';
import { useForm } from '@inertiajs/vue3';

import MatrixLabel from '@/Components/MatrixLabel.vue';
import { Icon } from '@iconify/vue';

defineProps(['matrices']);


const newMatrix = useForm({
  name: '',
})

</script>

<template>
  <!-- <v-container>
    <v-list lines="three">
      <v-list-item v-for="matrix in matrices" :key="matrix.key" :matrix="matrix" :title="matrix.name"
        :subtitle="matrix.key">
        <v-btn rounded="xl" variant="tonal">
          <Icon icon="material-symbols:add" />
        </v-btn>
      </v-list-item>
    </v-list>
  </v-container> -->
  <v-container>


    <v-card v-for="matrix in matrices" :key="matrix.key">

      <v-toolbar flat>
        <v-app-bar-nav-icon><Icon icon="material-symbols:document-scanner-outline-rounded" height="24"/></v-app-bar-nav-icon>
        
        <v-toolbar-title>
          <span class="font-medium">{{ matrix.name }}</span>          
        </v-toolbar-title>

        <v-spacer></v-spacer>

        <v-btn icon>
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

  </v-container>





  <!-- 
  <div class="w-100 bg-gray-50 flex flex-col justify-center">

    <div>All Matrices:</div>
    <MatrixLabel  />

    <form @submit.prevent="newMatrix.post('/matrix/store')">

      <InputLabel for="name" value="Name :" />
      <TextInput id="name" type="string" v-model="newMatrix.name" required autofocus />
      <PrimaryButton class="mt-4">Create Matrix</PrimaryButton>

    </form>
  </div> -->
</template>