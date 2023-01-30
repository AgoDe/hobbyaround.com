<template>
    <h1 class="text-4xl text-blue-600">
        Chi siamo
    </h1>

    <Nav/>

</template>

<script>
import Nav from '../Shared/Nav.vue'
export default {
    components: {
        Nav,

    },
    props: {
        name: String,
    }
};
</script>
