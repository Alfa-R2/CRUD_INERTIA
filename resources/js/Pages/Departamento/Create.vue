<template>
    <Layout>
        
            <Link  class="inline-block btn_dpt" v-bind:href="url_index" >
                <i class="fa-solid fa-circle-arrow-left"></i> Regresar
            </Link>
            <FormDpt v-bind:url="url_store" method="POST" />
        
    </Layout>
    
</template>
<script setup>
import FormDpt from '../Components/FormDpt.vue';
import Layout from '../Components/Layout.vue';
import { Link } from '@inertiajs/vue3';
const props= defineProps({
    url_store:{
        type:String,
        required:true
    },
    url_index:{
        type:String,
        required:true
    }
});
</script>