<template>
    <Layout title="Gráficos">
        <div class="grafico">
            <BarChart v-bind:data="data" />
        </div>
    </Layout>    
</template>
<script setup>
import Layout from '../Components/Layout.vue';
import BarChart from '../Components/BarChart.vue';
const props=defineProps({
    data:{
        type:Object,
        required:true
    }
})
</script>
<style>
.grafico{
    overflow: hidden;
    width: 100%;
    height: calc(100vh - 200px);
    display: flex;
    justify-content: center;
}
</style>