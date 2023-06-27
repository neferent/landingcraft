<script setup>

import PrimaryButton from '@/Components/PrimaryButton.vue';
import { useForm } from '@inertiajs/vue3';


const form = useForm({
    matrix: '',
})

</script>

<template>

<div>All Matrices:</div>
<div></div>
<form  @submit.prevent="form.post(route('matrix.store'))">

<PrimaryButton class="mt-4">Create Matrix</PrimaryButton>

</form>




</template>