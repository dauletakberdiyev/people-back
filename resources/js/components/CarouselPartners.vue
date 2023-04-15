<template>
    <carousel :items-to-show="this.itemsToShow"
              :wrapAround="true"
    >
        <slide v-for="partner in partners" :key="partners">
            <img :src="partner" alt="partner" class="partner-img">
        </slide>

        <template #addons> 
            <navigation />
            <pagination />
        </template>
    </carousel>
</template>

<script>
import "vue3-carousel/dist/carousel.css";
import {Carousel, Slide, Pagination, Navigation} from 'vue3-carousel';

export default {
    name: "CarouselPartners",
    data(){
        return{
            partners:[
                'assets/images/dalatex@2x.png',
                'assets/images/azia-import@2x.png',
                'assets/images/baytakdala@2x.png',
                'assets/images/happy-cake@2x.png',
                'assets/images/lg-hausys@2x.png'
            ],
            windowWidth: 0,
            itemsToShow: 4
        }
    },
    components: {
        Carousel,
        Slide,
        Pagination,
        Navigation
    },
    mounted() {
        this.changeCarouselShow(),
        this.nextTrick()
    },
    beforeDestroy() { 
        window.removeEventListener('resize', this.changeCarouselShow); 
    },
    methods:{
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
}
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
.partner-img{
    max-width: 180px;
}
</style>
