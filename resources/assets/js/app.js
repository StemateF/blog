import Vue from 'vue'
import VueMaterial from 'vue-material'
import VueRouter from 'vue-router'
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

window._ = require('lodash');
window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

if (window.token) {
    window.axios.defaults.headers.common['X-CSRF-TOKEN'] = window.token;
} else {
    console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
}


Vue.use(VueRouter)
Vue.use(VueMaterial)
    // // 0. If using a module system (e.g. via vue-cli), import Vue and VueRouter
    // // and then call `Vue.use(VueRouter)`.

// // 1. Define route components.
// // These can be imported from other files

// // 2. Define some routes
// // Each route should map to a component. The "component" can
// // either be an actual component constructor created via
// // `Vue.extend()`, or just a component options object.
// // We'll talk about nested routes later.
const home = require('./views/home.vue');
const post = require('./views/post.vue')
const routes = [{
        path: '/',
        name: 'home',
        component: home
    }, {
        path: "/post/:id",
        name: "post",
        component: post
    }

]

// // 3. Create the router instance and pass the `routes` option
// // You can pass in additional options here, but let's
// // keep it simple for now.
const router = new VueRouter({
    routes, // short for `routes: routes`
    mode: 'history',
})

// // 4. Create and mount the root instance.
// // Make sure to inject the router with the router option to make the
// // whole app router-aware.


// // Now the app has started!
// /**
//  * Next, we will create a fresh Vue application instance and attach it to
//  * the page. Then, you may begin adding components to this application
//  * or customize the JavaScript scaffolding to fit your unique needs.
//  */

// // Vue.component('example-component', require('./components/ExampleComponent.vue'));
Vue.use(VueMaterial)

const app = new Vue({
    el: '#app',
    router,
    name: "Reveal",
    data: function data() {
        return {
            menuVisible: false
        }
    }
});