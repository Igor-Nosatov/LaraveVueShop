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

Vue.use(VueSocialauth, {

  providers: {
    github: {
      clientId: '',
      redirectUri: '/auth/github/callback' 
    }
  }
})


const app = new Vue(Vue.util.extend({
    router
}, App)).$mount('#app');
