<template>
   <v-chart class="h-30rem mt-8" :option="options" />
</template>
   
<script setup>
import { Inertia } from '@inertiajs/inertia'
import { onMounted, ref } from 'vue'

const props = defineProps({
   ordersCount: {
      type: Array
   }
})

const options = ref({
   title: {
      text: 'Order chart'
   },
   tooltip: {
      trigger: 'axis',
      axisPointer: {
         type: 'cross',
      }
   },
   legend: {
      data: ['Orders']
   },
   grid: {
      left: '3%',
      right: '4%',
      bottom: '3%',
      containLabel: true
   },
   xAxis: [
      {
         type: 'category',
         boundaryGap: false,
         data: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jull', 'aug', 'sept', 'oct', 'nov', 'dec']
      }
   ],
   yAxis: [
      {
         type: 'value',
      }
   ],
   series: [
      {
         name: 'Orders',
         type: 'line',
         areaStyle: {},
         data: props.ordersCount
      }
   ]
})

onMounted(() => {
   setInterval(() => {
      Inertia.reload()
      options.value.series[0].data = props.ordersCount
   }, 10000)
})
</script>