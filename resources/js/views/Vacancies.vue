<template>
    <navbar-view/>
    <div class="text-start">
        <div class="py-5 bg-grey-light padding text-darkgrey">
            <h1>
                {{ $t('vacancies.title') }}
            </h1>
        </div>
        <div class="padding pt-5">
            <div class="text-blue mt-5">
                <dropdown-vue :title="$t('vacancies.dropdown')" />
            </div>
            <div class="grid mt-4 px-4 ">
                <card-vue
                    v-for="company in values.companies"
                    :key="company.id"
                    :company="company"
                    class="mt-3"
                />
            </div>
            <div class="d-flex justify-content-center my-5">
                <button class="btn outline-blue py-2 px-4">
                    {{ $t('vacancies.show_more') }}
                </button>
            </div>
        </div>
    </div>
    <footer-view/>
</template>
<script>
import { defineComponent } from "vue";

import CardVue from "../components/Card.vue";
import DropdownVue from "../components/Dropdown.vue";
import Navbar from "@/components/Navbar.vue";
import Footer from "@/components/Footer.vue";

export default defineComponent({
    data(){
        return{
            values:{
                companies:[]
            }
        }
    },
    components: {
        "navbar-view": Navbar,
        "footer-view": Footer,
        CardVue,
        DropdownVue
    },
    mounted() {
        this.getCompanies()
    },
    methods:{
        getCompanies(){
            this.$http.get('api/employer?lang=' + this.$i18n.locale)
                .then(response => {
                    this.values.companies = response.data.data;
                })
        }
    }
});
</script>
<style scoped>
.grid {
    display: grid;
    grid-template-columns: auto auto auto auto;
}
</style>
