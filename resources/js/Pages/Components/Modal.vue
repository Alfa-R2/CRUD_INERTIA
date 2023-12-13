<template>
    <div v-if="show" class="fondo fade">
        <FormEmpl v-bind:mode="mode" v-bind:objDpt="objDep" v-bind:objEmp="objEmp" v-on:close="close()"/>
    </div>
</template>
<script setup>
import FormEmpl from './FormEmpl.vue';
const props= defineProps({
    show:{
        type:Boolean,
        default:true
    },
    mode:{
        type:Number,
        default:0
    },
    objDep:{
        type:Object,
        required:true
    },
    objEmp:{
        type:Object,
        required:true
    }
});
const emits= defineEmits(["close"])
function close(){
    emits("close")
}
</script>
<style >

.fondo{
    background-color: RGB(145, 149, 161,0.5);
    @apply fixed top-0 left-0 w-full h-full flex justify-center items-center ;
}
.Modal{
    @apply opacity-100 bg-red-500
}
</style>
