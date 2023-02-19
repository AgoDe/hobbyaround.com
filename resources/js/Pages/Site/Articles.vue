<template>

    <layout>
        <Head title="Article" />

        <h1 class="text-3xl mb-5">Tutti gli articoli</h1>

        <hr>


        <div class="relative overflow-x-auto sm:rounded-lg mt-5">
            <div class="pb-4 dark:bg-gray-900">
                <label for="table-search" class="sr-only">Search</label>
                <div class="relative mt-1">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
                    </div>
                    <input type="text"
                           id="table-search"
                           class="block p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                           placeholder="Cerca articoli"
                           v-model="search"
                    >
                </div>
            </div>
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        ID
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Titolo
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Data
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Autore
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
                </thead>
                <tbody>
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600"
                    v-for="article in articles.data"
                    :key="article.id"
                >
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ article.id }}
                    </th>
                    <td class="px-6 py-4">
                        {{ article.title }}
                    </td>
                    <td class="px-6 py-4">
                        {{ article.created_at }}
                    </td>
                    <td class="px-6 py-4">
                        {{ article.user }}
                    </td>
                    <td class="px-6 py-4">
                        <a :href="'/articoli/' + article.slug " class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Leggi</a>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>


        <!-- paginator -->
        <Paginator :links="articles.links"></Paginator>


    </layout>

</template>

<script setup>

import {defineComponent, ref, watch} from "vue";
import {Link, router} from "@inertiajs/vue3";
import Paginator from "../Shared/Paginator.vue"

let props = defineProps({
    articles: Object,
    filters: Object,
})

defineComponent({
    Link,
    Paginator,
})

let search = ref(props.filters.search);

watch(search, value => {
    router.get('/articoli', {search: value}, {
        preserveState: true,
        replace: true,
    })
})

</script>

