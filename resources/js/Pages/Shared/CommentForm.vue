<template>
    <section class="mt-5 rounded-xl max-e-md mx-auto">

        <form class="text-center" method="post" @submit.prevent="submit">
            <div class="mb-6">
                <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" :class="labelClasses(form.errors.title)">Titolo</label>
                <input type="title"
                       id="title"
                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                       name="title"
                       v-model="form.title"
                       :class="inputClasses(form.errors.title)"
                >
                <p class="mt-2 text-sm text-red-600 dark:text-red-500"
                   v-if="form.errors.title"
                   v-text="form.errors.title"
                ></p>
            </div>
            <div>

            </div>
            <div class="mb-6">
                <label for="body" class="block mb-2 text-sm font-medium dark:text-white" :class="labelClasses(form.errors.body)">Testo</label>
                <textarea type="body"
                       id="body"
                       class=" border text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"

                       name="body"
                       v-model="form.body"
                       :class="inputClasses(form.errors.body)"
                ></textarea>
                <p class="mt-2 text-sm text-red-600 dark:text-red-500"
                   v-if="form.errors.body"
                   v-text="form.errors.body"
                ></p>
            </div>
            <button type="submit"
                    class="text-white hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                    :disabled="form.processing"
            >
                Commenta
            </button>
        </form>

    </section>
</template>

<script setup>
import { useForm } from "@inertiajs/vue3";

let props = defineProps({
    userId: Number,
    articleId: Number,
 })

let form = useForm({
    title: '',
    body: '',
    user_id: props.userId,
    article_id: props.articleId,
});

let submit = () => {
    form.post('/comments', {
        onSuccess: () => form.reset(),
    })
};

let inputClasses = (error) => {
    return error ? 'bg-red-50 border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500 focus:border-red-500 dark:bg-red-100 dark:border-red-400' : 'border-gray-300 text-gray-900 text-gray-900'
}

let labelClasses = (error) => {
    return error ? 'font-medium text-red-700 dark:text-red-500' : ''
}

</script>

<style scoped>
button {
    background-color: #3f4257;
}
</style>
