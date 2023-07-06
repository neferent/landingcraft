<script setup>

import PrimaryButton from '@/Components/PrimaryButton.vue';
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';
import { useForm } from '@inertiajs/vue3';

import MatrixLabel from '@/Components/MatrixLabel.vue';

defineProps(['matrices']);


const form = useForm({
  name: '',
})

</script>

<template>
  <div>
    <div>All Matrices:</div>
    <MatrixLabel v-for="matrix in matrices" :key="matrix.key" :matrix="matrix" />

    <form @submit.prevent="form.post('/matrix/store')">

      <InputLabel for="name" value="Name :" />
      <TextInput id="name" type="string" v-model="form.name" required autofocus />
      <PrimaryButton class="mt-4">Create Matrix</PrimaryButton>

    </form>
  </div>
</template>