import axios from 'axios'
<template>
    <h1>{{ title }}</h1>
        <div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            <div class="  p-6 rounded-lg shadow-lg" v-for="c in this.court" v-bind:key="c.id">
                <a :href="`/post/${c.id}`">
                    <img :src="`/uploads/${c.img}`" alt=" random imgee" class=" w-4/6 object-cover object-center rounded-lg shadow-md">
                </a>
                <div class="rounded flex items-baseline">
                    <div class="ml-2 text-bold uppercase text-xs font-semibold tracking-wider">
                        {{c.name}}
                    </div>
                </div>
                <h3 class="mt-1 text-xl ">Ciudad: {{c.city}}</h3>
                <div class="mt-1">
                    <p class= "text-blue-500 font-semibold" v-if="c.available === 1">Disponible</p>
                    <p class="text-red-500 font-bold" v-else>No disponible</p>
                </div>
                <div class="mt-4">
                    <p class="text-teal-600 text-md">Nivel de categoría: {{c.category_lvl_court}} </p>
                </div>
                <div class="mt-4">
                    <p class="text-teal-600 text-md">Fecha: {{c.date_booking}} </p>
                </div>
                <div class="mt-4">
                    <p class="text-teal-600 text-md">Hora: {{c.hour_booking}} </p>
                </div>
            </div>
        </div>
</template>
<script>
export default {

    data: function () {
        return {
            court: []
        }
    },
    mounted() {
        axios.get('/api/courts')
            .then(respuesta => {
                this.court = respuesta.data;
            })
    }

}
</script>