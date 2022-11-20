import { createApp } from 'vue'
import IndexAdmin from '@/components/admin/Index.vue'
const app = createApp({});
app.component('index-admin', IndexAdmin);
app.mount('#app');

