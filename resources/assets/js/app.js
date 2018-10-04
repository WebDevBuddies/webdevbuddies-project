require('./bootstrap');

import store from './vuex/store';
import router  from './router';

window.Vue = require('vue');

const app = new Vue({
    el: '#wdb-app',
    store,
    router
});
