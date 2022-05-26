import {createWebHistory, createRouter} from "vue-router";

import Home from '../pages/Home';
import About from '../pages/About';
import Register from '../pages/Register';
import Login from '../pages/Login';
import Dashboard from '../pages/Dashboard';
import Profile from '../pages/Profile';
import AdminDashboard from '../pages/AdminDashboard';

import AddPost from '../components/AddPost';
import EditPost from '../components/EditPost';

export const routes = [
    {
        name: 'home',
        path: '/',
        component: Home
    },
    {
        name: 'about',
        path: '/about',
        component: About
    },
    {
        name: 'register',
        path: '/register',
        component: Register
    },
    {
        name: 'login',
        path: '/login',
        component: Login
    },
    {
        name: 'dashboard',
        path: '/dashboard',
        component: Dashboard
    },
    {
        name: 'addpost',
        path: '/posts/add',
        component: AddPost
    },
    {
        name: 'editpost',
        path: '/posts/edit/:id',
        component: EditPost
    },
    {
        name: 'editprofile',
        path: '/profile',
        component: Profile
    },
    {
        name: 'dashboard',
        path: '/dashboard',
        component: AdminDashboard
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes: routes,
});

export default router;
