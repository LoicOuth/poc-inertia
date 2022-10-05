import { createInertiaApp } from "@inertiajs/inertia-vue3"
import { InertiaProgress } from "@inertiajs/progress"
import { createApp, h } from "vue"

import PrimeVue from "./Plugins/primevue"
import ECharts from "./Plugins/echarts"

import AppLayout from './layouts/AppLayout.vue'
import AdminLayout from './Layouts/AdminLayout.vue'
import ziggy from "./Plugins/ziggy"
import primevueComponents from "./Plugins/primevue-components"




InertiaProgress.init({delay: 0})

createInertiaApp({
    title: (title) => `${title} - InertiaApp`,
    resolve: (name) => {
        const page = require(`./Pages/${name}`).default
        if(page.layout === undefined && !name.includes('Login')){
            if(name.includes('Admin')){
                page.layout = AdminLayout
            }
            else 
            {
                page.layout = AppLayout
            }

        }

        return page
    },
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(PrimeVue)
            .use(primevueComponents)
            .component('v-chart', ECharts)
            .use(ziggy)
            .mount(el);
    },
});
