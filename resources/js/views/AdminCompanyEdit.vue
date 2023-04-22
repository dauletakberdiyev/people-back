<template>
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <div class="navbar-nav">
            <div class="nav-item d-none d-sm-inline-block">
                <span class="nav-link">{{$t('admin.companies')}}</span>
            </div>
        </div>
    </nav>
    <admin-side-bar/>
    <div class="content-wrapper">
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th style="width: 10px">#</th>
                    <th>Company</th>
                    <th>Position</th>
                    <th>Employment Type</th>
                    <th>City</th>
                    <th>Salary</th>
                    <th>About Position</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="comp in this.company">
                    <td class="align-middle">
                        {{comp.id}}
                    </td>
                    <td class="align-middle">
                        <input type="text" class="in-text p-2 font-size-14 " v-model="comp.name">
                    </td>
                    <td class="align-middle">
                        <input type="text" class="in-text p-2 font-size-14 " v-model="comp.position">
                    </td>
                    <td class="align-middle">
                        <select type="text" class="in-text select-input bg-white" v-model="comp.employment_id">
                            <option v-for="employment in this.employmentTitle" :value="employment.id">
                                {{ employment.title }}
                            </option>
                        </select>
                    </td>
                    <td class="align-middle">
                        <select type="text" class="in-text select-input bg-white" v-model="comp.city_id">
                            <option v-for="city in this.cities" :value="city.id">
                                {{ city.title }}
                            </option>
                        </select>
                    </td>
                    <td class="align-middle">
                        <input type="text" class="in-text" v-model="comp.salary">
                    </td>
                    <td class="align-middle">
                        <textarea rows="4" class="font-size-14 p-2 textarea" type="text" v-model="comp.position_desc"></textarea>
                    </td>
                    <th class="align-middle">
                        <button class="btn btn-info"
                                @click="this.updateCompany(comp)">
                                {{$t('admin.done')}}
                        </button>
                    </th>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
import Admin from "@/components/Admin.vue";
import { routerKey } from "vue-router";
export default {
    name: "AdminCompanyEdit",
    components: {
        "admin-side-bar": Admin
    },
    props:{
        id: {
            type: String
        }
    },
    data(){
        return{
            company:{},
            employmentTitle:{},
            cities:{}
        }
    },
    mounted(){
        this.getCompany(),
        this.getCities(),
        this.getEmploymentTitle()
    },
    methods:{
        getCompany(){
            this.$http.get('/api/employer/' + this.id +'?lang=' + this.$i18n.locale)
                .then(response => {
                    this.company = response.data;
                    console.log(this.company);
                })
        },
        getEmploymentTitle(){
            this.$http.get('api/employment/' + this.$i18n.locale)
                .then(response => {
                    this.employmentTitle = response.data;
                })
        },
        getCities(){
            this.$http.get('api/city/' + this.$i18n.locale)
                .then(response => {
                    this.cities = response.data;
                })
        },
        updateCompany(companyDetail){
            companyDetail['city'] = companyDetail['city_id'];
            companyDetail['employment'] = companyDetail['employment_id'];
            delete companyDetail['city_id'];
            delete companyDetail['employment_id'];
            this.$http.put('api/employer/' + companyDetail['id'], companyDetail)
                .then(response => {
                    this.$router.push({name: 'admin_company'});
                })
                .catch(err => {
                    alert(err.response.data.message);
                })
        }
    }
}

</script>
<style>
.in-text, .textarea{
    border: 1px solid gray;
    border-radius: 5px;
    width: 100%;
}
</style>