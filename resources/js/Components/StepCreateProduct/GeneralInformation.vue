<template>
   <div class="flex justify-content-center">
      <div class="p-float-label w-8 mt-5">
         <InputText v-model="product.name" class="w-full" />
         <label>Name</label>
      </div>
   </div>

</template>

<script setup>
import useCreateProduct from '../../Composables/useCreateProduct'

const { product } = useCreateProduct()
</script>