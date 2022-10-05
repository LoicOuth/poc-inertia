<template>
   <div class="flex flex-column align-items-center">
      <div class="w-7">
         <Stepper :steps="steps" :current-step="currentStep">
         </Stepper>
      </div>

      <Card class="mt-8 w-8 shadow-3">
         <template #content>
            <GeneralInformation v-if="currentStep == 0"></GeneralInformation>
         </template>

         <template #footer>
            <div class="flex" :class="currentStep > 0 ? 'justify-content-between': 'justify-content-end'">
               <Button v-if="currentStep > 0" @click="currentStep--">Back</Button>
               <Button v-if="currentStep >= 3">Finish</Button>
               <Button v-else @click="currentStep++">Next</Button>
            </div>
         </template>
      </Card>
   </div>

</template>

<script setup>
import { ref } from 'vue'
import GeneralInformation from '../../../Components/StepCreateProduct/GeneralInformation.vue'
import Stepper from '../../../Components/Stepper.vue'

const currentStep = ref(0)
const steps = ref(['General info', 'Caracteristique', 'calcul', 'Paramètres'])


</script>