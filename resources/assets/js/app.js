require('./bootstrap');

/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import Vue from "vue";
import axios from "axios";
import vueAxios from "vue-axios";
import vue_clipboards from "vue-clipboards";
import toggleButton from 'vue-js-toggle-button';
import vueCookie from 'vue-cookie';

// importing custom components
import CreateLink from "./components/CreateLink.vue";
import HookShareX from "./components/HookShareX.vue";
import ChangeTheme from "./components/ChangeTheme.vue";


// Adding the X-CSRF-Token to all axios request
axios.interceptors.request.use(function (config) {
    config.headers['X-CSRF-TOKEN'] = window.Laravel.csrfToken;
    config.headers['APP'] = 'url-shortener';
    return config
});

window.eventBus = new Vue({});

Vue.use(vueAxios, axios);
Vue.use(vue_clipboards);
Vue.use(toggleButton);
Vue.use(vueCookie);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('create-link', CreateLink);
Vue.component('create-share-x', HookShareX);
Vue.component('change-theme', ChangeTheme);

const app = new Vue({
    el: '#app'
});
