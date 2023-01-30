<template>
    <nav>
        <ul class="flex space-x-4">
            <li>
                <NavLink href="/"
                         :active="$page.component === 'Home'"
                >
                    Home
                </NavLink>
            </li>
            <li>
                <NavLink href="/about"
                         :active="$page.component === 'About'"
                >
                    About
                </NavLink>
            </li>
            <li>
                <Link href="/contatti"
                      class=""
                      :class="{'font-bold underline text-blue-600' : $page.url.startsWith('/contatti')}"
                >
                    Contatti
                </Link>

            </li>
            <li>
                <Link class=""
                      href="/logout"
                      method="post" as="button" :data="{name: 'Agostino' }">Logout
                </Link>
<!--                 in un link, si usa l'attributo preserve-scroll  per mantenere la posizione dello scroll al refresh (da usare tipo quando si applicano dei filtri  -->
            </li>
        </ul>
    </nav>
</template>

<script>
import {Link} from '@inertiajs/vue3'
import NavLink from "./NavLink.vue";

export default {
    name: "Nav",
    components: {
        Link,
        NavLink,
    }
}
</script>

<style scoped>

</style>
