import { reactive } from "vue"

const product = reactive({
   name: '',
   description: '',
})

export default function(){
   return {
      product
   }
}