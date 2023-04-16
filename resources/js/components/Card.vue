<template>
    <div
        class="card d-flex flex-column p-4 mr-4 position-relative text-start"
        :class="{border:border}"
        :style="'width:' + width+';height:'+height"
    >
        <!-- title -->
        <div class="d-flex">
            <div class="icon me-3">
                <img class="icon-img" :src="company.logo.substring(42)" alt="mc">
            </div>
            <div>
                <div class="font-size-14">
                    {{company.name}}
                </div>
                <div class="font-size-12 text-grey">
                    {{company.city}}
                </div>
            </div>
        </div>
        <!-- /title -->
        <div class="mt-3">
            <div class="font-size-12 text-darkblack">
                {{company.position}}
            </div>
            <div class="font-size-10 text-grey">
                {{company.employment}}
            </div>
        </div>
        <div class="font-size-9 grey-text mt-3 line-clamp">
            {{company.position_desc}}
        </div>
        <div class="mt-3">
            <div class="font-size-14">
                <span class="text-darkblack">{{company.salary}}</span>
                <span class="text-grey">{{$t('card.month')}}</span>
            </div>
        </div>
        <div class="d-flex justify-content-center mt-3 position-absolute bottom-5">
            <router-link :to="{name: 'new_cv'}">
                <button class="btn bg-darkwhite outline-blue border-transparent rounded-extra p-2 px-5 font-size-12">
                    {{ $t('card.view') }}
                </button>
            </router-link>
        </div>
    </div>
</template>
<script>
import { defineComponent } from "vue";

export default defineComponent({
    data(){
        return{

        }
    },
    props: {
        width: {
            type: String,
            default () {
                return "15.625em";
            }
        },
        height: {
            type: String,
            default () {
                return "18.75em";
            }
        },
        border: {
            type: Boolean,
            default () {
                return true;
            }
        },
        company: Object
    },
    mounted() {

    }
});
</script>
<style scoped>
.grey-text{
    color:#828282 !important;
}
.icon{
    width:2.5em;
    height: 2.5em;
    border-radius:.3125em;
}

.icon-img{
    width: inherit;
}
.line-clamp{
    display: -webkit-box;
    -webkit-line-clamp: 4;
    -webkit-box-orient: vertical;
    overflow: hidden;
}
.bottom-5{
    bottom: 10px;
}
.end-5{
    right: 35px;
}

</style>
