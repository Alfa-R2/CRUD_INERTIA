<template>
    <Head title="Departamentos"></Head>
    <Layout>
        <div class="flex items-center flex-col" >            
            <Link class="btn_dpt block " v-bind:href="url_create" as="button" ><i class="fa-solid fa-plus-circle"></i> Registrar</Link>
            <table>
                <thead class="bg-background border border-border_tabla">
                    <th>#</th><th>DEPARTAMENTOS</th><th></th><th></th>
                </thead>
                <tbody>
                    <tr  v-for="departamento in departamentos">
                        <td>{{ departamento.id }}</td>
                        <td>{{ departamento.nombre }}</td>
                        <td><Link class="btn bg-yellow-400" v-bind:href="departamento.url_edit" ><i class="fa-solid fa-edit"></i>  </Link></td>
                        <td><button class="btn bg-red-600" v-on:click="eliminar(departamento.url_delete, departamento.nombre)"><i class="fa-solid fa-trash"></i></button></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </Layout>

</template>
<script setup>
import Layout from '../Components/Layout.vue';
import { Head, Link, router } from '@inertiajs/vue3';
import Swal from "sweetalert2"
const props= defineProps({
    departamentos:{
        type:Object,
        required:true
    },
    url_create:{
        type:String,
        required:true
    }
});

function eliminar(url, name){
    Swal.fire({
        buttonsStyling:true,
        title:`¿Esta seguro que quiere eliminar ${name} ?`,
        icon:"question",
        showCancelButton:true,
        confirmButtonText:"<i class='fa-solid fa-check'></i> Sí, eliminalo.",
        cancelButtonText:"<i class='fa-solid fa-ban'></i> Cancelar"
    }).then((result)=>{
        if(result.isConfirmed){
            router.delete(url)
        }
    })

}
</script>
