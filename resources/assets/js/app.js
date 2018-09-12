require('./bootstrap');

import { router } from './router';

window.Vue = require('vue');

const app = new Vue({
    el: '#wdb-app',
    router
});
