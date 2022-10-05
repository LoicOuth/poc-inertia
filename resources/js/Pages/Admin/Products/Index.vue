<template>
   <Link :href="$route('products.create')"
      class="bg-primary p-3 shadow-2 border-round hover:bg-primary-800 no-underline">
   Create product
   </Link>
</template>

<script setup>
import { Link } from '@inertiajs/inertia-vue3'
</script>