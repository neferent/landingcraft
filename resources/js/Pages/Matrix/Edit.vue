<script setup lang="ts">

import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { router, useForm } from '@inertiajs/vue3';
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
  name: null,
  key: null,
})




async function submit() {
  console.log('ddddd');
  newSection.post('/matrix/section/update', { 
    onSuccess: () => router.reload(),
  });

}

onMounted(() => {
  newSection.key = clone.value.key
})
</script>

<template>
  <div class="w-100 bg-gray-50 flex flex-col justify-center content-center items-center">
    <div class="font-size-xl font-bold mt-2 mb-2">{{ clone.name }}</div>
    <div class="w-10/12 bg-white border border-gray-100 drop-shadow-sm">
      <br />

      <Section v-for="section in clone.sections" :key="section" :section="section" />

      <br />

    </div>
    <form @submit.prevent="submit">
      <TextInput id="key" type="hidden" v-model="newSection.key" />
      <TextInput id="name" type="string" placeholder="Name" v-model="newSection.name" autofocus />
      <PrimaryButton class="mt-4">Add Section</PrimaryButton>
    </form>
  </div>
</template>
