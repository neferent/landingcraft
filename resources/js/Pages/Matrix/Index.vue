<script setup>

import PrimaryButton from '@/Components/PrimaryButton.vue';
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';
import { useForm } from '@inertiajs/vue3';

import MatrixLabel from '@/Components/MatrixLabel.vue';

defineProps(['matrices']);


const newMatrix = useForm({
  name: '',
})

</script>

<template>
  <div class="w-100 bg-gray-50 flex flex-col justify-center">

    <div>All Matrices:</div>
    <MatrixLabel v-for="matrix in matrices" :key="matrix.key" :matrix="matrix" />

    <form @submit.prevent="newMatrix.post('/matrix/store')">

      <InputLabel for="name" value="Name :" />
      <TextInput id="name" type="string" v-model="newMatrix.name" required autofocus />
      <PrimaryButton class="mt-4">Create Matrix</PrimaryButton>

    </form>
  </div>
</template>