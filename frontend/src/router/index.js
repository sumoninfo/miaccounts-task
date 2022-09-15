import {createRouter, createWebHistory} from 'vue-router'

import Routes from "../views/_routes";
import Layout from "../views/Layout.vue";

const routes = [
    {
        path     : '/',
        name     : 'App',
        component: Layout,
        children : Routes
    }
]

const router = createRouter({
    history: createWebHistory(),
    routes,
})

export default router
