<template>
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <div class="navbar-nav">
            <div class="nav-item d-none d-sm-inline-block">
                <span class="nav-link">{{$t('admin.clients')}}</span>
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
                    <th>{{$t('admin.name_surname')}}</th>
                    <th>{{$t('admin.gender')}}</th>
                    <th>{{$t('admin.experience')}}</th>
                    <th>{{$t('admin.position')}}</th>
                    <th>{{$t('admin.salary')}}</th>
                    <th>{{$t('admin.city')}}</th>
                    <th>{{$t('admin.phone')}}</th>
                    <th>{{$t('admin.email')}}</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="client in this.clients">
                    <td class="align-middle">{{client.id}}</td>
                    <td class="align-middle">{{client.first_name}} {{client.second_name}}</td>
                    <td class="align-middle">{{client.gender}}</td>
                    <td class="align-middle">{{client.experience}}</td>
                    <td class="align-middle">{{client.position}}</td>
                    <td class="align-middle">{{client.salary}}</td>
                    <td class="align-middle">{{client.city}}</td>
                    <td class="align-middle">{{client.phone}}</td>
                    <td class="align-middle">{{client.email}}</td>
                    <th class="align-middle">
                        <button class="btn btn-danger"
                                @click="deleteClient(client.id)">
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
    name: "AdminClient",
    components: {
        "admin-side-bar": Admin
    },
    data(){
        return{
            clients:{},
            pagination:{}
        }
    },
    mounted() {
        this.getCompanies()
    },
    methods:{
        getCompanies(page_url){
            page_url = page_url || 'api/employee?lang=' + this.$i18n.locale;
            this.$http.get(page_url)
                .then(response => {
                    this.clients = response.data.data;
                    this.makePagination(response.data)
                })
        },
        deleteClient(id){
            this.$http.delete('api/employee/' + id)
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
            console.log(this.pagination)
        },
    }
}
</script>

<style scoped>

</style>
