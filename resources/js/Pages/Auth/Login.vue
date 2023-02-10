<template>

    <layout>

        <Head title="Login" />

        <h1 class="text-4xl text-grey-600 mb-6">
            Login
        </h1>
        <hr class="my-6">

        <form action="" method="post" class="" @submit.prevent="submit">
            <label for="email" class="block mb-2 uppercase font-bold text-xs text-gray-700">Email</label>
            <input type="email" name="email" id="" class="border rounded-xl p-2" v-model="form.email" required>
            <div v-if="form.errors.email" v-text="form.errors.email" class="text-red-500 text-xs mt-1"></div>

            <label for="password" class="block mb-2 uppercase font-bold text-xs text-gray-700 mt-5">Password</label>
            <input type="password" name="password" id="" class="border rounded-xl p-2" v-model="form.password">
            <div v-if="form.errors.password" v-text="form.errors.password" class="text-red-500 text-xs mt-1"></div>

            <div class="mt-6">
                <button type="submit" class="bg-blue-500 py-2 px-4 rounded-xl" :disabled="form.processing">
                    Accedi
                </button>
            </div>

        </form>
    </layout>




</template>

<script setup>

import { reactive, ref } from "vue";
import { router } from "@inertiajs/vue3"

// let form = reactive({
//     username: '',
//     password: '',
//
// });
// let processing = ref(false);
// let submit = () => {
//     router.post('/login', form, {
//         onStart: () => { processing.value = true },
//         onFinish: () => { processing.value = false },
//     });
// };

import { useForm } from "@inertiajs/vue3";

let form = useForm({
    email: '',
    password: '',
});

let submit = () => {
    form.post('/login')
};
</script>
