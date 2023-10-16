<script setup>
import axios from 'axios';
import { Icon } from '@iconify/vue';
import { router, useForm } from '@inertiajs/vue3';




import { onMounted, reactive, ref } from 'vue';


const props = defineProps(['module', 'parentKey', 'matrixKey']);

const clone = ref();

const local = reactive(clone);

const newElement = useForm({
  name: null,
  key: null,
  parentKey: null,
  matrixKey: null,
  type: null,
})

async function createNewElement(type) {
  newElement.type = type;
  newElement.parentKey = local.value.key;
  newElement.matrixKey = props.matrixKey;

  console.log('createElement',newElement);
  newElement.post('/element/create', {
    onSuccess: () => router.reload(),
  });
}







onMounted(async() => {
  await axios.get(`/module/fetch/${props.module}`).then((response) => {
    clone.value = response.data;
    console.log(response);
  });
  newElement.matrixKey = props.matrixKey;
  console.log('module.vue', props.matrixKey);
    console.log('module.vue', props.matrixKey);

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

      {{  local }}
      <br />
      <div class="d-flex justify-center gap-2">
          <v-btn stacked variant="tonal" @click="createNewElement('paragraph')">
            <div class="d-flex justify-center mb-1">
              <Icon icon="material-symbols:image-outline" height="18" />

            </div>

            Paragraph
          </v-btn>
        </div>


    </v-card>

  </v-container>
</template>