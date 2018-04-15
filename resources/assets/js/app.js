import Vue from 'vue';
import router from "./routes"
import store from './store'
import BootstrapVue from 'bootstrap-vue'

import { mapMutations, mapState } from 'vuex';

window._ = require('lodash');
window.axios = require('axios');
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

if (window.token) {
    window.axios.defaults.headers.common['X-CSRF-TOKEN'] = window.token;
} else {
    console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
}





Vue.use(BootstrapVue);
Vue.component('user-header', require('./components/UserHeaderComponent.vue'))
Vue.component('loader', require('./components/loader.vue'))



const vm = new Vue({
    el: '#app',
    router,
    store,
    methods: {
        login() {
            console.log(login);
        },
        ...mapMutations(['showLoading'])
    },
    computed: {
        ...mapState(['login', 'auth', 'loading'])
    }

});
window.vm = vm;
router.beforeEach((to, from, next) => {
    console.log(this.loading);

    store.commit('showLoading', true)
    next()
});
router.afterEach(() => {
    store.commit('showLoading', false)
});