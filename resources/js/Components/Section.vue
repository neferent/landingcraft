<template>
  <div>
    <div v-if="!sectionData">
      loading...
    </div>
    <div v-else>
      <div v-if="sectionData.type === 'null'">
        <v-card>
          <div>Type Undefined: Choose section type.</div>       
        <div class="flex justify-center gap-2">
          <v-btn stacked variant="tonal" @click="registerSection('sideBySide')">
            Side by side
          </v-btn>
          <v-btn stacked variant="tonal" @click="registerSection('singleColumn')">
            Single Column
          </v-btn>
        </div>

        </v-card>
      </div>
      <div v-else>
        Not null
      </div>
    </div>
  </div>
</template>

<script setup>
import { onMounted, ref } from 'vue'
import { useForm } from '@inertiajs/vue3'
import { useMatrixStore } from '@store/matrix'

const props = defineProps({
  sectionKey: {
    type: String,
  }
})

const store = useMatrixStore()
const sectionData = ref();

const section = useForm({
  name: null,
  key: null,
  matrix: null,
  type: null,
})

async function registerSection(type) {
  section.type = type
  section.key = sectionData.value.key
  section.matrix = store.matrix.data.key
  await store.registerSection(section)
  const refreshedSection = await store.fetchSection(section.key)
  sectionData.value = refreshedSection.data
}

onMounted(async () => {
  const section = await store.fetchSection(props.sectionKey);
  sectionData.value = section.data
})

</script>