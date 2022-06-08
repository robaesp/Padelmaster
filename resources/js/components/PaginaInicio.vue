import axios from 'axios'
<template>

    <div div class=" mt-3 ml-5 grid-cols-3 bg-blue-300">
        Ciudad: <input type="text" v-model="search" placeholder="Busca por ciudad" class="mb-4">
        Fecha del partido: <input type="date" v-model="startDate" class="mb-4">
    </div>



    <div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 content-start ">
        <div class="  bg-white p-6 rounded-lg " v-for="c in filtroCiudad" v-bind:key="c.id">
            <a :href="`/post/${c.id}`">
                <img :src="`/uploads/${c.img}`" alt=" random image" class=" w-6/6 object-cover rounded-lg shadow-md">
            </a>
            <div class="ml-2 text-bold uppercase text-xs font-semibold ">
                {{ c.name }}
            </div>

            <p class="mt-1 mb-2 text-xl ">Ciudad: {{ c.city }}</p>
            <div v-if="c.category == 'tournament'">
                <p class="mt-1 mb-2 text-xl ">Tamaño: {{ c.participantes }}/{{ c.size }}</p>
            </div>
            <div v-else>
                <div class=" mt-3 grid grid-cols-4 content-center" v-if="c.participantes == 0">
                    <svg xmlns="http://www.w3.org/2000/svg" height="40px" width="40px" class="  text-blue-500"
                        fill="currentColor">
                        <path d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" height="40px" width="40px" class=" h-1 text-black"
                        fill="currentColor">
                        <path d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" height="40px" width="40px" class=" h-1 text-black"
                        fill="currentColor">
                        <path d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" height="40px" width="40px" class="h-1  text-black"
                        fill="currentColor">
                        <path d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                </div>
                <div class=" mt-3 grid grid-cols-4 content-center" v-else-if="c.participantes == 1">
                    <svg xmlns="http://www.w3.org/2000/svg" height="40px" width="40px" class="  text-blue-500"
                        fill="currentColor">
                        <path d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" height="40px" width="40px" class="  text-blue-500"
                        fill="currentColor">
                        <path d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" height="40px" width="40px" class=" text-black"
                        fill="currentColor">
                        <path d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" height="40px" width="40px" class=" text-black"
                        fill="currentColor">
                        <path d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                </div>
                <div class=" mt-3 grid grid-cols-4 content-center" v-else-if="c.participantes == 2">
                    <svg xmlns="http://www.w3.org/2000/svg" height="40px" width="40px" class="  text-blue-500"
                        fill="currentColor">
                        <path d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" height="40px" width="40px" class="  text-blue-500"
                        fill="currentColor">
                        <path d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" height="40px" width="40px" class="  text-blue-500"
                        fill="currentColor">
                        <path d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" height="40px" width="40px" class=" text-black"
                        fill="currentColor">
                        <path d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                </div>
                <div class=" mt-3 grid grid-cols-4 content-center" v-else>
                    <svg xmlns="http://www.w3.org/2000/svg" height="40px" width="40px" class="  text-blue-500"
                        fill="currentColor">
                        <path d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" height="40px" width="40px" class="  text-blue-500"
                        fill="currentColor">
                        <path d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" height="40px" width="40px" class="  text-blue-500"
                        fill="currentColor">
                        <path d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" height="40px" width="40px" class="  text-blue-500"
                        fill="currentColor">
                        <path d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                </div>
            </div>
            <div class="">
                <p class="text-teal-600 text-md">Nivel de categoría: {{ c.category_lvl_court }} </p>
            </div>
            <div class="">
                <p class="text-teal-600 text-md">Fecha: {{ c.date_booking }} </p>
            </div>
            <div class="">
                <p class="text-teal-600 text-md">Hora: {{ c.hour_booking }} </p>
            </div>
            <div class="">
                <p class="text-teal-600 text-md">Tipo: {{ c.category }} </p>
            </div>
        </div>
    </div>

</template>
<script>
export default {

    data: function () {
        return {
            court: [],
            reserva: [],
            search: '',
            startDate: '',


        }
    },

    created() {
        axios.get('/api/courts')
            .then(respuesta => {
                respuesta.data.forEach(item => {
                    axios.get('/api/reserva/' + item.id)
                        .then(participantes => {
                            item.participantes = participantes.data;
                            this.court.push(item)
                        });
                });
            })
    },
    computed: {
        filtroCiudad() {
            let startDate = this.startDate;
            let endDate = this.endDate;
            return this.court.filter((court) => {
                return (court.city.match(this.search) && court.date_booking.match(this.startDate))
            });

        },
        /* filtroDate() {
            let startDate = this.startDate;
            let endDate = this.endDate;
            return this.court.filter((court) => {
                return court.date_booking.match(this.startDate);
            });
        } */
    },


    mounted() {
    },

    methods: {
        reserva() {
            axios.get('/api/reserva/')
                .then(respuesta => {
                    this.reserva = respuesta.data;
                    console.log(this.reserva);
                });
        }
    }
}
</script>