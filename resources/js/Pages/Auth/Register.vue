<template>

    <layout>

        <Head title="Registrazione" />


        <main class="grid place-items-center">

            <section class="bg-white py-8 px-14 lg:w-1/3 rounded-xl max-e-md mx-auto">

                <h1 class="text-3xl text-center mb-4">
                    Registrazione
                </h1>

                <form class="text-center" method="post" @submit.prevent="submit">
                    <div class="mb-6">
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" :class="labelClasses(form.errors.email)">Email</label>
                        <input type="email"
                               id="email"
                               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                               placeholder="name@gmail.com"

                               name="email"
                               v-model="form.email"
                               :class="inputClasses(form.errors.email)"
                        >
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500"
                        v-if="form.errors.email"
                        v-text="form.errors.email"
                        ></p>
                    </div>
                    <div>

                    </div>
                    <div class="mb-6">
                        <label for="password" class="block mb-2 text-sm font-medium dark:text-white" :class="labelClasses(form.errors.password)">Password</label>
                        <input type="password"
                               id="password"
                               class=" border text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"

                               name="password"
                               v-model="form.password"
                               :class="inputClasses(form.errors.password)"
                        >
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500"
                           v-if="form.errors.password"
                           v-text="form.errors.password"
                        ></p>
                    </div>
                    <div class="flex items-start mb-6">
<!-- todo: da completare remember me                        -->
                        <label class="relative inline-flex items-center mb-4 cursor-pointer">
                            <input type="checkbox" value="" class="sr-only peer">
                            <div class="w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                            <span class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300">Resta connesso</span>
                        </label>
                    </div>
                    <button type="submit"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                            :disabled="form.processing"
                    >
                        Accedi
                    </button>
                </form>


                <div class="mt-6 text-center">
                    Hai già un account?
                    <Link href="/login" class="route_link">Accedi</Link>
                </div>


            </section>

        </main>

    </layout>




</template>

<script setup>

import { useForm } from "@inertiajs/vue3";

let form = useForm({
    email: '',
    password: '',
});

let submit = () => {
    form.post('/login')
};

let inputClasses = (error) => {
    return error ? 'bg-red-50 border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500 focus:border-red-500 dark:bg-red-100 dark:border-red-400' : 'border-gray-300 text-gray-900 text-gray-900'
}

let labelClasses = (error) => {
    return error ? 'font-medium text-red-700 dark:text-red-500' : ''
}

</script>


<style scoped>

main {
    min-height: calc(100vh - 150px);
}
</style>
