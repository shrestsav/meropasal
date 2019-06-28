window.Vue = require('vue');
window.axios = require('axios');

import VueRouter from 'vue-router'
import VueProgressBar from 'vue-progressbar'

require('./bootstrap');

Vue.component('pagination', require('laravel-vue-pagination'));
Vue.use(VueRouter)
Vue.use(VueProgressBar, {
  color: '#2dce89',
  failedColor: 'red',
  thickness: '4px',
  height: '2px'
})

//Import Components
import dashboard from './components/dashboard.vue'
import items from './components/items/index.vue'
import addItem from './components/items/add.vue'
import showItem from './components/items/show.vue'
import editItem from './components/items/edit.vue'

const routes = [
  {name:'dashboard', path: '/', component: dashboard },
  {name:'items', path: '/items', component: items },
  {name:'addItem', path: '/addItem', component: addItem , props:true},
  {name:'showItem', path: '/showItem', component: showItem, props:true },
  {name:'editItem', path: '/editItem', component: editItem , props:true},
]

const router = new VueRouter({
	// mode: 'history',
  	routes // short for `routes: routes`
})

const app = new Vue({
    el: '#app',
    router,
});
