<template>
    <h1>
        ciao {{ name }}
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
