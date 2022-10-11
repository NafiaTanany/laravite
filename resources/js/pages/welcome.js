import { createApp } from 'vue'
import Welcome from '@/components/Welcome.vue'
const app = createApp({});
app.component('welcome', Welcome);
app.mount('#app');
export default {
    data(){
        return{
            id:'',
            name:'',
            email:'',
            mobile:'',
            password:'',
        };
    },

    methods:{

        save() {
            console.log('hi');
            axios.post('/users', {
                id: this.id,
                name: this.name,
                mobile: this.mobile,
                password: this.password,
                email: this.email,
            }).then(response => {

            }).catch(error => {

            });
        },
        reset() {
            console.log('hiiiiiiiiiiiiiiiiiii');
            this.name='';
            this.email='';
            this.password='';
            this.mobile='';
        }

    },

};
