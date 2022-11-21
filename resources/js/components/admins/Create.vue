<script >
import swal from 'sweetalert2'
export default {
    data(){
        return{
            id:'',
            name:'',
            email:'',
            mobile:'',
            password:'',
            validation: '',

        };
    },
    props:{
      admin:Object
    },
    methods:{

        save() {
            axios.post('/admins', {
                id: this.id,
                name: this.name,
                mobile: this.mobile,
                password: this.password,
                email: this.email,
            }).then(response => {
                swal.fire({
                    title: response.data.message,
                    icon: "success",
                    type: "success",
                    timer: 2000,
                    buttons: false,
                });
                location.href='/admins'
            }).catch(error => {
                this.validation = error.response.data.errors;

                // swal.fire({
                //     title: error.response.data.message,
                //     icon: "error",
                //     type: "error",
                //     timer: 2000,
                //     buttons: false,
                // });
            });
        },
        reset() {
            this.name='';
            this.email='';
            this.password='';
            this.mobile='';
        }

    },
    mounted() {
        if(this.admin){
            this.id=this.admin.id
            this.name=this.admin.name
            this.email=this.admin.email
            this.mobile=this.admin.mobile
        }
    },
};
</script>
<template>

    <div class="col-md-6 col-12" >
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Admin Form</h4>
            </div>
            <div class="card-body">
                <div class="form form-horizontal">
                    <div class="row">
                        <div class="col-12">
                            <div class="mb-1 row">
                                <div class="col-sm-3">
                                    <label class="col-form-label" for="first-name">fullName</label>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" id="first-name" class="form-control" v-model="name" placeholder="First Name">
                                    <span class="form-control-feedback" style="color: red" v-if="validation && validation.name">
                                          {{ validation.name[0] }}
                                        </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-1 row">
                                <div class="col-sm-3">
                                    <label class="col-form-label" for="email-id">Email</label>
                                </div>
                                <div class="col-sm-9">
                                    <input type="email" id="email-id" class="form-control" v-model="email" placeholder="Email">
                                    <span class="form-control-feedback" style="color: red" v-if="validation && validation.email">
                                          {{ validation.email[0] }}
                                        </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-1 row">
                                <div class="col-sm-3">
                                    <label class="col-form-label" for="contact-info">Mobile</label>
                                </div>
                                <div class="col-sm-9">
                                    <input type="number" id="contact-info" class="form-control" v-model="mobile" placeholder="Mobile">
                                    <span class="form-control-feedback" style="color: red" v-if="validation && validation.mobile">
                                          {{ validation.mobile[0] }}
                                        </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-1 row">
                                <div class="col-sm-3">
                                    <label class="col-form-label" for="password">Password</label>
                                </div>
                                <div class="col-sm-9">
                                    <input type="password" id="password" class="form-control" v-model="password" placeholder="Password">
                                    <span class="form-control-feedback" style="color: red" v-if="validation && validation.password">
                                          {{ validation.password[0] }}
                                        </span>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-9 offset-sm-3">
                            <button class="btn btn-primary me-1 waves-effect waves-float waves-light" @click="save()">Submit</button>
                            <a  href="/admins" class="btn btn-outline-secondary waves-effect" @click="reset()">Reset</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

