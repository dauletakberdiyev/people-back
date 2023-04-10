<template>
    <carousel :items-to-show="3"
              :wrapAround="true"
    >
        <slide v-for="company in values.companies" :key="company.id">
            <Card :company="company"/>
        </slide>

        <template #addons>
            <navigation />
            <pagination />
        </template>
    </carousel>
</template>
<script type="text/javascript">
import "vue3-carousel/dist/carousel.css";
import {Carousel, Slide, Pagination, Navigation} from 'vue3-carousel';
import Card from "../components/Card.vue";


export default {
    name: 'App',
    data(){
        return{
            values:{
                companies:[]
            }
        }
    },
    components: {
        Carousel,
        Slide,
        Pagination,
        Navigation,
        Card
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
};
</script>
<style scoped>
.carousel-indicators,.card{
    position:static;
}
.carousel-indicators > button {
    border-radius: 50%;
    width:10px;
    height:10px;
    background-color: grey;
}
.carousel-indicators .active{
    background-color: blue;
}
</style>
