require('./bootstrap');

window.Vue = require('vue');
window.Slug = require('slug');
Slug.defaults.mode = "rfc3986";

import Buefy from 'buefy'

Vue.use(Buefy);

Vue.component('slugWidget', require('./components/slugWidget.vue'));

// const app = new Vue({
//   el: '#app',
//   data: {
//     auto_password: true,
//     password_options: 'keep'
//   }
// });

$(document).ready(function() {
  $('button.dropdown').hover(function(e) {
    $(this).toggleClass('is-open');
  });
});

require('./manage');
