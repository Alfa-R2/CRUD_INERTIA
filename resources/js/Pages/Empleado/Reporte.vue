<template>
    <Layout title="Reportes">
        <select class="input font-semibold w-1/2 !mb-5 " v-model="selectedOption">
          <option value="empl">Empleados</option>
          <option value="dpt">Departamentos</option>
        </select>
        <DataTable v-if="selectedOption=='empl'" v-bind:data="data1" :columns="columns1"
        class="" :options="dataOptions" >
        <thead class="bg-background border ">
          <tr>
            <th>#</th><th>NOMBRE</th><th>EMAIL</th>
            <th>Teléfono</th><th>DEPARTAMENTO</th>
          </tr>
        </thead>
        </DataTable>
        <DataTable v-else v-bind:data="data2" :columns="columns2"
        class="" :options="dataOptions" >
        <thead class="bg-background border ">
          <tr>
            <th>#</th><th>NOMBRE</th>
          </tr>
        </thead>
        </DataTable>
    </Layout>
</template>
<script setup>
import Layout from '../Components/Layout.vue';
import {ref, onMounted} from 'vue';
import DataTable from 'datatables.net-vue3';
import 'datatables.net-dt/css/jquery.datatables.css';
import ButtonsHtml5 from 'datatables.net-buttons/js/buttons.html5';
import 'datatables.net-buttons/js/buttons.print'
import 'datatables.net-responsive-dt';
import 'datatables.net-responsive-dt/css/responsive.datatables.min.css'
import JsZip from 'jszip';
import pdfmake  from 'pdfmake/build/pdfmake';
import * as pdfFonts from 'pdfmake/build/vfs_fonts';
pdfmake.vfs= pdfFonts.pdfMake?pdfFonts.pdfMake.vfs:pdfmake.vfs;
window.JSZip=JsZip;
DataTable.use(ButtonsHtml5);

const props= defineProps({
  empleados: {
    type:Object,
    required:true
  },
  departamentos:{
    type:Object,
    required:true
  }  
})
let selectedOption=ref("empl");

const columns1=ref([]);
const buttons= ref([]);
const columns2=ref([]);
columns1.value=[{data:"id"},{data:'nombre'},{data:"email"},
{data:"telefono"},{data:"Departamento"}];
columns2.value=[{data:"id"},{data:"nombre"}];
buttons.value=[
  {
    title:"", extend:'excelHtml5',
    text:'<i class="fa-solid fa-file-excel"></i> EXCEL', 
    className:"btn_dpt !bg-green-600 hover:!bg-green-700"
  },
  {
    title:"", extend:'pdfHtml5',
    text:'<i class="fa-solid fa-file-pdf"></i> PDF', 
    className:"btn_dpt !bg-red-600 hover:!bg-red-700"
  },
  {
    title:"", extend:'print',
    text:'<i class="fa-solid fa-print"></i> PRINT', 
    className:"btn_dpt !bg-black "
  },
  {
    title:"", extend:'copy',
    text:'<i class="fa-solid fa-copy"></i> COPY', 
    className:"btn_dpt !bg-slate-600 hover:!bg-slate-700"

  }
]
const dataOptions={
  dom:'Bfrtip',
  buttons:buttons.value,
  responsive:true
}
const data1=[]
props.empleados.forEach((empleado)=>{
    data1.push(empleado);
});
const data2=[]
props.departamentos.forEach((dpt)=>{
    data2.push(dpt);
});
</script>