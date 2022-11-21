<script >
export default {
    data() {
        return {
            users: '',
        };
    },
    methods: {
        getUsers() {
        axios.get('users/data')
            .then((response) => {

                this.users = response.data.users.data;

            });
        }
    },
    mounted() {
        this.getUsers();
    },
};
</script>
<template>
    <div id="basic-datatable">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                        <div class="card-header border-bottom p-1">
                        <div class="head-label">
                            <h6 class="mb-0">المستخدمين</h6>
                        </div>
                            <div class="dt-action-buttons text-right">
                            <div class="dt-buttons d-inline-flex">

                                <a href="/users/create" class="dt-button create-new btn btn-primary" tabindex="0" aria-controls="DataTables_Table_0" type="button" data-toggle="modal" data-target="#modals-slide-in"><span><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus mr-50 font-small-4"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                               اضافة جديد</span>
                            </a>
                            </div>
                            </div>
                        </div>

                        <table class="datatables-basic table dataTable no-footer dtr-column" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info" style="width: 1037px;">
                        <thead>
                        <tr role="row">
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="2" style="width: 98px;" aria-label="Name: activate to sort column ascending">الاسم</th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="7" style="width: 103px;" aria-label="Email: activate to sort column ascending">البريد الالكتروني</th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="7" style="width: 91px;" aria-label="Date: activate to sort column ascending">الاجراءات</th>
                        </tr>
                        </thead>
                            <tbody>
                            <tr v-for="user in users" class="odd">
                                <td valign="top" colspan="2" class="dataTables_empty">{{user.name}}</td>
                                <td valign="top" colspan="7" class="dataTables_empty">{{user.email}}</td>
                                <td valign="top" colspan="2" class="dataTables_empty">{{user.mobile}}</td>
                                <td valign="top" colspan="2" class="dataTables_empty">{{user.mobile}}</td>
                                <td valign="top" colspan="7" class="dataTables_empty">
                                    <a :href="`/users/${user.id}/delete`" class="btn btn-danger me-1 waves-effect waves-float waves-light " title="تعديل" >
                                   حذف
                                    </a>
                                    <a :href="`/users/${user.id}/edit`" class="btn btn-primary me-1 waves-effect waves-float waves-light " title="تعديل" >
                                   تعديل
                                    </a>
                                </td>
                            </tr>
                            </tbody>
                    </table>

                </div>
            </div>
        </div>
        </div>
    </div>
</template>

