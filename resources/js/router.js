import Vue from 'vue'
import VueRouter from 'vue-router';
import { Components } from './components';

Vue.use(VueRouter);

export const routes = [
    { path: '/', name: 'home', component: Components.AppHome },
];

export const router = new VueRouter({
    routes,
});
