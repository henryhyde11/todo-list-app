import { createRouter, createWebHistory } from "vue-router";

import noteIndex from "../components/notes/Index.vue";
import notFound from "../components/NotFound.vue";
import noteForm from "../components/notes/Form.vue";

const routes = [
    {
        path: "/",
        name: "notes.index",
        component: noteIndex,
    },
    {
        path: "/notes/create",
        name: "notes.create",
        component: noteForm,
    },
    {
        path: "/notes/:id/edit",
        name: "notes.edit",
        component: noteForm,
    },
    {
        path: "/:pathMatch(.*)*",
        name: "notfound",
        component: notFound,
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;
