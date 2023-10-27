<script setup>
import NewMatrix from './NewMatrix.vue';
import { storeToRefs } from 'pinia';
import { useMatrixStore } from '../stores/matrix'

defineProps(['loading', 'onLoadMatrix'])

defineEmits('loadMatrix')


const store = useMatrixStore()
const { matrices } = storeToRefs(store);


</script>

<template>
  <v-navigation-drawer floating permanent>
    <div v-if="loading">loading...</div>
    <v-list v-else density="compact" nav>
      <v-list-item v-for="matrix in matrices.data" :key="matrix.key" :title="matrix.name"
        @click="$emit('loadMatrix', matrix.key)"></v-list-item>
    </v-list>
    <NewMatrix />
  </v-navigation-drawer>
</template>