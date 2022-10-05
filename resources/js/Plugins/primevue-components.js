import ConfirmationService from 'primevue/confirmationservice'
import Button from 'primevue/button'
import Card from 'primevue/card'
import Paginator from 'primevue/paginator'
import InputText from 'primevue/inputtext'
import DataTable from 'primevue/datatable'
import Column from 'primevue/column'
import Chip from 'primevue/chip'

export default {
   install: (app) => {
      app.component('Button', Button)
      app.component('Card', Card)
      app.component('Paginator', Paginator)
      app.component('InputText', InputText)
      app.component('DataTable', DataTable)
      app.component('Column', Column)
      app.component('Chip', Chip)
      app.use(ConfirmationService)
   }
}