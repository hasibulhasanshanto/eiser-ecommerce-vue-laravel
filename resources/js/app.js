
require('./bootstrap');    
require('admin-lte'); 

import Vue from 'vue'
import VueRouter from 'vue-router'
Vue.use(VueRouter)

import Vuex from 'vuex'
Vue.use(Vuex)

// ES6 Modules or TypeScript
import Swal from 'sweetalert2' 
window.Swal = Swal;
const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: true,
  onOpen: (toast) => {
    toast.addEventListener('mouseenter', Swal.stopTimer)
    toast.addEventListener('mouseleave', Swal.resumeTimer)
  }
})
window.Toast = Toast;

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('master-main', require('./components/public/Master.vue').default);
Vue.component('header-main', require('./components/public/includes/Header.vue').default);
Vue.component('footer-main', require('./components/public/includes/Footer.vue').default);

import { routes } from './routes';
import storeData from './store/store.js';

const router = new VueRouter({
    routes, // short for `routes: routes`
    //mode: 'hash'
    mode: 'history'
})

const store = new Vuex.Store(
    storeData
)
    
const app = new Vue({
    el: '#app',
    router,
    store

});
