import 'core-js/stable';
import 'regenerator-runtime/runtime';
import Vue from 'vue'
import App from './App.vue'
import router from './router'
import CoreuiVue from '@coreui/vue'
import { iconsSet as icons } from './assets/icons/icons.js'
import store from './store/store'
import i18n from './i18n'
import './Utils/fliter'
import { BootstrapVue, IconsPlugin } from 'bootstrap-vue'
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'
import 'remixicon/fonts/remixicon.css'
import Permissions from './mixins/Permissions.vue';
import iziToast from 'izitoast';
import 'izitoast/dist/css/iziToast.css';
import 'izitoast/dist/css/iziToast.min.css';
import 'vue-select/dist/vue-select.css';
import VueApexCharts from 'vue-apexcharts'
import Input from './components/common/Input.vue';
import Select from './components/common/Select.vue';
import Radio from './components/common/Radio.vue';
import File from './components/common/File.vue';
import Checkbox from './components/common/Checkbox.vue';
import SwitchCheck from './components/common/Switch.vue';
import Required from './components/common/Required.vue';
import Error from './components/common/Error.vue';
import TextEditor from './components/common/TextEditor.vue';
import vSelect from 'vue-select'

import { route } from 'ziggy-js';
import { Ziggy } from './ziggy';

import VueSweetalert2 from 'vue-sweetalert2'
import 'sweetalert2/dist/sweetalert2.min.css'

Vue.use(VueSweetalert2)

Vue.mixin(Permissions);
Vue.prototype.$apiRoute = (name, params = {}, absolute = true) => route(name, params, absolute, Ziggy);
Vue.use(VueApexCharts)
Vue.config.performance = true
Vue.use(CoreuiVue)
Vue.prototype.$log = console.log.bind(console)
Vue.use(iziToast);
Vue.use(BootstrapVue)
Vue.use(IconsPlugin)

Vue.component('apexchart', VueApexCharts)
Vue.component('File', File);
Vue.component('Input', Input);
Vue.component('Select', Select);
Vue.component('Radio', Radio);
Vue.component('v-select', vSelect)
Vue.component('Checkbox', Checkbox)
Vue.component('SwitchCheck', SwitchCheck)
Vue.component('Required', Required)
Vue.component('Error', Error)
Vue.component('TextEditor', TextEditor)

new Vue({
  el: '#app',
  router,
  store,
  icons,
  template: '<App/>',
  i18n,
  components: {
    App
  }
})


