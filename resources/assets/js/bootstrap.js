import axios from 'axios'
import Vue from 'vue'
import VueRouter from 'vue-router'

window.axios = axios;
window.Vue = Vue;

Vue.use(VueRouter);

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

//let token = document.head.querySelector('meta[name="csrf-token"]');

//if (token) {
    //window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
//} else {
    //console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
//}
