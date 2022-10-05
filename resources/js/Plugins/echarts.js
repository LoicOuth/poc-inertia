import ECharts from 'vue-echarts'
import { use } from "echarts/core"

import { CanvasRenderer } from 'echarts/renderers'
import { LineChart } from 'echarts/charts'
import { GridComponent, TooltipComponent, LegendComponent, TitleComponent } from 'echarts/components'
 
 use([
   CanvasRenderer,
   LineChart,
   GridComponent,
   TooltipComponent,
   LegendComponent,
   TitleComponent
 ])

 export default ECharts