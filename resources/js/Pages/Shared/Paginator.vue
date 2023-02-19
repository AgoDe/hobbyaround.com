<template>
    <nav class="mt-5">
        <ul class="inline-flex -space-x-px">
            <li v-for="link in links"
                class="px-3 py-2 border"
                :class="link.active ? 'bg-gray-500 text-white font-bold' : 'bg-white hover:bg-gray-100 hover:text-gray-700 border-gray-300 text-gray-500' "

            >
                <Link
                    v-if="link.url"
                    :href="link.url"
                    v-html="link.label"
                />

                <span class="text-gray-400"
                      v-else
                      v-html="link.label"
                >
                    </span>
            </li>
        </ul>
    </nav>
</template>

<script setup>
defineProps({
    links: Array
})
</script>

<style scoped>

</style>
