require('./bootstrap');

import { createApp } from 'vue';
import Scholarship from './components/Scholarship.vue';

const app = createApp({});
app.component('scholarship', Scholarship);
app.mount('#app');
