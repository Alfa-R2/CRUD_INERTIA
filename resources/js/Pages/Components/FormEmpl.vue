<template>
    <div class="bg-white p-5 rounded ">
        <h4 class="border-b pb-4 mb-4 font-medium ">{{ title }} empleado</h4>
        <form class="flex flex-col" v-on:submit.prevent="save()">
            <label for="txt_nombre" >Nombre:</label>
            <input class="input " id="txt_nombre" type="text" v-model="form.nombre">
            <div v-if="form.errors">{{ form.errors.nombre }}</div>
            <label for="txt_email" >Email:</label>
            <input id="txt_email" class="input" type="email" v-model="form.email">
            <div v-if="form.errors">{{ form.errors.email }}</div>
            <label for="tel" >Teléfono:</label>
            <input id="tel" class="input" type="tel" v-model="form.telefono">
            <div v-if="form.errors">{{ form.errors.telefono }}</div>
            <label for="cbDpt">Departamento:</label>
            <select id="cbDpt" required v-model="form.id_departamento" class="input !mb-6">
                <option disabled value="0">Seleccione un departamento</option>
                <option v-for="dpt in objDpt" v-bind:value="dpt.id" >   
                    {{ dpt.nombre }}
                </option>
            </select>
            <div v-if="form.errors">{{ form.errors.id_departamento }}</div>
            <div class="flex justify-between">
                <span class="btn bg-red-500 cursor-pointer" v-on:click="close">Cancelar</span> <button class="btn bg-black" type="submit" v-bind:disabled="form.processing" ><i class="fa-solid fa-floppy-disk" v-bind:disabled="form.processing"></i> Guardar</button>
            </div>
        </form>
        
    </div>
</template>
<script setup>
import { useForm } from '@inertiajs/vue3';
import Swal from 'sweetalert2';
const props= defineProps({
    mode:{
        type:Number
    },
    objEmp:{
        type:Object,
        required:true
    },
    objDpt:{
        type:Object,
        required:true
    }
})
const emits= defineEmits(["close"])
let selectedDpt=props.objEmp.id_departamento;
const form= useForm({
    nombre:props.objEmp.nombre,
    email:props.objEmp.email,
    telefono:props.objEmp.telefono,
    id_departamento: selectedDpt,
})
let title=props.mode==0?"Registrar":"Editar";
const close=()=>{
    form.reset();
    emits("close")
}
function response(msj){
    setTimeout(()=>{
        if(form.hasErrors){
            Swal.fire({
                icon:"error",
                text:"No se ha registrado el empleado"
            })
        }else{
            form.reset();
            close();
            Swal.fire({
                icon:"success",
                text:msj

            })
        }
    },500)
    
}
function save(){
    if(props.mode==0){
        form.post(route("empleado.store"),{onSuccess:response("Empleado creado exitosamente")});
        
        
    }else if(props.mode==1){
        form.put(route("empleado.update", props.objEmp.id),{onSuccess:response("Empleado actualizado exitosamente")})
    }
}
</script>
