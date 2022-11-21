  import './bootstrap';

  import { createApp } from 'vue'

  const app = createApp({})
  import createAdmin from '@/components/admins/Create.vue'
  import IndexAdmin from '@/components/admins/Index.vue'
  import IndexUser from '@/components/users/Index.vue'
  import createUser from '@/components/users/Create.vue'
  app
      .component('create-admins', createAdmin)
      .component('index-admins', IndexAdmin)
      .component('create-users', createUser)
      .component('index-users', IndexUser)

  app.mount('#app');
