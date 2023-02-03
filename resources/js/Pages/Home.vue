<template>


        <h1 class="text-4xl text-blue-600">
            ciao {{ name }}
        </h1>
</template>

<script>
import Layout from '../Shared/Layout.vue'
export default {
    layout: Layout,
    components: {
        Layout,

    },
    props: {
        name: String,
    }
};
</script>
