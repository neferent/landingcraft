<template>
  <div>
    <div v-if="!sectionData">
      loading...
    </div>
    <div v-else>
      <div class="w-full h-auto">
        <div class="flex flex-row">
          <div v-for="module in sectionData.modules" :key="module.key"
            class="flex-grow border border-blue-200 rounded p-4">
            <Module :module-key="module" />
          </div>
          <div class="flex flex-col justify-center align-center content-center flex-grow-0 px-2">
            <CreateModuleButton @click="createModule" />
          </div>
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