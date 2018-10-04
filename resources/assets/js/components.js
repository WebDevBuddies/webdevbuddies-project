import Vue from 'vue';

export const Components = {
    AppHome : Vue.component('app-home', require('./components/AppHome.vue')),

    Login : Vue.component('auth-login', require('./components/auth/Login.vue')),
    Register : Vue.component('auth-register', require('./components/auth/Register.vue')),

    Toast : Vue.component('wdb-toast', require('./components/Toast.vue')),
    Dashboard : Vue.component('app-dashboard', require('./components/Dashboard.vue')),
};
