<script setup>
import axios from 'axios';
import { onMounted, ref } from 'vue';

const props = defineProps(['section']);

const test = ref();



onMounted(() => {
  axios.get(`/section/fetch/${props.section}`).then((r) => {
    console.log(r.data)
    test.value = r.data;
  });
});


</script>

<template>
  <div class="w-100 p-2 border border-green-100">


 <div class="mb-2">{{ test }}</div>





 <!-- <form @submit.prevent="newModule.post('/matrix/section/update')">
      <InputLabel for="name" value="Name :" />
      <TextInput id="key" type="string" v-model="newModule.key" />
      <TextInput id="name" type="string" v-model="newModule.name" autofocus />
      <PrimaryButton class="mt-4">Add Module</PrimaryButton>
    </form> -->


  </div>

 
</template>