
require('./bootstrap');    
require('admin-lte'); 

import Vue from 'vue'

import VueRouter from 'vue-router'
Vue.use(VueRouter)

import Vuex from 'vuex'
Vue.use(Vuex)


Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('master-main', require('./components/public/Master.vue').default);
Vue.component('header-main', require('./components/public/includes/Header.vue').default);
Vue.component('footer-main', require('./components/public/includes/Footer.vue').default);

import { routes } from './routes';
import storeData from './store/store.js';

const router = new VueRouter({
    routes, // short for `routes: routes`
    mode: 'hash'
    //mode: 'history'
})

const store = new Vuex.Store(
    storeData
)
    
const app = new Vue({
    el: '#app',
    router,
    store

});
