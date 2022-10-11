<script >
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
            axios.post('/users/store', {
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
</script>
<template>

    <div class="col-md-6 col-12" >
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">User Form</h4>
            </div>
            <div class="card-body">
                <form class="form form-horizontal">
                    <div class="row">
                        <div class="col-12">
                            <div class="mb-1 row">
                                <div class="col-sm-3">
                                    <label class="col-form-label" for="first-name">Name</label>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" id="first-name" class="form-control" v-model="name" placeholder="First Name">
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
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-9 offset-sm-3">
                            <button class="btn btn-primary me-1 waves-effect waves-float waves-light" @click="save()">Submit</button>
                            <button  class="btn btn-outline-secondary waves-effect" @click="reset()">Reset</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

