<template>
    <nav>
        <ul>
            <li>
                <Link href="/" class="text-blue-600">Home</Link>
            </li>
            <li>
                <Link href="/contatti" class="">Contatti</Link>
            </li>
            <li>
                <Link class=""
                      href="/logout"
                      method="post" as="button">Logout</Link>
            </li>
        </ul>
    </nav>
</template>

<script>
import {Link} from '@inertiajs/vue3'
export default {
    name: "Nav",
    components: { Link }
}
</script>

<style scoped>

</style>
