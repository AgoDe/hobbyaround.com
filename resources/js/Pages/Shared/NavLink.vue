<template>
    <Link class="block py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent"
          :class="{'active' : active}"
    >
        <slot/>
    </Link>
</template>

<script>
import {Link} from "@inertiajs/vue3";
export default {
    name: "NavLink",
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
