<template>
    <!-- Footer -->
    <footer class="footer bg-darkblack text-center text-white">
        <div class="footer-top d-flex align-items-center justify-content-between top-container-height padding border-bottom border-dark">
            <router-link
                class="footer-logo navbar-brand"
                :to="'/'"
            >
                <img
                    src="assets/images/logo_dark.png"
                >
            </router-link>
            <form class="footer-form d-flex flex-column">
                <span
                    class="footer-input-title align-self-end text-decoration-none link-light"
                >
                    {{ $t('main_view.apply_text') }}
                </span>
                <div class="footer-input form_input mt-3">
                    <input
                        class="rounded-extra px-3 small w-100 h-100"
                        type="text"
                        :placeholder="$t('main_view.mail')"
                    >
                    <button class="btn btn-primary rounded-extra">
                        {{ $t('main_view.follow') }}
                    </button>
                </div>
            </form>
        </div>
        <div class="center-container-height padding">
            <div class="footer-bottom d-flex mt-5">
                <div class="footer-btn">
                    <router-link class="btn btn-primary" :to="'/new_cv'">
                        {{ $t('main_view.apply') }}
                    </router-link>
                </div>
                <div class="footer-links m-auto">
                    <router-link
                        v-for="(link,index) in links"
                        :key="index"
                        class="footer-link fw-normal text-decoration-none link-light me-5"
                        :to="link.link"
                    >
                        {{ $t(link.name) }}
                    </router-link>
                </div>
            </div>
        </div>
        <div
            class="footer-rights-icons text-center padding bg-black bottom-container-height d-flex align-items-center justify-content-between"
        >
            <div class="footer-rights">
                {{ $t('main_view.rights') }}
            </div>
            <div class="d-flex">
                <a
                    v-for="(icon,index) in icons"
                    :key="index"
                    :href="icon.link"
                    class="d-flex text-black bg-darkblack align-items-center justify-content-center me-3 transition icon_wrapper"
                    target="_blank"
                >
                    <img
                        :src="icon.src"
                        class="icon"
                    >
                </a>
            </div>
        </div>
        <!-- Copyright -->
    </footer>
    <!-- Footer -->
</template>

<script>
import { defineComponent } from "vue";

const links = [
    {
        name: "main_view.home",
        link: "/"
    },
    {
        name: "main_view.jobs",
        link: "new_cv"
    },
    {
        name: "main_view.people",
        link: "new_employer"
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

const icons = [
    {
        link: "",
        src: "assets/images/facebook.png"
    },
    {
        link: "",
        src: "assets/images/instagram.png"
    }
];
export default defineComponent({
    setup () {
        return {
            links,
            icons
        };
    }
});
</script>

<style scoped>
.top-container-height{
    /* 150px / 16 */
    height: 9.375em;
}

.center-container-height{
    /* 300px / 16 */
    height: 18.75em;
}
.bottom-container-height{
    /* 100px / 16 */
    height: 6.25em;
}

.form_input{
    position: relative;
    /* 472px / 16 */
    width:29.5em;
    /* 50px / 16 */
    height:3.125em;
}

.form_input>button{
    position: absolute;
    right:7px;
    top:6px;
}

.icon_wrapper{
    width: 2.5em;
    height:2.5em;
    border-radius: 50%;
    cursor: pointer;
}
.icon{
    font-size:1.4em;
}
.icon_wrapper:hover{
    transform:rotate(180deg);
    background-color:#9E2629 !important
}
.icon_wrapper:hover > .icon{
    transform:rotate(180deg);
    font-size: 1.6em;
    color:white;
}

</style>
