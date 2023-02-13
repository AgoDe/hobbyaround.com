<template>

   <Header class="header"></Header>

    <div class="container m-auto mt-6">
        <slot/>
    </div>

</template>

<script>
import Nav from "./Nav.vue";
import Header from "./Header.vue"

export default {

    components: {
        Nav,
        Header,
    },
    computed: {
      username() {

          return this.$page.props.auth.user.username ? 'Ciao ' + this.$page.props.auth.user.username: '';
      }
    },
}
</script>

<style scoped>

    .header {
        /* orange #ff5e3a */
        /* blue #888da8 */
        /* darker blue #3f4257*/
        padding: 20px 0;
        background: #3f4257;
        color: white;
    }
</style>
