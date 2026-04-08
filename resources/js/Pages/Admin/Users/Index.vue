<template>
    <!--begin::App Content Header-->
    <div class="app-content-header">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
                <div class="col-sm-6">
                    <!-- <h3 class="mb-0">Users</h3> -->
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item">
                            <Link :href="route('admin.users.create')">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>
                            </Link>
                        </li>
                    </ol>
                </div>
            </div>
            <!--end::Row-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::App Content Header-->
    <!--begin::App Content-->
    <div class="app-content">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Users</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table table-bordered bg-slate-600">
                            <thead>
                                <tr>
                                    <th style="width: 10px">ID</th>
                                    <th>Name</th>
                                    <th>Role</th>
                                    <th style="width: 40px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr
                                v-for="user in usersData"
                                :key="user.id"
                                >
                                    <td>{{ user.id }}</td>
                                    <td>{{user.name}}</td>
                                    <td>{{user.role}}</td>
                                    <td>
                                        <a href="#" @click.prevent="openDeleteModal(user)">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                            </svg>
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                     
                    
                    <!-- Pagination -->
                    <!-- <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-right">
                  <li class="page-item"><a class="page-link" href="#">«</a></li>
                  <li class="page-item"><a class="page-link" href="#">1</a></li>
                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item"><a class="page-link" href="#">»</a></li>
                </ul>
              </div> -->
                </div>
            </div>
            <!--end::Row-->
            <!-- /.row (main row) -->
        </div>
        <!--end::Container-->
    </div>
    <!--end::App Content-->


    <!-- Delete Modal -->
    <div v-if="deleteModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black/50">
        <div class="bg-white rounded p-4 w-50 shadow">
            <h4 class="mb-3">Подтверждение удаления</h4>

            <p v-if="selectedUser">
                Вы действительно хотите удалить пользователя <strong>{{ selectedUser.name }}</strong>?
            </p>

            <div class="mt-4 d-flex gap-2">
                <button class="btn btn-secondary" @click="closeDeleteModal">
                    Отмена
                </button>
                <button class="btn btn-danger" @click="destroyUser">
                    Удалить
                </button>
            </div>
        </div>
    </div>
</template>

<script>
import AdminLayout from '@/Layouts/AdminLayout.vue';
import { Link } from '@inertiajs/vue3';
import axios from 'axios';

export default {
    name: 'Index',

    layout: AdminLayout,

    components: {
        Link
    },

    props:{
        users:{
            type:Array,
            required:true
        }
    },
    
    data(){
        return{
            usersData: this.users,
            deleteModal: false,
            selectedUser: null,
        }
    },

    methods:{
        openDeleteModal(user) {
            this.selectedUser = user;
            this.deleteModal = true;
        },

        closeDeleteModal() {
            this.deleteModal = false;
            this.selectedUser = null;
        },
        destroyUser(){
            if (!this.selectedUser) {
                return;
            };

            axios.delete(route('admin.users.destroy', this.selectedUser.id))
                .then(() => {
                    this.usersData = this.usersData.filter(item => item.id !== this.selectedUser.id);
                    this.closeDeleteModal();
                })
        }
    }

    // mounted(){
    //     console.log(usersData);
    //     console.log(this.users);
    // },
}
</script>