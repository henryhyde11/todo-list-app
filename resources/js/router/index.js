import { createRouter, createWebHistory } from "vue-router";

import noteIndex from '../components/notes/Index.vue'
import notFound from '../components/NotFound.vue'

const routes = [
    {
        path: '/',
        name: 'notes.index',
        component: noteIndex
    },
    {
        path: '/:pathMatch(.*)*',
        name: 'notfound',
        component: notFound
    }
]

const router =  createRouter({
    history: createWebHistory(),
    routes
})

export default router