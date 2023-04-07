<template>
    <div class="text-start text-black ">
        <!-- naidi rabotu pzh -->
        <div class="d-flex flex-fill me-5 mt-5 align-items-center justify-content-end padding">
            <div class="mb-5 ms-auto text-start pb-5 w-500">
                <div
                    class="font-size-64 fw-bold"
                    v-html="$t('home.find_dream_job')"
                />
                <div class="font-size-24">
                    {{ $t('home.find_dream_job_desc') }}
                </div>
                <div class="d-flex mt-4">
                    <div class="btn_work">
                        <img src="assets/images/icon-1@2x.png" alt="icon" class="icon">
                        <router-link class="btn bg-grey-light text-primary btn-pd me-5" :to="'/new_cv'">
                            {{$t('home.search_job')}}
                        </router-link>
                    </div>
                    <div class="btn_work">
                        <img src="assets/images/group-69@2x.png" alt="icon" class="icon">
                        <router-link class="btn bg-grey-light text-primary btn-pd" :to="'/new_employer'">
                            {{$t('home.search_employer')}}
                        </router-link>
                    </div>
                </div>
            </div>
            <img
                class="ms-auto"
                src="assets/images/Chelik.png"
                alt="Chelik s flagom"
            >
        </div>
        <!-- end naidi rabotu pzh -->

        <!-- statistica -->

        <div class="d-flex flex-column bg-blue pt-5 text-white align-items-end">
            <div class="d-flex flex-column">
                <div class="d-flex my-5 pe-5 me-4">
                    <div class="me-5 w-500">
                        <div class="font-size-14">
                            {{ $t("home.joblessness.stats") }}
                        </div>
                        <div class="font-size-42">
                            {{ $t('home.joblessness.title') }}
                        </div>
                        <div class="font-size-18">
                            {{ $t('home.joblessness.desc') }}
                        </div>
                    </div>
                    <div class="d-flex ms-5">
                        <div class="me-5">
                            <div class="font-size-64 fw-bold">
                                4.9%
                            </div>
                            <div v-html="$t('home.joblessness.level')" />
                        </div>
                        <div class="me-5">
                            <div class="font-size-64 fw-bold">
                                215
                            </div>
                            <div v-html="$t('home.joblessness.number')" />
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-end mt-5">
                    <div class="bg-darkblue p-5 w-350">
                        <div
                            class="fw-bold"
                            v-html="$t('home.joblessness.markets[0].title')"
                        />
                        <div class="mt-3">
                            {{ $t('home.joblessness.markets[0].desc') }}
                        </div>
                    </div>
                    <div class="grey-bg p-5 text-black w-350">
                        <div
                            class="fw-bold"
                            v-html="$t('home.joblessness.markets[1].title')"
                        />
                        <div class="mt-3">
                            {{ $t('home.joblessness.markets[1].desc') }}
                        </div>
                    </div>
                    <div class="bg-lightgrey p-5 text-black w-500">
                        <div
                            class="fw-bold"
                            v-html="$t('home.joblessness.markets[2].title')"
                        />
                        <div class="mt-3">
                            {{ $t('home.joblessness.markets[2].desc') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- end statistica -->
        <div class="padding py-5">
            <div class="div-center text-center text-black font-size-32 fw-bold pb-4">{{ $t('home.last_vacancies')}}</div>
            <!-- carousel 1 -->

            <Slider/>

            <!-- end carousel 1 -->

            <!-- about us -->
        </div>

        <div class="bg-lightgrey padding py-5">
            <div class="p-5">
                <h1>{{$t('home.about')}}</h1>
                <div class="d-flex justify-content-between">
                    <div class="w-400">
                        <h1 class="text-blue">
                            1
                        </h1>
                        <div>
                            {{ $t('home.about_us[0].content') }}
                        </div>
                    </div>
                    <div class="w-400">
                        <h1 class="text-blue">
                            2
                        </h1>
                        <div>
                            {{ $t('home.about_us[1].content') }}
                        </div>
                    </div>
                    <div class="w-400">
                        <h1 class="text-blue">
                            3
                        </h1>
                        <div>
                            {{ $t('home.about_us[2].content') }}
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-between mt-3">
                    <div class="w-400">
                        <h1 class="text-blue">
                            4
                        </h1>
                        <div>
                            {{ $t('home.about_us[3].content') }}
                        </div>
                    </div>
                    <div class="w-400">
                        <h1 class="text-blue">
                            5
                        </h1>
                        <div>
                            {{ $t('home.about_us[4].content') }}
                        </div>
                    </div>
                    <div class="w-400">
                        <h1 class="text-blue">
                            6
                        </h1>
                        <div>
                            {{ $t('home.about_us[5].content') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end about us -->
        <div class="padding py-5">
            <div class="div-center text-center text-black font-size-32 fw-bold pb-4">{{ $t('home.partners')}}</div>
            <CarouselPartners/>
        </div>
    </div>
</template>
<script>
import { defineComponent } from "vue";
import slider from "../components/Slider.vue";
import carouselPartners from "@/components/CarouselPartners.vue";

export default defineComponent({
    components: {
        Slider: slider,
        CarouselPartners: carouselPartners
    },
    data () {
        return {

        };
    }
});
</script>
<style scoped>
.grey-bg{
    background-color:#E0E0E0 !important;
}
.div-center{
    margin: auto;
    width: 50%;
}

.w-500{
    /* width 500px */
    width:31.25em;
}

.w-400{
    width:25em;
}

.w-350{
    /* width 350px; */
    width:21.875em;
}
.btn_work{
    position: relative;
}
.icon{
    position: absolute;
    width: 1.3em;
    top: 12px;
    left: 40px;
}
.btn-pd{
    padding: 10px 40px 10px 65px;
}
</style>
