require('./bootstrap');

window.Vue = require('vue');
import Buefy from 'buefy'

Vue.use(Buefy);

// Vue.component('example', require('./components/Example.vue'));

const app = new Vue({
  el: '#app',
  data: {
    auto_password: true,
    password_options: 'keep'
  }
});

$(document).ready(function() {
  $('button.dropdown').hover(function(e) {
    $(this).toggleClass('is-open');
  });
});
