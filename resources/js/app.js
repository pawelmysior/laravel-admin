import PortalVue from 'portal-vue';
import Vue from 'vue';
import VueRenderlessComponents from 'vue-renderless-components';

Vue.use(PortalVue);
Vue.use(VueRenderlessComponents);

const files = require.context('./', true, /\.vue$/i);
files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

const app = new Vue({
  el: '#app',
});
