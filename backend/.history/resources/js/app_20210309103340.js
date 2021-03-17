
require('./bootstrap');

window.Vue = require('vue').default;

Vue.component('example-component', require('./components/ExampleComponent.vue').default);


// var app5 = new Vue({
//     el: '#app-5',
//     data: {
//       message: 'Hello Vue.js!'
//     },
//     methods: {
//       reverseMessage: function () {
//         this.message = this.message.split('').reverse().join('')
//       }
//     }
//   })




import RolesComponent from './components/RolesComponent.vue';
