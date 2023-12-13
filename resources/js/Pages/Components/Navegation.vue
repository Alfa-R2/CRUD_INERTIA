<template>
    <nav class="bg-white border-b  border-b-background text-font_color">
        <Link class="btn_nav" v-bind:class="{'btn_navActivated': $page.url==='/Departamentos'}" v-bind:href="ruta_dpt" >Departamentos</Link>
        <Link class="btn_nav" v-bind:class="{'btn_navActivated': $page.url==='/Empleados'}" href="/Empleados">Empleados</Link>
        <Link class="btn_nav" v-bind:class="{'btn_navActivated': $page.url==='/graficos'}" href="/graficos">Gráficos</Link>
        <Link class="btn_nav" v-bind:class="{'btn_navActivated': $page.url==='/reportes'}" href="/reportes">Reportes</Link>
    </nav>
</template>

<script setup>
import {Link} from "@inertiajs/vue3"
let ruta_dpt=route('departamento.index');
let ruta_empl=route('empleado.index');
let ruta_grafico=route('empleado.graficos');
let ruta_report=route('empleado.reportes');
</script>

<style scoped>
.btn_nav{
    @apply inline-block p-3 border-b-2  border-white mr-1 hover:text-black  hover:border-black
}
.btn_navActivated{
    @apply  text-black  border-black
}
</style>
