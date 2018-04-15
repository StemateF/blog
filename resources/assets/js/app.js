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
    created() {
        if (this.auth == null) {
            this.getUser();

        }
    },
    methods: {
        getUser: function() {
            axios.get("/api/auth").then(response => {
                console.log(response);
                if (response.data.data == null) {
                    store.commit('updateAuthState', false);
                } else {
                    store.commit('updateAuthState', true);
                    this.user = response.data.data;
                }

            });
        },
        ...mapMutations(['showLoading', "updateAuthState"])
    },
    computed: {
        ...mapState(['auth', 'loading'])
    },
    data: {
        user: null,
    }

});

router.beforeEach((to, from, next) => {
    console.log(this.loading);

    store.commit('showLoading', true)
    next()
});

router.afterEach(() => {
    store.commit('showLoading', false)
});