
<template>
    <Nav />
    <Home />
    
</template>


<script>
    import Nav from './components/Nav'
    import Home from './components/Home/Home.vue'

    export default {
        name: 'App',
        components: {
            Nav,
            Home,
        }
    }
</script>
