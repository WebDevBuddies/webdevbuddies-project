import Vue from 'vue';
import store from './vuex/store';
import VueRouter from 'vue-router';

import { sync } from 'vuex-router-sync';
import { Components } from './components';

Vue.use(VueRouter);

export const routes = [
    { path: '/', name: 'home', component: Components.AppHome },
    { path: '/login', name: 'login', component: Components.Login },
    { path: '/register', name: 'register', component: Components.Register },
    { path: '/dashboard', name: 'dashboard', component: Components.Dashboard, meta: {requiresAuth: true} },
];

const router = new VueRouter({
    routes,
    history: false,
});

sync(store, router);

router.beforeEach((to, from, next) => {
    if (to.matched.some(record => record.meta.requiresAuth) && ! store.state.auth.me) {
        // if route requires auth and user isn't authenticated
        next('/login')
    }
    else if (to.matched.some(record => record.meta.requiresAdmin) && (! store.state.auth.me || ! includes(['admin'], store.state.auth.me.role))) {
        // if route required admin role
        next('/login')
    } else {
        next()
    }
})

export default router;
