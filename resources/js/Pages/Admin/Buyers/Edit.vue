<template>
    <!--begin::App Content Header-->
    <div class="app-content-header">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Buyer Edit</h3>
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
                                <label for="name">Name</label>
                                <input v-model="form.name" type="text" class="form-control" id="name" placeholder="{{buyer.name}}" disabled>
                            </div>

                            <div v-if="isBuyer" class="form-group">
                                <label>Support</label>
                                <select class="form-control select2 select2-hidden-accessible" style="width: 100%;"
                                    data-select2-id="1" tabindex="-1" aria-hidden="true"
                                    v-model="form.support_id"
                                    @change="clearError('support_id')"
                                    >
                                    <option value="{{ buyer_seller.id }}" disabled>{{buyer_seller.name}}</option>
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
                                    <option value="{{buyer_team.id || buyer_owner.id}}" disabled>{{buyer_team.name || buyer_owner.name}}</option>
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
                            <a @click.prevent="updateBuyer" type="submit" class="btn btn-primary">Update</a>
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
                team_id:null,
                support_id: null
            },
            errors: {}
        }
    },

    methods:{
        storeUser(){
            router.post(route('admin.buyers.update'), this.form)
        },

        clearError(field){
            if(this.errors[field]){
                delete this.errors[field];
                this.errors = { ...this.errors}
            }
        }
    },

    watch:{

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