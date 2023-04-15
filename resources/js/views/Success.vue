<template>
    <navbar-view/>
    <div class="text-start">
        <div class="padding success">
            <div class="text-start font-size-42 mb-3">
                {{ $t('success.title') }}
            </div>
            <div class="success-desc text-start font-size-24 lh-normal" v-html="$t('success.desc')"></div>
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
.lh-normal{
    line-height: normal;
}
.success{
    margin-top: 8em;
    margin-bottom: 20em;
}
</style>
