<script setup>

import PrimaryButton from '@/Components/PrimaryButton.vue';
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';
import { useForm } from '@inertiajs/vue3';

import MatrixLabel from '@/Components/MatrixLabel.vue';

defineProps(['matrix']);


const form = useForm({
  name: '',
})

</script>

<template>
  <div>
    <div>Editing</div>
    
    {{ matrix }}
  </div>
</template>