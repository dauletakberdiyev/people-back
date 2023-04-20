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
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="company in this.companies">
                    <td class="align-middle">{{company.id}}</td>
                    <td class="align-middle">{{company.name}}</td>
                    <td class="align-middle">{{company.position}}</td>
                    <td class="align-middle">{{company.employment}}</td>
                    <td class="align-middle">{{company.city}}</td>
                    <td class="align-middle">{{company.salary}}</td>
                    <td class="align-middle">{{company.position_desc}}</td>
                    <th class="align-middle">
                        <router-link :to="{name: 'admin_company_edit', params:{id: company.id}}">
                            <button class="btn btn-info">
                                {{$t('admin.edit')}}
                            </button>
                        </router-link>
                    </th>
                    <th class="align-middle">
                        <button class="btn btn-danger"
                                @click="deleteCompany(company.id)">
                                {{$t('admin.delete')}}
                        </button>
                    </th>
                </tr>
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
        <div class="card-footer clearfix">
            <ul class="pagination pagination-sm m-0 float-right">
                <li :class="{disabled: !pagination.prev_page_url}"
                    @click.prevent="getCompanies(pagination.prev_page_url + '&lang=' + this.$i18n.locale)"
                    class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                <li v-for="index in pagination.last_page"
                    @click.prevent="getCompanies(pagination.links[index].url + '&lang=' + this.$i18n.locale)"
                    :class="{disabled: pagination.current_page == index}"
                    class="page-item"><a class="page-link" href="#">{{index}}</a></li>
                <li :class="{disabled: !pagination.next_page_url}"
                    @click.prevent="getCompanies(pagination.next_page_url + '&lang=' + this.$i18n.locale)"
                    class="page-item"><a class="page-link" href="#">&raquo;</a></li>
            </ul>
        </div>
    </div>
</template>

<script>
import Admin from "@/components/Admin.vue";
export default {
    name: "AdminCompany",
    components: {
        "admin-side-bar": Admin
    },
    data(){
        return{
            companies:{},
            pagination:{}
        }
    },

    mounted() {
        this.getCompanies()
    },

    methods:{
        getCompanies(page_url){
            page_url = page_url || 'api/employer?lang=' + this.$i18n.locale;
            this.$http.get(page_url)
                .then(response => {
                    this.companies = response.data.data;
                    this.makePagination(response.data)
                })
        },
        deleteCompany(id){
            this.$http.delete('api/employer/' + id)
                .then(response => {
                    window.location.reload();
                })
                .catch(err => {
                    alert(err.response.data.message);
                })
        },
        makePagination(response){
            let pagination = {
                current_page: response.current_page,
                last_page: response.last_page,
                prev_page_url: response.prev_page_url,
                next_page_url:  response.next_page_url,
                links: response.links,
            }
            this.pagination = pagination;
        },
    }
}
</script>

<style scoped>
.nav-link:hover{
    color: rgba(0,0,0,.5) !important;
}
</style>
