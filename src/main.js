import Vue from "vue";
//import "./plugins/vuetify"
import App from "./App.vue";
import router from "./router";
import store from "./store";
import "./registerServiceWorker";
import "roboto-fontface/css/roboto/roboto-fontface.css"
import "material-design-icons-iconfont/dist/material-design-icons.css"

import axios from "axios"
import VueAxios from "vue-axios"
 
Vue.use(VueAxios, axios)

import Vuetify from 'vuetify'
//Vue.use(Vuetify)
import 'vuetify/dist/vuetify.min.css' // Ensure you are using css-loader

Vue.config.productionTip = false;

Vue.use(Vuetify, {
  theme: {
    primary: '#1976D2',
  secondary: '#424242',
  accent: '#82B1FF',
  error: '#FF5252',
  info: '#2196F3',
  success: '#4CAF50',
  warning: '#FFC107'
  }
})

new Vue({
  router,
  store,
  render: h => h(App)
}).$mount("#app");
