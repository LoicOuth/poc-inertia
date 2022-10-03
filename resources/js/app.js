import { createInertiaApp } from "@inertiajs/inertia-vue3"
import { InertiaProgress } from "@inertiajs/progress"
import { createApp, h } from "vue"
import ECharts from 'vue-echarts'
import { use } from "echarts/core"
import PrimeVue from 'primevue/config'
import AppLayout from './layouts/AppLayout.vue'
import AdminLayout from './Layouts/AdminLayout.vue'
import ConfirmationService from 'primevue/confirmationservice';

import 'primevue/resources/themes/lara-light-indigo/theme.css'
import 'primevue/resources/primevue.min.css'
import 'primeicons/primeicons.css'
import 'primeflex/primeflex.css'


import {
    CanvasRenderer
  } from 'echarts/renderers'
  import {
    LineChart
  } from 'echarts/charts'
  import {
    GridComponent,
    TooltipComponent,
    LegendComponent,
    TitleComponent
  } from 'echarts/components'
  
  use([
    CanvasRenderer,
    LineChart,
    GridComponent,
    TooltipComponent,
    LegendComponent,
    TitleComponent
  ])

InertiaProgress.init({
  // The delay after which the progress bar will
  // appear during navigation, in milliseconds.
  delay: 0,

  // The color of the progress bar.
  color: '#29d',

  // Whether to include the default NProgress styles.
  includeCSS: true,

  // Whether the NProgress spinner will be shown.
  showSpinner: false,
})

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
            .use({
                install(app) {
                // eslint-disable-next-line no-undef
                app.config.globalProperties.$route = route;
              },
            })
            .use(ConfirmationService)
            .component('v-chart', ECharts)
            .mount(el);
    },
});
