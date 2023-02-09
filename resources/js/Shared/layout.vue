<template>
    <header class=" ">
        <div class="container m-auto flex justify-between">
            <h3 class="text-blue-500 text-2xl text-bold">HobbyAround</h3>

            <Nav class=""></Nav>
        </div>
    </header>

    <div class="container m-auto mt-6">
        <slot/>
    </div>


</template>

<script>
import Nav from "./Nav.vue";

export default {

    components: {
        Nav
    },
    computed: {
      username() {
          return this.$page.props.auth.user.username;
      }
    },
}
</script>

<style scoped>

    header {
        padding: 20px 0;
        background: darkgrey;
    }
</style>
