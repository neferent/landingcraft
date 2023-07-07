<script setup lang="ts">

import PrimaryButton from '@/Components/PrimaryButton.vue';
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';
import { useForm } from '@inertiajs/vue3';
import Section from '@/Components/Section.vue';
import { onMounted, ref } from 'vue';

const props = defineProps({
  matrix: {
    type: Object,
    required: true,
  },
})

let clone = ref(props.matrix);

const newSection = useForm({
  name: '',
  key: '',
})

onMounted(() => {

  newSection.key = clone.value.key;

})
</script>

<template>
  <div class="w-100 bg-gray-50 flex flex-col justify-center content-center items-center">
    <div class="font-size-xl font-bold mt-2 mb-2">{{ clone.name }}</div>
    <div class="w-10/12 bg-white border border-gray-100 drop-shadow-sm">
      <br />

      <Section v-for="section in clone.sections" :key="section" :section="section" />


      <br />
      <form @submit.prevent="newSection.post('/matrix/section/update')">
        <InputLabel for="name" value="Name :" />
        <TextInput id="key" type="string" v-model="newSection.key" />
        <TextInput id="name" type="string" v-model="newSection.name" autofocus />
        <PrimaryButton class="mt-4">Add Section</PrimaryButton>
      </form>
    </div>
  </div>
</template>
