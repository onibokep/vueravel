
require('./bootstrap');

window.Vue = require('vue');

Vue.config.devtools = true;
Vue.config.performance = true;

import App from './components/App.vue';
import 'animate.css';
import 'font-awesome/css/font-awesome.css';

// vue-awesome
import 'vue-awesome/icons';
import Icon from 'vue-awesome/components/Icon.vue';
Vue.component('v-icon', Icon);

const app = new Vue({
    el: '#app',
    render: h => h(App)
});
