<template>

    <layout>
        <Head title="Articles" />



        <a href="#" class="inline-flex items-center font-medium hover:underline" @click="back()">

            <svg aria-hidden="true" fill="none" class="w-5 h-5 ml-1 text-gray-500" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path d="M19.5 12h-15m0 0l6.75 6.75M4.5 12l6.75-6.75" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>

            <span class="text-gray-500 text-md ml-2">torna agli articoli</span>
        </a>

        <hr>
        <h1 class="text-4xl my-5 font-bold"> {{ article.title }}</h1>




        <div class="grid grid-cols-3 mt-5 gap-6">

            <!-- START:main column -->
            <div class="col-span-2 p-2">
                <div class="flex justify-between mb-5">
                    <div>
                        scritto da <em>{{ user.username }}</em>
                    </div>
                    <div>
                        <em>
                            {{ dateFormat(article.created_at) }}
                        </em>

                    </div>
                </div>

                <p class="mt-4 border-l border-gray-500 pl-2">
                    {{ article.body }}
                </p>

                <hr class="my-5">


                <h3 class="text-2xl font-bold mb-4">Commenti:</h3>

                <div class="grid border border-gray-200 rounded-lg shadow-sm my-2 relative comment_container"
                     v-for="comment in comments.data"
                     :key="comment.id"
                >
                    <figure class="flex flex-col justify-center p-2 text-center bg-white border-b border-gray-200 rounded-t-lg md:rounded-t-none md:rounded-tl-lg md:border-r"

                    >
                        <blockquote class="max-w-2xl mx-auto mb-3 text-gray-500">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                {{ comment.title }}
                            </h3>
                            <p class="my-4 font-light">
                                {{ comment.body }}
                            </p>
                        </blockquote>
                        <figcaption class="flex items-center justify-around space-x-3">
                            <div class="space-y-0.5 font-medium dark:text-white text-left">
                                <div> {{ comment.user.username}}</div>
                                <div class="text-sm font-light text-gray-500 dark:text-gray-400"></div>
                            </div>

                            <div>
                                <em>{{ dateFormat(comment.created_at)}}</em>
                            </div>
                        </figcaption>
                    </figure>


                    <div class="comment_action_box">

                        <button >
                            <svg aria-hidden="true" class="text-gray-500" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                        </button>

                        <button>
                            <svg aria-hidden="true" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                        </button>
                    </div>

                </div>



            </div>
            <!-- END:main column -->

            <!-- START:right column -->
            <div class="comments_form min-h-full" >
                <h3 class="text-lg font-bold mb-3">Commenta l'articolo</h3>

                <CommentForm :userId="user.id" :articleId="article.id"></CommentForm>
            </div>
            <!-- END:main column -->

        </div>



    </layout>

</template>

<script setup>

import {defineComponent, ref, watch} from "vue";
import {Link, router} from "@inertiajs/vue3";
import dayjs from 'dayjs';
import CommentForm from "../Shared/CommentForm.vue";

let props = defineProps({
    article: Object,
    user: Object,
    comments: Object,
})

defineComponent({
    Link,
    CommentForm,
})

let dateFormat = function(dateString){
    const date = dayjs(dateString)
    return date.format('DD/MM/YYYY HH:mm')
}

let back = () => { window.history.back() };





</script>

<style scoped>
    .comments_form {
        border-left: 2px solid #3f4257 ;
        padding-left: 2rem;
    }

    .comment_action_box {
        display: none;
        position: absolute;
        right: 0;
        width: 80px;
        background-color: transparent;
        height: 100%;
        color: #3f4257;
        flex-direction: column;


    }

    .comment_action_box button{
        width: 25px;
    }

    .comment_container:hover .comment_action_box {
        display: flex;
        align-items: center;
        justify-content: space-around;

    }
</style>
