<script setup>
import axios from 'axios';
import { Icon } from '@iconify/vue';
import { router, useForm } from '@inertiajs/vue3';
import Module from '@/Pages/Module/Module.vue';


import { onMounted, reactive, ref } from 'vue';

const props = defineProps(['section', 'parentKey', 'matrixKey']);

const clone = ref();

const local = reactive(clone);

const newModule = useForm({
  name: null,
  key: null,
  parentKey: null,
  matrixKey: null,
  type: null,
})



async function registerSection(type) {
  newModule.type = type;
  newModule.parentKey = props.parentKey;
  newModule.matrixKey = props.matrixKey;
  newModule.post('/section/module/register', {
    onSuccess: () => router.reload(),
  });
}




onMounted(async() => {
  await axios.get(`/section/fetch/${props.section}`).then((response) => {
    clone.value = response.data;
  });
  newModule.key = clone.value.key
  newModule.parentKey = props.parentKey;
  newModule.matrixKey = props.matrixKey;
  console.log('section.vue', props.matrixKey)
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

      <v-container v-if="local.type === 'null'">
       
        <div class="d-flex justify-center gap-2">
          <v-btn stacked variant="tonal" @click="registerSection('sideBySide')">
            <div class="d-flex justify-center mb-1">
              <Icon icon="material-symbols:image-outline" height="18" />
              <Icon icon="material-symbols:format-align-left-rounded" height="18" />
            </div>
            <div class="d-flex justify-center mb-2">
              <Icon icon="material-symbols:format-align-right-rounded" height="18" />
              <Icon icon="material-symbols:image-outline" height="18" />
            </div>
            Side by side
          </v-btn>

          <v-btn stacked variant="tonal" @click="registerSection('singleColumn')">
            <div class="d-flex justify-center mb-1">
              <Icon icon="material-symbols:image-outline" height="18" />
            </div>
            <div class="d-flex justify-center mb-2">
              <Icon icon="material-symbols:format-align-center-rounded" height="18" />
            </div>
            Single Column
          </v-btn>

        </div>
      




      </v-container>
      <v-container v-else>
        <template v-for="module in local.modules">
        <Module :module="module" :matrix-key="newModule.matrixKey" /></template>
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




  <!-- <form @submit.prevent="newModule.post('/matrix/section/update')">
      <InputLabel for="name" value="Name :" />
      <TextInput id="key" type="string" v-model="newModule.key" />
      <TextInput id="name" type="string" v-model="newModule.name" autofocus />
      <PrimaryButton class="mt-4">Add Module</PrimaryButton>
    </form> -->

  <!-- 
  </div> -->
</template>