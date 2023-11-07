<template>
  <div class="w-75 bg-white border border-gray-100 h-full">

    <Section v-for="section in matrix.data.sections" :sectionKey="section" :key="section" />
        <CreateSectionButton @click="$emit('onCreateSection')" />


  </div>


</template>

<script setup>
import { useMatrixStore } from '@store/matrix'
import { storeToRefs } from 'pinia';
import { useForm } from '@inertiajs/vue3'

import Section from '@/Components/Section.vue'
import CreateSectionButton from '@/Components/CreateSectionButton.vue'

const store = useMatrixStore()
const { matrix } = storeToRefs(store)

const newSection = {
  name: 'Unnamed section',
  key: null,
}



</script>