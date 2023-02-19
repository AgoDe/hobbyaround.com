import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue'
import {postcss} from "autoprefixer";

export default defineConfig({
    plugins: [
        vue({
            template: {
                compilerOptions:{
                    isCustomElement: (tag) => ['layout', 'Head'].includes(tag)
                }
            }
        }),
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
        postcss,

    ],
    server: {
        watch: {
            usePolling: true,
        }
    }
});
