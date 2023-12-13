<template>
    <div class=" h-full overflow-hidden ">
        <Navegation></Navegation>
        <div class="block bg-white mb-5 py-4 px-5 font-semibold">
            <h1>{{ title }}</h1>
        </div>
        <div class="bg-white mx-5 rounded px-4 py-7 mb-5">
            <slot />
        </div>
    </div>
   
</template>
<script setup>
import Navegation from './Navegation.vue';
const props=defineProps({
    title:{
        type:String,
        default:"Departamentos"
    }
})
</script>