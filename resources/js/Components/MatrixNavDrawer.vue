<script setup>
import NewMatrix from './NewMatrix.vue';
import { onMounted, ref } from 'vue';
import { useMatrixStore } from '../stores/matrix'

defineProps(['onLoadMatrix'])

defineEmits('loadMatrix')

const loading = ref(false)

const store = useMatrixStore()

async function loadMatrices() {
  loading.value = true
  await store.fetchMatrices()
  loading.value = false
}

onMounted(() => {
  loadMatrices()
})

</script>

<template>
  <v-navigation-drawer floating permanent>
    <div v-if="loading">loading...</div>
    <v-list v-else density="compact" nav>
      <v-list-item v-for="matrix in store.matrices.data" :key="matrix.key" :title="matrix.name"
        @click="$emit('loadMatrix', matrix.key)"></v-list-item>
    </v-list>
    <NewMatrix />
  </v-navigation-drawer>
</template>