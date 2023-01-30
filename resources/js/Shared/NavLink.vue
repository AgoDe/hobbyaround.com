<template>
    <Link
        class=""
        :class="{'font-bold underline text-blue-600' : active }"
    >
        <slot/>
    </Link>
</template>

<script>
import {Link} from '@inertiajs/vue3'
export default {
    name: "NavLink",
    components: { Link },
    props: {
        active: Boolean
    },
}
</script>

<style scoped>

</style>
