<template>
    <div class="block">
        <label for="name" class="text-font_color">Nombre del Departamento:</label>
        <form v-on:submit.prevent="send(url,method)">
            <input id="name" class="input w-1/2" type="text" v-model="form.nombre" />
            <div class="text-xs text-red-400 pb-2" v-if="form.errors.nombre">*{{ form.errors.nombre }}</div>
            <button class=" block btn_dpt"><i class="fa-solid fa-floppy-disk" type="submit" v-bind:disabled="form.processing"></i> Guardar</button>
        </form>
    </div>
    
</template>
<script setup>
import { useForm } from '@inertiajs/vue3';
const props= defineProps({
    url:{
        type:String,
        required:true
    },
    obj:{
        type:Object,
        default:{
            nombre:""
        }
    },
    method:{
        type:String,
        default:"POST"
    }
});

const form= useForm({
    nombre:props.obj.nombre
})
function send(url, method){
    switch(method){
        case "POST":
            form.post(url)
            break;
        case "PUT":
            form.put(url)
            break;
    }
}
</script>