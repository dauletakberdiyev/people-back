<template>
    <carousel :items-to-show="this.itemsToShow"
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
            },
            windowWidth: 0,
            itemsToShow: 3
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
        this.getCompanies(), 
        this.changeCarouselShow(),
        this.nextTrick()
    },
    beforeDestroy() { 
        window.removeEventListener('resize', this.changeCarouselShow); 
    },
    methods:{
        getCompanies(){
            this.$http.get('api/employer/latestCompanies?lang=' + this.$i18n.locale)
                .then(response => {
                    this.values.companies = response.data;
                })
        },
        nextTrick(){
            this.$nextTick(() => {
                window.addEventListener('resize', this.changeCarouselShow);
            })
        },
        changeCarouselShow(){
            this.windowWidth = window.innerWidth;
            if(this.windowWidth < 600){
                this.itemsToShow = 1;
            }
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
