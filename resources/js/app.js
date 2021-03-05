
require('./bootstrap');

window.Vue = require('vue').default;

Vue.component('example-component', require('./components/ExampleComponent.vue').default);


var app = new Vue({
    el: '#app',
    data: {
      message: 'You loaded this page on ' + new Date().toLocaleString()
    }
  })



import RolesComponent from './components/RolesComponent.vue';

const routes = [
    {
        name: 'roles',
        path: '/yes',
        component: RolesComponent
    },
];
