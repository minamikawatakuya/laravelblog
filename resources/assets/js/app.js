
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('index', require('./components/Index.vue'));
Vue.component('detail', require('./components/Detail.vue'));
Vue.component('login', require('./components/Login.vue'));
Vue.component('home-index', require('./components/home/Index.vue'));
Vue.component('home-detail', require('./components/home/Detail.vue'));
Vue.component('home-edit', require('./components/home/Edit.vue'));
Vue.component('home-category', require('./components/home/Category.vue'));
Vue.component('home-blog', require('./components/home/Blog.vue'));
Vue.component('category-form', require('./components/partials/CategoryForm.vue'));

const app = new Vue({
    el: '#app'
});
