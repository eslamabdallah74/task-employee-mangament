require('./bootstrap');

import { createApp } from 'vue';

import VueHeader from './components/header.vue';
import VueTable from './components/table.vue';
import VueFooter from './components/footer.vue';

const app = createApp({
  components: {
    VueHeader,
    VueTable,
    VueFooter
  }
});

app.mount('#app');
