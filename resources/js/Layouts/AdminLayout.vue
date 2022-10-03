<template>
   <NavBar :links="[]" />
   <div>
      <slot />
   </div>
</template>

<script setup>
import NavBar from '../Components/NavBar.vue'

</script>