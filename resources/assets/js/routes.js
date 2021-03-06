import Vue from "vue";
import VueRouter from "vue-router";
const routes = [
    {
        path: "/",
        name: "home",
        component: require("./views/home.vue")
    },
    {
        path: "/post/:id",
        name: "post",
        component: require("./views/post.vue")

    },
    // {
    //     path: "/category/:slug",
    //     name: "category",
    //     component: require('./views/category.vue')

    // }
    // , {
    //     path: "/categories",
    //     name: "categories",
    //     component: require('./views/categories.vue')

    // },
    {
        path: "/about",
        name: "about",
        component: require("./views/home.vue")

    }

]
Vue.use(VueRouter)

export default new VueRouter({
    routes, // short for `routes: routes`
    mode: "history",
});
