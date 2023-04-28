import { createApp } from 'vue';
import { createRouter, createWebHistory } from 'vue-router';
import routes from './routes';
import axios from 'axios'; 

import VueHeader from './components/header.vue';
import VueFooter from './components/footer.vue';
import App from './App.vue'

const router = createRouter({
  history: createWebHistory(),
  routes
});

const app = createApp(App,{
  components: {
    VueHeader,
    VueFooter
  }
});

app.use(router);

app.mount('#app');
