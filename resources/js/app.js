require('./bootstrap');

window.Vue = require('vue');

import VueRouter from 'vue-router';
Vue.use(VueRouter);

import VueAxios from 'vue-axios';
import axios from 'axios';
import VueSocialauth from 'vue-social-auth'

import App from './App.vue';
Vue.use(VueAxios, axios);

import Router from './routes/routing.js'

Vue.component('header-component', require('./parts/HeaderComponent').default);
Vue.component('footer-component', require('./parts/FooterComponent').default);

const router = new VueRouter({
    mode: 'history',
    routes: Router
})

router.beforeEach((to, from, next) => {
        if (to.matched.some(record => record.meta.requiresAuth)) {
            if (localStorage.getItem('shop.jwt') == null) {
                next({
                    path: '/login',
                    params: { nextUrl: to.fullPath }
                })
            } else {
                let user = JSON.parse(localStorage.getItem('shop.user'))
                if (to.matched.some(record => record.meta.is_admin)) {
                    if (user.is_admin == 1) {
                        next()
                    }
                    else {
                        next({ name: 'userboard' })
                    }
                }
                else if (to.matched.some(record => record.meta.is_user)) {
                    if (user.is_admin == 0) {
                        next()
                    }
                    else {
                        next({ name: 'admin' })
                    }
                }
                next()
            }
        } else {
            next()
        }
    })


const app = new Vue(Vue.util.extend({
    router
}, App)).$mount('#app');
