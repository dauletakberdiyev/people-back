<template>
    <nav class="navbar navbar-expand-lg navbar-light bg-light padding position-sticky top-0 py-3" style="z-index: 2">
        <div class="d-flex flex-fill justify-content-between center-nav container-fluid">
            <router-link
                class="navbar-brand"
                :to="'/'"
            >
                <img
                    src="assets/images/logo_blue.png"
                >
            </router-link>
            <button
                class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarScroll"
                aria-controls="navbarScroll"
                aria-expanded="false"
                aria-label="Toggle navigation"
            >
                <span class="navbar-toggler-icon" />
            </button>
            <div
                id="navbarScroll"
                class="collapse navbar-collapse"
            >
                <div class="ms-auto" />
                <router-link
                    v-for="(link,index) in links"
                    :key="index"
                    class="fw-normal text-decoration-none me-4 nav-link header-link"
                    :to="link.link"
                >
                    {{ $t(link.name) }}
                </router-link>
                <div class="ms-4 nav-item header-btn">
                    <router-link class="nav-link btn btn-primary  rounded-extra px-5 py-2" :to="'/new_cv'">
                        {{ $t('main_view.apply') }}
                    </router-link>
                </div>
            </div>
        </div>
    </nav>
</template>
<script>
import { defineComponent } from "vue";
const links = [
    {
        name: "main_view.home",
        link: "/"
    },
    {
        name: "main_view.vacancies",
        link: "vacancies"
    },
    {
        name: "main_view.about",
        link: "about"
    }
];
export default defineComponent({
    setup () {
        return {
            links
        };
    }
});
</script>

<style scoped>
.center-nav{
    max-width: 1300px;
    margin: auto;
}
</style>
