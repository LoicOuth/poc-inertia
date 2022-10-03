<template>
    <Head title="Login" />

    <div class="flex justify-content-center">
        <Card class="w-5 mt-8">
            <template #title>
                Connection to the app
            </template>
            <template #content>
                <div v-if="form.errors.authentication" class="p-error mt-5 text-center">{{ form.errors.authentication }}</div>
                <form @submit.prevent="form.post('/login')" class="w-full flex flex-column align-items-center justify-content-center">
                    <div class="p-float-label w-8 mt-5">
                        <InputText type="email" v-model="form.email" class="w-full"/>
                        <label>Email</label>
                    </div>
                    <small v-if="form.errors.email" class="p-error ml-5 mt-2">{{ form.errors.email }}</small>
                    <div class="p-float-label mt-5 w-8">
                        <InputText type="password" v-model="form.password" class="w-full" />
                        <label>Password</label>
                    </div>
                    <small v-if="form.errors.password" class="p-error ml-5 mt-2">{{ form.errors.password }}</small>
                
                    <Button type="submit" label="Connect" class="w-8 mt-5" iconPos="right" :loading="form.processing" />
                </form>
            </template>
        </Card>
    </div>  
</template>

<script setup>
import InputText from 'primevue/inputtext'
import Button from 'primevue/button'
import Card from 'primevue/card'

import { Head, useForm } from "@inertiajs/inertia-vue3"

const form = useForm({
    email: '',
    password: '',
})
</script>
