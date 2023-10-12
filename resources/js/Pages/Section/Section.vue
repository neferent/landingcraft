<script setup>
import axios from 'axios';
import { Icon } from '@iconify/vue';
import { router, useForm } from '@inertiajs/vue3';


import { onMounted, reactive, ref } from 'vue';

const props = defineProps(['section']);

const clone = ref();

const local = reactive(clone);

const newModule = useForm({
  name: null,
  key: null,
})


function registerSectionType(type) {

  axios.post(`/section/update/${props.section}`, {type}).then((response) => {
    console.log(response)
  })

}

async function submit() {
  newModule.post('/section/module/update', {
    onSuccess: () => router.reload(),
  });
}




onMounted(() => {
  axios.get(`/section/fetch/${props.section}`).then((response) => {
    clone.value = response.data;
  });
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
          <v-btn stacked variant="tonal" @click="submit">
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

          <v-btn stacked variant="tonal">
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
        {{ local }}
      </v-container>
      <v-container>{{ local }}</v-container>

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