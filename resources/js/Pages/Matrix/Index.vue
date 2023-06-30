<script setup>

import PrimaryButton from '@/Components/PrimaryButton.vue';
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';
import { useForm } from '@inertiajs/vue3';

import Matrix from '@/Components/Matrix.vue';

defineProps(['matrices']);


const form = useForm({
  name: '',
})

</script>

<template>
  <div>
    <div>All Matrices:</div>


    <Matrix v-for="matrix in matrices" :key="matrix.key" :matrix="matrix"></Matrix>

    <form @submit.prevent="form.post(route('matrix.store'))">

      <InputLabel for="name" value="Name :" />
      <TextInput id="name" type="string" v-model="form.name" required autofocus />
      <PrimaryButton class="mt-4">Create Matrix</PrimaryButton>

    </form>
  </div>
</template>