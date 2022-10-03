<template>
   <div class="flex justify-content-center">
      <Card class="w-8 mt-3">
         <template #content>
            <form @submit.prevent="form.post($route('order.store'))">
               <div class="flex flex-wrap justify-content-evenly mb-3">
                  <div v-for="item in props.productsPaginate.data" :key="item.id"
                     class="p-3 border-2 border-round-md shadow-1 cursor-pointer w-5 mt-2 flex justify-content-between align-items-center"
                     :class="form.products.includes(item.id)? 'border-primary-500' : 'border-200'"
                     @click="handleAddProducts(item.id)">
                     <h4>{{item.name}}</h4>

                     <p>{{item.price}} €</p>
                  </div>
               </div>


               <Paginator :rows="5" :totalRecords="props.productsPaginate.total" @page="onPageChange($event)"
                  :first="props.productsPaginate.from" />

               <Button type="submit" label="Pass order" class="mt-5 w-full" :loading="form.processing"
                  :disabled="form.products.length <= 0 " />
            </form>
         </template>
      </Card>
   </div>

</template>

<script setup>
import { useForm } from '@inertiajs/inertia-vue3'
import Card from 'primevue/card'
import Button from 'primevue/button'
import Paginator from 'primevue/paginator'
import { Inertia } from '@inertiajs/inertia'


const form = useForm({
   products: []
})

const handleAddProducts = (id) => {
   if (form.products.includes(id)) {
      form.products.splice(form.products.findIndex(el => el === id), 1)
   }
   else {
      form.products.push(id)
   }
}

const onPageChange = (event) => {
   Inertia.get(route('order.create', { page: event.page + 1 }), {}, { preserveState: true })
}
const props = defineProps({
   productsPaginate: {
      type: Object
   }
})
</script>