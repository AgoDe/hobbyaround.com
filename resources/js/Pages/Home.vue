<template>

    <layout>

        <h1 class="text-4xl text-blue-600">
            ciao {{ name }}
        </h1>
    </layout>




</template>

<script>
import Layout from '../Shared/Layout.vue'
export default {
    components: {
        Layout,

    },
    props: {
        name: String,
    }
};
</script>
