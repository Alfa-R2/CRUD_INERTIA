<template>
    <Bar v-bind:options="chartOptions" v-bind:data="chartData" />
</template>
<script>
import {Bar} from 'vue-chartjs';
import {defineComponent} from "vue";
import {Chart as ChartJS, Title,Tooltip,Legend,BarElement, CategoryScale,LinearScale} from 'chart.js'
ChartJS.register(Title,Tooltip,Legend,BarElement,CategoryScale, LinearScale);
export default defineComponent({
    name:"BarChart",
    components:{Bar},
    props:{
        data:{
            type:Object,
            required:true
        }
    },
    data(props){
        function random(){
            return Math.floor(Math.random()*256);
        }
        let labels=[], data=[], colors=[];
        props.data.forEach(element => {
            labels.push(element.nombre);
            data.push(element.Count)
            colors.push("rgb("+random()+","+random()+","+random()+")")
        });
        const chartOptions={
            responsive:true

        }
        const chartData={
            labels:labels,
            datasets:[{
                label:"Empleados por Departamento",
                data:data,
                backgroundColor:colors 
            }]
        }
        return {chartOptions,chartData}
    },
    
})
</script>