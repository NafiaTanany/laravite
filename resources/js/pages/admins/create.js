import { createApp } from 'vue'
import create from '@/components/admin/Create.vue'
const app = createApp({});
app.component('create', create);
app.mount('#app');

