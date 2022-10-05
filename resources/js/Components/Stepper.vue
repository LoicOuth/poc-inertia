<template>
   <div class="w-full flex justify-content-between align-items-center mt-5 relative">
      <div v-for="(step, index) in props.steps" :key="step"
         class="flex flex-column justify-content-center align-items-center">
         <div class="text-white text-2xl px-3 py-2 border-circle font-semibold"
            :class="index === props.currentStep || index < props.currentStep ? 'bg-primary' : 'bg-disabled'">
            <i v-if="index < props.currentStep" class="pi pi-check" style="width: 15px;"></i>
            <div v-else>{{ index + 1 }}</div>
         </div>
         <div class="mt-2 text-xl ">{{step}}</div>

         <div v-if="index < steps.length - 1" class="line"
            :class="index === props.currentStep ? 'bg-primary' : 'bg-disabled'"></div>
      </div>
   </div>
   <slot />
</template>

<script setup>
const props = defineProps({
   steps: {
      type: Array,
      required: true
   },

   currentStep: {
      type: Number,
      required: true
   }
})
</script>