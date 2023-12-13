<template>
    <Head title="Empleados"></Head>
    <Layout title="Empleados">
        <div class="flex items-center flex-col" >           
            <button class="btn_dpt block "  v-on:click="openModal(0)" ><i class="fa-solid fa-plus-circle"></i> Registrar</button> 
            <table>
                <thead class="bg-background border border-border_tabla">
                    <th>#</th><th>NOMBRE</th><th>EMAIL</th><th>TELÉFONO</th><th>DEPARTAMENTO</th><th></th><th></th>
                </thead>
                <tbody>
                    <tr  v-for="empleado in empleados.data">
                        <td>{{ empleado.id }}</td>
                        <td>{{ empleado.nombre }}</td>
                        <td>{{ empleado.email}}</td>
                        <td>{{ empleado.telefono}}</td>
                        <td>{{ empleado.Departamento }}</td>
                        <td><button class="btn bg-yellow-400" v-on:click="openModal(1, empleado)" ><i class="fa-solid fa-edit"></i>  </button></td>
                        <td><button class="btn bg-red-600" v-on:click="eliminar(empleado.nombre, empleado.id)"><i class="fa-solid fa-trash"></i></button></td>
                    </tr>
                </tbody>
            </table>
            <div class="mt-4">
                <VueTailwindPagination
                v-bind:current="empleados.current_page"
                v-bind:total="empleados.total"
                v-bind:per-page="empleados.per_page"
                v-on:page-changed="$event=>onPageClick($event)">
                </VueTailwindPagination>
            </div>
        </div>
        <Modal v-bind:show="stateModal" v-bind:mode="modo" v-bind:objDep="departamentos" v-bind:objEmp="objEmpl" v-on:close="close()"/>
    </Layout>
</template>
<script setup>
import {Head, useForm, router} from '@inertiajs/vue3';
import Layout from '../Components/Layout.vue';
import Modal from '../Components/Modal.vue';
import Swal from 'sweetalert2';
import {ref} from 'vue';
import '@ocrv/vue-tailwind-pagination/styles';
import VueTailwindPagination from '@ocrv/vue-tailwind-pagination'
let stateModal=ref(false);
let modo=ref(0);
let objEmpl= ref({})
const props=defineProps({
    empleados:{
        type:Object,
        required:true
    },
    departamentos:{
        type:Object,
        required:true
    }
})

const formPages= useForm({});
const onPageClick=(event)=>{
    formPages.get(route('empleado.index',{page:event}));
}
function eliminar(name,id){
    Swal.fire({
        buttonsStyling:true,
        title:`¿Esta seguro que quiere eliminar al empleado ${name} ?`,
        icon:"question",
        showCancelButton:true,
        confirmButtonText:"<i class='fa-solid fa-check'></i> Sí, eliminalo.",
        cancelButtonText:"<i class='fa-solid fa-ban'></i> Cancelar"
    }).then((result)=>{
        if(result.isConfirmed){
            router.delete(route("empleado.destroy",id))
        }
    })
}
function openModal(opcion, obj=null){
    stateModal.value=true;
    modo.value=opcion;
    objEmpl.value=obj==null?{nombre:"",email:"",telefono:"",id_departamento:0}:obj;
}
function close(){
    stateModal.value=false
}
</script>