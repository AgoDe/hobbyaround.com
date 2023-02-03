import { createApp, h } from 'vue'
import {createInertiaApp, Link} from '@inertiajs/vue3'
import '../css/app.css';
import Layout from "@/Shared/layout.vue";

createInertiaApp({
    resolve: name => {
        const pages = import.meta.glob('./Pages/**/*.vue', { eager: true })

        // per impostare il layout di default
        let page = pages[`./Pages/${name}.vue`]
        page.default.layout = page.default.layout || Layout
        return page
    },
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .component('Link', Link)
            .mount(el)
    },
})
