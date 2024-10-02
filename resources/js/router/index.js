import { createRouter, createWebHistory } from "vue-router";
import store from "../store";

import noteIndex from "../components/notes/Index.vue";
import notFound from "../components/NotFound.vue";
import noteForm from "../components/notes/Form.vue";
import login from "../pages/auth/Login.vue";
import register from "../pages/auth/Register.vue";
import home from "../pages/Home.vue";

const routes = [
    {
        path: "/",
        name: "notes.index",
        component: noteIndex,
        // meta: { requiresAuth: true },
    },
    {
        path: "/notes/create",
        name: "notes.create",
        component: noteForm,
        // meta: { requiresAuth: true },
    },
    {
        path: "/notes/:id/edit",
        name: "notes.edit",
        component: noteForm,
        // meta: { requiresAuth: true },
    },
    {
        path: "/home",
        name: "home",
        component: home,
    },
    {
        path: "/home/login",
        name: "auth.login",
        component: login,
    },
    {
        path: "/home/register",
        name: "auth.register",
        component: register,
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

router.beforeEach(async (to, from, next) => {
    if (to.meta.requiresAuth && !store.getters.isAuthenticated) {
        next({ name: "home" });
    } else if (
        (to.name === "auth.login" || to.name === "auth.register") &&
        store.getters.isAuthenticated
    ) {
        next({ name: "notes.index" });
    } else {
        next();
    }
});

export default router;
