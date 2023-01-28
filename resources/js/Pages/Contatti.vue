<template>
    <h1>
        Contatti
    </h1>
    <Nav/>
</template>

<script>
import Nav from "@/Shared/Nav.vue";

export default {
    components: {Nav},
    props: {
        name: String,
    }
};
</script>
