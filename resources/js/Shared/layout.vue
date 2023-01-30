<template>
    <header class="flex justify-between">

        <h3 class="text-blue-500 text-2xl text-bold">My app</h3>

        <Nav class=""></Nav>

    </header>

    <slot/>


</template>

<script>
import Nav from './Nav.vue'
export default {
    name: "layout",
    components: {
        Nav
    },
}
</script>

<style scoped>

</style>
