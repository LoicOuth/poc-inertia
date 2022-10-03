<template>

    <Head title="home" />

    <div v-if="props.lastOrder[0] != null" class="mt-5 flex flex-column align-items-center">
        <h1>Status of last order</h1>
        <Timeline :value="props.lastOrder" class="mt-5">
            <template #content="slotProps">
                {{slotProps.item.status}}
            </template>
        </Timeline>
    </div>
</template>

<script setup>
import { Head } from "@inertiajs/inertia-vue3"
import Timeline from 'primevue/timeline'

const props = defineProps({
    lastOrder: {
        type: Object
    }
})
</script>
