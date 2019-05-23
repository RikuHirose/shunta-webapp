/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap')

import Vue from 'vue'
import VModal from 'vue-js-modal'

Vue.prototype.$axios = window.axios

Vue.use(VModal, { dynamic: true, injectModalsContainer: true })
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('header-right-list', require('./components/headerRightList.vue').default)

/* ============================================================================
 * input
 * ========================================================================= */
Vue.component('search-restaurants-select', require('./components/input/searchRestaurantsSelect.vue').default)
Vue.component('search-restaurants-suggest', require('./components/input/searchRestaurantsSuggest.vue').default)
/* ============================================================================
 * modal
 * ========================================================================= */

/* ============================================================================
 * restaurants
 * ========================================================================= */
Vue.component('favorite-restaurant', require('./components/restaurants/favoriteRestaurant.vue').default)
Vue.component('search-restaurants', require('./components/restaurants/searchRestaurants.vue').default)

/* ============================================================================
 * user
 * ========================================================================= */
Vue.component('update-user-image', require('./components/user/updateUserImage.vue').default)
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({ // eslint-disable-line
  el: '#app'
})