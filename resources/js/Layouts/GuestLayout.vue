<script setup>

import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import { Link } from '@inertiajs/vue3';

</script>

<template>
  <div class="min-h-screen flex bg-gray-100 sm:bg-red-400">
    <slot />
  </div>
</template>
