<script setup>
import axios from 'axios';
import { Icon } from '@iconify/vue';
import { onMounted, reactive, ref } from 'vue';

const props = defineProps(['section']);

const clone = ref();

const local = reactive(clone);





onMounted( () => {
 axios.get(`/section/fetch/${props.section}`).then((response) => {
    clone.value = response.data;
  });




});


</script>

<template>
  <div class="w-100 p-2 border border-green-100">
    <div class="mb-2">
      <div v-if="local && local.type === 'null'">aaasdasdasd</div>


{{  local }}

<Icon icon="material-symbols:add" />

 

    </div>





    <!-- <form @submit.prevent="newModule.post('/matrix/section/update')">
      <InputLabel for="name" value="Name :" />
      <TextInput id="key" type="string" v-model="newModule.key" />
      <TextInput id="name" type="string" v-model="newModule.name" autofocus />
      <PrimaryButton class="mt-4">Add Module</PrimaryButton>
    </form> -->


  </div>
</template>