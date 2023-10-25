<template>
  <div class="flex flex-row justify-between items-center w-full h-12 px-4 bg-red-100">
    <Icon icon="material-symbols:document-scanner-outline-rounded" height="24" class="text-gray-800" />
    <MatrixLabel>{{ matrix.name }}</MatrixLabel>
    <Badge>{{ matrix.key }}</Badge>
    <IconButton>
      <Icon icon="material-symbols:more-horiz" height="24" />
    </IconButton>
    <div>{{  currentMatrix }}</div>
  </div>
</template>


<script setup>
import { Icon } from '@iconify/vue';
import Badge from './Badge.vue';
import IconButton from './IconButton.vue';
import MatrixLabel from './MatrixLabel.vue';
import { computed } from 'vue';

import { usePage } from '@inertiajs/vue3';

const page = usePage();
const currentMatrix = computed(() => page.props.currentMatrix)

const props = defineProps(['matrix']);

</script>