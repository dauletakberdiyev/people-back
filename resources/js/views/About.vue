<template>
    <navbar-view/>
    <div class="text-start">
        <div class="about-title py-5 bg-grey-light padding text-darkgrey">
            <h1>
                {{ $t('about.title') }}
            </h1>
        </div> 
        <div class="about-us padding py-5">
            <div class="about-us-inner p-5">
                <div class="about-us-cards d-flex justify-content-between">
                    <div class="about-us-card w-400">
                        <h1 class="about-us-card-number text-blue">
                            1
                        </h1>
                        <div class="about-us-card-desc">
                            {{ $t('home.about_us[0].content') }}
                        </div>
                    </div>
                    <div class="about-us-card w-400">
                        <h1 class="about-us-card-number text-blue">
                            2
                        </h1>
                        <div class="about-us-card-desc">
                            {{ $t('home.about_us[1].content') }}
                        </div>
                    </div>
                    <div class="about-us-card w-400">
                        <h1 class="about-us-card-number text-blue">
                            3
                        </h1>
                        <div class="about-us-card-desc">
                            {{ $t('home.about_us[2].content') }}
                        </div>
                    </div>
                </div>
                <div class="about-us-cards d-flex justify-content-between mt-3">
                    <div class="about-us-card w-400">
                        <h1 class="about-us-card-number text-blue">
                            4
                        </h1>
                        <div class="about-us-card-desc">
                            {{ $t('home.about_us[3].content') }}
                        </div>
                    </div>
                    <div class="about-us-card w-400">
                        <h1 class="about-us-card-number text-blue">
                            5
                        </h1>
                        <div class="about-us-card-desc">
                            {{ $t('home.about_us[4].content') }}
                        </div>
                    </div>
                    <div class="about-us-card w-400">
                        <h1 class="about-us-card-number text-blue">
                            6
                        </h1>
                        <div class="about-us-card-desc">
                            {{ $t('home.about_us[5].content') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer-view/>
</template>
<script>
import Navbar from "@/components/Navbar.vue";
import Footer from "@/components/Footer.vue";
export default {
    components: {
        "navbar-view": Navbar,
        "footer-view": Footer
    }
}
</script>
<style scoped>
.w-400{
    width:25em;
}
</style>
