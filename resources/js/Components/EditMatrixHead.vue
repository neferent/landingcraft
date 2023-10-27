<template>
  <div class="flex flex-row justify-between items-center w-full h-12 px-4 bg-red-100">
    <Icon icon="material-symbols:document-scanner-outline-rounded" height="24" class="text-gray-800" />
    <MatrixLabel>{{ matrix.data.name }}</MatrixLabel>
    <Badge>{{ matrix.data.key }}</Badge>
    <IconButton>
      <Icon icon="material-symbols:more-horiz" height="24" />
    </IconButton>
  </div>
</template>


<script setup>
import { Icon } from '@iconify/vue';
import Badge from './Badge.vue';
import IconButton from './IconButton.vue';
import MatrixLabel from './MatrixLabel.vue';
import { storeToRefs } from 'pinia';

import { useMatrixStore } from '@store/matrix'

const store = useMatrixStore()
const { matrix } = storeToRefs(store)




</script>