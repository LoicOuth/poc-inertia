<template>
   <ConfirmDialog></ConfirmDialog>
   <Toolbar class="bg-white border-none border-noround shadow-3">
      <template #start>
         <Link v-for="item in props.links" :href="$route(item.route)" class="text-primary mr-5"
            :class="$route().current(item.route) ? 'underline' : ' no-underline'">{{item.name}}</Link>
      </template>
      <template #end>
         <p class="mr-5">{{user.name}}</p>
         <Button icon="pi pi-sign-out" iconPos="right" label="logout" class="p-button-outlined"
            @click="logout"></Button>
      </template>
   </Toolbar>
</template>

<script setup>
import Toolbar from 'primevue/toolbar'
import ConfirmDialog from 'primevue/confirmdialog'
import { useConfirm } from 'primevue/useconfirm'

import { Inertia } from '@inertiajs/inertia'
import { computed } from '@vue/reactivity'
import { usePage, Link } from '@inertiajs/inertia-vue3'

const confirm = useConfirm()

const props = defineProps({
   links: {
      type: Array,
      required: true
   }
})

const user = computed(() => usePage().props.value.auth.user)

const logout = () => {
   confirm.require({
      message: 'Do you want to logout ?',
      header: 'Logout confirmation',
      accept: () => {
         Inertia.post(route('logout'))
      },
   })

}
</script>