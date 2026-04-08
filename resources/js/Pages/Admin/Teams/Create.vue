<template>
    <!--begin::App Content Header-->
    <div class="app-content-header">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Team Create</h3>
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
                    <!-- form start -->
                    <form>
                        <div class="card-body">
                            
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input @input="clearError('name')" v-model="form.name" type="text" class="form-control" id="name" placeholder="Введите имя">
                            </div>
                            <div v-if="errors.name" class="text-danger mt-1">
                                {{ errors.name }}
                            </div>

                            <div class="form-group">
                                <label>Buyer Owner</label>
                                <select class="form-control select2 select2-hidden-accessible" style="width: 100%;"
                                    data-select2-id="1" tabindex="-1" aria-hidden="true"
                                    v-model="form.buyer_owner_id"
                                    @change="clearError('buyer_owner_id')"
                                    >
                                    <option :value="null" disabled>Выбирете баера</option>
                                    <option 
                                    v-for="buyer in buyers"
                                    :key="buyer.id"
                                    :value="buyer.id"
                                    >
                                        {{buyer.name}}
                                    </option>
                                </select>
                            </div>
                            <div v-if="errors.buyer_owner_id" class="text-danger mt-1">
                                {{ errors.buyer_owner_id }}
                            </div>
                            
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <a @click.prevent="storeTeam" type="submit" class="btn btn-primary">Submit</a>
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
        buyers:{
            type:Array,
            required:true
        }
    },

    data(){
        return{
            form:{
                name:'',
                buyer_owner_id:null
            },
            errors: {}
        }
    },

    methods:{
        storeTeam(){
            router.post(route('admin.teams.store'), this.form)
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