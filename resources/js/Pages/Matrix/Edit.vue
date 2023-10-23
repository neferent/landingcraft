<script setup lang="ts">

import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { router, useForm } from '@inertiajs/vue3';
import Section from '@/Pages/Section/Section.vue';
import { onMounted, ref } from 'vue';
import { Icon } from '@iconify/vue';


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




async function createSection() {
  newSection.post('section/new', {
    onSuccess: () => router.reload(),
  });
}

onMounted(() => {
  newSection.key = clone.value.key
})

</script>

<template>
  <div>
    <v-container>
      <v-sheet>
        <v-toolbar flat>
          <v-app-bar-nav-icon>
            <Icon icon="material-symbols:document-scanner-outline-rounded" height="24" />
          </v-app-bar-nav-icon>
          <v-toolbar-title>
            {{ clone.name }}
          </v-toolbar-title>
          <v-chip size="x-small">{{ clone.key }}</v-chip>
          <v-spacer></v-spacer>
          <v-btn icon>
            <Icon icon="material-symbols:edit-document-outline-rounded" height="24" />
          </v-btn>
          <v-btn icon>
            <Icon icon="material-symbols:manage-search-rounded" height="24" />
          </v-btn>
          <v-btn icon>
            <Icon icon="material-symbols:delete-outline-rounded" height="24" />
          </v-btn>
          <v-btn icon>
            <Icon icon="material-symbols:more-horiz" height="24" />
          </v-btn>
        </v-toolbar>
        <v-card v-for="section in clone.sections" :key="section">
          <Section :section="section" :parent-key="props.matrix.key" :matrix-key="props.matrix.key"></Section>


        </v-card>
      </v-sheet>
    </v-container>
    <v-container>
    <v-card width="400" class="mx-auto">
      <template v-slot:title>Add a section</template>
      <template v-slot:text>
        <v-form>
          <v-text-field v-model="newSection.name" label="Name of page"></v-text-field>
          <v-btn @click="createSection">Add</v-btn>
        </v-form>
      </template>
    </v-card>
  </v-container>


<!-- 
    <v-form @submit.prevent="createNewSection">

      <v-text-field v-model="newSection.name" label="name"></v-text-field>
      <v-btn type="submit"></v-btn>

    </v-form> -->
  </div>





  <!-- <div class="w-100 bg-gray-50 flex flex-col justify-center content-center items-center">
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
  </div> -->
</template>
