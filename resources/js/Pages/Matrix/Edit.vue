<script setup lang="ts">

import PrimaryButton from '@/Components/PrimaryButton.vue';
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';
import { useForm } from '@inertiajs/vue3';

import { onMounted, ref } from 'vue';



const props = defineProps({
  matrix: {
    type: Object,
    required: true,
  },
})

let clone = ref(props.matrix);

const form = useForm({
  name: '',
  key: '',
})

function addSection() {
  clone.value.sections.push('dddd');

}

onMounted(() => {
  //clone = JSON.parse(JSON.stringify({...props.matrix}));
  form.key = clone.value.key;
  console.log('moufnted');
  console.log(clone);
  console.log(clone.value);

  console.log(props.matrix);
})




// const props = defineProps(['matrix']);

// const clone = ref(props.matrix);


// function addSection() {
//   console.log('test');
//   console.log(clone.sections);
//   console.log(clone);
//   props.matrix.sections.push('test');
// }



</script>

<template>
  <div>
    <div>Editing</div>

    {{ clone }}
    <br />
    <!-- <div>{{ clone }}</div>
    <br /><br />{{  matrix.sections }}



<div>Sections</div>
    <div v-for="section in matrix.sections">{{ section }}</div>

    -->

    <form @submit.prevent="form.post('/matrix/section/update')">

      <InputLabel for="name" value="Name :" />
      <TextInput id="key" type="string" v-model="form.key" />
      <TextInput id="name" type="string" v-model="form.name" autofocus />
      <PrimaryButton class="mt-4">Add Section</PrimaryButton>

    </form>

  </div>
</template>


