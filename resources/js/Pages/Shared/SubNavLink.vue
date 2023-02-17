<template>
    <Link class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white" :class="{'active' : active}">
        <slot/>
    </Link>
</template>

<script>
import {Link} from "@inertiajs/vue3";
export default {
    name: "SubNavLink",
    components: { Link },
    props: {
        active: Boolean
    },
}
</script>

<style scoped>

    .active {
        color:#ff5e3a !important;
    }

</style>
