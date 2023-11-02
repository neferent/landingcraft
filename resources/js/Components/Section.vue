<template>
  <div>
    <div v-if="!sectionData">
      loading...
    </div>
    <div v-else>
      {{ sectionData }}
      <div class="w-full h-auto border border-blue-200 rounded p-4 mb-12">
        <div class="flex flex-row gap-2">
          <div v-for="module in sectionData.modules" :key="module.key" class="flex-grow border border-red-400 rounded p-4 mb-12">
            <Module :module-key="module" />
          </div>
          <div class="flex-grow-0 border border-red-400 rounded p-4 mb-12"> <CreateModuleButton @click="createModule" /></div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { onMounted, ref } from 'vue'
import { useMatrixStore } from '@store/matrix'
import Module from './Module.vue';
import CreateModuleButton from './CreateModuleButton.vue';

const props = defineProps({
  sectionKey: {
    type: String,
  }
})

const store = useMatrixStore()
const sectionData = ref();

const newModule = {
  name: 'Unnamed module',
  key: null,
}

async function createModule() {
  newModule.key = props.sectionKey
  await store.createModule(newModule)
  await fetchSection(props.sectionKey)
}

async function fetchSection(key) {
  const section = await store.fetchSection(key);
  sectionData.value = section.data
}




onMounted(async () => {
  await fetchSection(props.sectionKey)

})

</script>