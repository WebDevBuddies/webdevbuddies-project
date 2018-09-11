import Vue from 'vue'
import VueRouter from 'vue-router';
import { Components } from './components';

Vue.use(VueRouter);

export const routes = [
    { path: '/', name: 'home', component: Components.AppHome },
    { path: '/login', name: 'login', component: Components.Login },
    { path: '/register', name: 'register', component: Components.Register },
    { path: '/dashboard', name: 'dashboard', component: Components.Dashboard },
];

export const router = new VueRouter({
    routes,
});
