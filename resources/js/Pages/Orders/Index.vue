<template>

   <Head title="Orders" />
   <div class="flex flex-column align-items-center mt-8">
      <div class="flex justify-content-start w-8 mb-5">
         <Button label="Pass order" @click="goToCreate" />
      </div>

      <DataTable :value="props.ordersPaginate.data" class="w-8">
         <Column field="user.name" header="Order by" :sortable="true"></Column>
         <Column field="products_count" header="Number of products" :sortable="true"></Column>
         <Column field="products_sum_price" header="Total price" :sortable="true">
            <template #body="slotProps">
               <p>{{slotProps.data.products_sum_price}} €</p>
            </template>
         </Column>
         <Column field="status" header="Status" :sortable="true">
            <template #body="slotProps">
               <Chip :label="slotProps.data.status" class="bg-primary" />
            </template>
         </Column>
         <Column field="created_at" header="Créer le" :sortable="true">
            <template #body="slotProps">
               {{new Date(slotProps.data.created_at).toLocaleString()}}
            </template>
         </Column>
         <Column header="action">
            <template #body="slotProps">
               <Button icon="pi pi-trash" class="p-button-rounded p-button-sm p-button-danger "
                  @click="handleDelete(slotProps.data.id)" />
            </template>
         </Column>
      </DataTable>
      <Paginator :rows="5" :totalRecords="props.ordersPaginate.total" @page="onPageChange($event)"
         :first="props.ordersPaginate.from" />
   </div>

</template>

<script setup>
import { Head } from "@inertiajs/inertia-vue3"
import { useConfirm } from "primevue/useconfirm"
import { Inertia } from "@inertiajs/inertia"

const confirm = useConfirm()

const props = defineProps({
   ordersPaginate: {
      type: Object
   }
})

const goToCreate = () => {
   Inertia.visit(route('order.create'))
}

const onPageChange = (event) => {
   Inertia.get(route('order.index', { page: event.page + 1 }))
}

const handleDelete = (id) => {
   confirm.require({
      message: 'Do you want to delete this record?',
      header: 'Delete Confirmation',
      icon: 'pi pi-info-circle',
      acceptClass: 'p-button-danger',
      accept: () => {
         Inertia.delete(route('order.delete', id))
      },
   })
}

</script>