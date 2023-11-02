<template>
  <div>
    <div v-if="!moduleData">
    loading...
    </div>
    <div v-else>
      {{  moduleData }}
    </div>
  </div>
</template>

<script setup>
import { onMounted, ref } from 'vue'
import { useForm } from '@inertiajs/vue3'
import { useMatrixStore } from '@store/matrix'

const props = defineProps({
  moduleKey: {
    type: String,
  }
})

const store = useMatrixStore()
const moduleData = ref();

onMounted(async () => {
  const module = await store.fetchModule(props.moduleKey);
  moduleData.value = module.data
})

</script>