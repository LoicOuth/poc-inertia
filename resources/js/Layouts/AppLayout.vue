<template>
   <NavBar :links="links" />
   <div>
      <slot />
   </div>
</template>

<script setup>
import { ref } from 'vue'
import NavBar from '../Components/NavBar.vue'


const links = ref([
   {
      route: 'home',
      name: 'Home'
   },
   {
      route: 'order.index',
      name: 'My Orders'
   }
])
</script>
