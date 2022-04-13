
import {createRouter, createWebHistory} from "vue-router"

const routes = [
    {
        path: "/",
        name: "Home",
        component: () => import("../components/Home/Home.vue")
    },
    {
        path: "/poster",
        name: "poster",
        component: () => import("../")
    },
    {
        path: "/login",
        name: "Login",
        component: () => import("../components/Authentication/Login.vue")
    },
    {
        path: "/register",
        name: 'Register',
        component: () => import("../components/Authentication/Register.vue")
    }
];

const router = createRouter ({
    history: createWebHistory(process.env.BASE_URL),
    routes
});

export default router