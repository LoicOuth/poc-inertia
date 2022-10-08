<template>
   <Button label="Create 1" @click="visible = true" />

   <Dialog header="Create product" :modal="true" v-model:visible="visible" :style="{width: '50vw'}">
      <div class="flex flex-column align-items-center">
         <div class="p-float-label w-8 mt-5">
            <InputText v-model="formData.name" class="w-full" />
            <label>Name</label>
         </div>
         <small v-if="formData.errors.name" class="p-error ml-5 mt-2">{{ formData.errors.name }}</small>


         <div class="p-float-label w-8 mt-5">
            <InputText v-model="formData.description" class="w-full" />
            <label>Description</label>
         </div>
         <small v-if="formData.errors.description" class="p-error ml-5 mt-2">{{ formData.errors.description
         }}</small>

         <div class="p-float-label w-8 mt-5">
            <InputNumber v-model="formData.price" locale="fr-FR" class="w-full" mode="currency" currency="EUR" />
            <label>Price</label>
         </div>
         <small v-if="formData.errors.price" class="p-error ml-5 mt-2">{{ formData.errors.price }}</small>

         <Button class="w-full mt-5" label="Create" @click="handleCreate" :loading="formData.processing" />
      </div>
   </Dialog>
</template>

<script setup>
import { useForm } from '@inertiajs/inertia-vue3'
import { ref } from 'vue'

const visible = ref(false)

const formData = useForm({
   name: '',
   description: '',
   price: 0
})

const handleCreate = () => {
   formData.post(route('products.store'),
      {
         onSuccess: () => {
            formData.name = formData.description = ''
            formData.price = 0
            visible.value = false
         }
      })
}

</script>