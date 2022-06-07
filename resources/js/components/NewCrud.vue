<template>
<div class="flex justify-end">

                <button v-on:click="createUser()"
                    class="px-4 py-2 mr-4 rounded-md bg-sky-500 text-sky-100 hover:bg-green-600">
                    Crea un usuario</button>
                <button v-on:click="createCourt()"
                    class="px-4 py-2 mr-4 rounded-md bg-sky-500 text-sky-100 hover:bg-green-600">Crea un
                    partido</button>
            </div>
</template>
<script>
export default {
    data: function () {
        return {
            user: [],
            court: []
        }
    },
    created() {
        this.loadUsers(),
            this.loadCourts()
    },
    methods: {
        loadUsers() {
            axios.get('/api/users')
                .then(respuesta => {
                    this.user = respuesta.data;
                })
        },
        loadCourts() {
            axios.get('/api/courts')
                .then(respuesta => {
                    this.court = respuesta.data;
                })
        },
        createUser() {
            window.location.href = "/admin/createUser";
        },
        createCourt() {
            window.location.href = "/admin/createCourt";
        },
        seeUser(id) {
            window.location.href = "/" + id;
        },
        seeCourt(id) {
            window.location.href = "/post/" + id;
        },
        editUser(id) {
            window.location.href = "/admin/editUser/" + id;
        },
        editCourt(id) {
            window.location.href = "/admin/editCourt/" + id;
        },
        deleteCourt(id) {
            axios.delete('/admin/deleteCourt/' + id).then(response => this.loadCourts());
        },
        deleteUser(id) {
            axios.delete('/admin/deleteUser/' + id).then(response => this.loadUsers());
        }
    }
}
</script>