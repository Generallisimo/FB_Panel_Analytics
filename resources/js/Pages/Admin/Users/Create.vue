<template>
    <!--begin::App Content Header-->
    <div class="app-content-header">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">User Create</h3>
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


                <div class="card card-primary">
                    <!-- <div class="card-header">
                <h3 class="card-title">User Create</h3>
              </div> -->
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Role</label>
                                <select class="form-control select2 select2-hidden-accessible" style="width: 100%;"
                                    data-select2-id="1" tabindex="-1" aria-hidden="true"
                                    v-model="form.role_id"
                                    @change="clearError('role_id')"
                                    >
                                    <option :value="null" disabled>Выбирете роль</option>
                                    <option 
                                    v-for="role in roles"
                                    :key="role.id"
                                    :value="role.id"
                                    >
                                        {{role.role}}
                                    </option>
                                </select>
                            </div>
                            <div v-if="errors.role_id" class="text-danger mt-1">
                                {{ errors.role_id }}
                            </div>
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input @input="clearError('name')" v-model="form.name" type="text" class="form-control" id="name" placeholder="Введите имя">
                            </div>
                            <div v-if="errors.name" class="text-danger mt-1">
                                {{ errors.name }}
                            </div>
                            <div class="form-group" v-if="!isSeller">
                                <label for="password">Password</label>
                                <input @input="clearError('password')" v-model="form.password" type="password" class="form-control" id="password" placeholder="Введите пароль">
                            </div>
                            <div v-if="errors.password" class="text-danger mt-1">
                                {{ errors.password }}
                            </div>




                            <div v-if="isBuyer" class="form-group">
                                <label>Support</label>
                                <select class="form-control select2 select2-hidden-accessible" style="width: 100%;"
                                    data-select2-id="1" tabindex="-1" aria-hidden="true"
                                    v-model="form.support_id"
                                    @change="clearError('support_id')"
                                    >
                                    <option :value="null" disabled>Выбирете саппорт</option>
                                    <option 
                                    v-for="support in supports"
                                    :key="support.id"
                                    :value="support.id"
                                    >
                                        {{support.name}}
                                    </option>
                                </select>
                            </div>
                            <div v-if="isBuyer" class="form-group">
                                <label>Team Name</label>
                                <select class="form-control select2 select2-hidden-accessible" style="width: 100%;"
                                    data-select2-id="1" tabindex="-1" aria-hidden="true"
                                    v-model="form.team_id"
                                    @change="clearError('team_id')"
                                    >
                                    <option :value="null" disabled>Выбирете команду</option>
                                    <option 
                                    v-for="team in teams"
                                    :key="team.id"
                                    :value="team.id"
                                    >
                                        {{team.name}}
                                    </option>
                                </select>
                            </div>
                            
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <a @click.prevent="storeUser" type="submit" class="btn btn-primary">Submit</a>
                        </div>
                    </form>
                </div>


            </div>
            <!--end::Row-->
            <!-- /.row (main row) -->
        </div>
        <!--end::Container-->
    </div>
    <!--end::App Content-->


</template>

<script>
import AdminLayout from '@/Layouts/AdminLayout.vue';
import { Link, router } from '@inertiajs/vue3';
import axios from 'axios';

export default {
    name: 'Create',

    layout: AdminLayout,

    components: {
        Link
    },

    props:{
        roles:{
            type:Array,
            required:true
        },

        teams:{
            type:Array,
            required: false
        },

        supports:{
            type:Array,
            required:false
        }
    },

    data(){
        return{
            form:{
                name:'',
                password:'',
                role_id:null,
                team_id:null,
                support_id: null
            },
            errors: {}
        }
    },

    methods:{
        storeUser(){
            router.post(route('admin.users.store'), this.form)
        },

        clearError(field){
            if(this.errors[field]){
                delete this.errors[field];
                this.errors = { ...this.errors}
            }
        }
    },

    computed:{
        sellerRoleId(){
            const role = this.roles.find(item => item.role === 'seller')
            return role ? role.id : null
        },

        isSeller(){
            return Number(this.form.role_id) === Number(this.sellerRoleId)
        },

        buyerRoleId(){
            const role = this.roles.find(item => item.role === 'buyer')
            return role ? role.id : null
        },

        isBuyer(){
            return Number(this.form.role_id) === Number(this.buyerRoleId)
        }
    },

    watch:{
        isSeller(value){
            if(value){
                this.form.password = ''
            }
        },

        isBuyer(value){
            if(value){
                this.form.team_id = null
                this.form.support_id = null
            }
        },

        '$page.props.errors':{
            handler(newErrors){
                this.errors = { ...newErrors}
            },
            deep: true,
            immediate: true
        }
    }
}
</script>