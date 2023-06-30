<script setup>
import { Link } from '@inertiajs/vue3';

defineProps(['matrix']);
</script>

<template>
  <div class="flex flex-row items-center gap-4 p-2 bg-gray-50 radius mb-2">
    <div class="text-lg font-medium">{{ matrix.name }}</div>
    <Link :href="route('edit-matrix.index')" class="text-sm underline">edit</Link>
  </div>
</template>