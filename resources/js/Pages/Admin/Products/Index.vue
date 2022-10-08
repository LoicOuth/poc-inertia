<template>
   <Link :href="$route('products.create')"
      class="bg-primary p-3 shadow-2 border-round hover:bg-primary-800 no-underline">
   Create product
   </Link>


   <Create1 />
</template>

<script setup>
import { Link } from '@inertiajs/inertia-vue3'
import Create1 from './Create1.vue'
</script>