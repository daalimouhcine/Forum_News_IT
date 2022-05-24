<template>
    <div class="w-full">

        <Nav />
        <br />
        <router-view/>
    </div>
</template>

<script>
import Nav from './components/Nav.vue';
export default {
    name: "App",
    components: {
        Nav,
    },
        // data() {
    //     return {
    //         isLoggedIn: false,
    //     }
    // },
    // created() {
    //     if (window.Laravel.isLoggedin) {
    //         this.isLoggedIn = true
    //     }
    // },
    // methods: {
    //     logout(e) {
    //         console.log('ss')
    //         e.preventDefault()
    //         this.$axios.get('/sanctum/csrf-cookie').then(response => {
    //             this.$axios.post('/api/logout')
    //                 .then(response => {
    //                     if (response.data.success) {
    //                         window.location.href = "/"
    //                     } else {
    //                         console.log(response)
    //                     }
    //                 })
    //                 .catch(function (error) {
    //                     console.error(error);
    //                 });
    //         })
    //     }
    // },
}
</script>