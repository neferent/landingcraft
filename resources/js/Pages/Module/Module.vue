<script setup>
import axios from 'axios';

import { onMounted, reactive, ref } from 'vue';

const props = defineProps(['module']);

const clone = ref();

const local = reactive(clone);





onMounted(() => {
  axios.get(`/module/fetch/${props.module}`).then((response) => {
    clone.value = response.data;
  });
});

</script>

<template>

</template>