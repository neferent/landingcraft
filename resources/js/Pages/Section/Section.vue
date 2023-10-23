<script setup>
import axios from 'axios';
import { Icon } from '@iconify/vue';
import { router, useForm } from '@inertiajs/vue3';
import Module from '@/Pages/Module/Module.vue';


import { onMounted, reactive, ref } from 'vue';

const props = defineProps(['section', 'parentKey', 'matrixKey']);

const clone = ref();

const local = reactive(clone);

const section = useForm({
  name: null,
  key: null,
  parentKey: null,
  matrixKey: null,
  type: null,
})





async function registerSection(type) {
  section.type = type;
  section.parentKey = props.parentKey;
  section.matrixKey = props.matrixKey;
  section.post('/section/module/register', {
    onSuccess: () => router.reload(),
  });
}




onMounted(async() => {
  await axios.get(`/section/fetch/${props.section}`).then((response) => {
    clone.value = response.data;
  });
  section.key = clone.value.key
  section.parentKey = props.parentKey;
  section.matrixKey = props.matrixKey;
  section.type = clone.value.type;
  console.log('section.vue', props.matrixKey)
  console.log('FFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFF', clone.value);

});

</script>

<template>
  <v-container>
    <v-card v-if="local" :loading="!local">
      <v-toolbar>
        <v-app-bar-nav-icon>
          <Icon icon="material-symbols:drag-indicator" height="24" />
        </v-app-bar-nav-icon>
        <v-toolbar-title>{{ local.name }}</v-toolbar-title>
        <v-chip size="x-small">{{ local.key }}</v-chip>
        <v-spacer></v-spacer>
        <v-btn icon>
          <Icon icon="material-symbols:edit-document-outline-rounded" height="24" />
        </v-btn>
        <v-btn icon>
          <Icon icon="material-symbols:delete-outline-rounded" height="24" />
        </v-btn>
        <v-btn icon>
          <Icon icon="material-symbols:more-horiz" height="24" />
        </v-btn>
      </v-toolbar>
      {{ section.type }}

      <v-container v-if="section.type === 'null'">
        <div>Type Undefined: Choose section type.</div>       
        <div class="flex justify-center gap-2">
          <v-btn stacked variant="tonal" @click="registerSection('sideBySide')">
            Side by side
          </v-btn>
          <v-btn stacked variant="tonal" @click="registerSection('singleColumn')">
            Single Column
          </v-btn>
        </div>
      </v-container>

      <v-container v-if="section.type === 'sideBySide'">
        <div>{{ section.type }}</div>
        <div class="flex flex-row">
        <template v-for="module in local.modules">
        <Module :module="module" :matrix-key="section.matrixKey" />
        </template>
        </div>

      </v-container>


      <v-container v-else>

        <template v-for="module in local.modules">
        <Module :module="module" :matrix-key="section.matrixKey" />
        </template>
      </v-container>


    </v-card>

  </v-container>





  <!-- <template>
  <v-container>
    <v-card>
{{ local }}

    </v-card>






  </v-container>
 -->


  <!-- 

  <div class="w-100 p-2 border border-green-100">
    <div class="mb-2">
      <div v-if="local && local.type === 'null'">
      
      </div>


      {{ local }}

      <Icon icon="material-symbols:add" />



    </div>
 -->




  <!-- <form @submit.prevent="section.post('/matrix/section/update')">
      <InputLabel for="name" value="Name :" />
      <TextInput id="key" type="string" v-model="section.key" />
      <TextInput id="name" type="string" v-model="section.name" autofocus />
      <PrimaryButton class="mt-4">Add Module</PrimaryButton>
    </form> -->

  <!-- 
  </div> -->
</template>