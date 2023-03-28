<template>
    <navbar-view/>
    <router-view/>
    <footer-view/>
</template>

<script>
import Navbar from "@/components/Navbar.vue";
import Footer from "@/components/Footer.vue";
export default {
    name: "Welcome",
    components: {
        "navbar-view": Navbar,
        "footer-view": Footer
    },
    created () {
        this.set_theme();
    },
    methods: {
        set_theme () {
            const id = "theme";
            const theme = "default";
            if (theme) {
                if (document.getElementById(id)) {
                    document.getElementById(id).remove();
                }
                const head = document.getElementsByTagName("head")[0];
                const link = document.createElement("link");
                link.id = id;
                link.rel = "stylesheet";
                link.type = "text/css";
                link.href = "/styles/themes/" + theme + ".css";
                link.media = "all";
                head.appendChild(link);
                localStorage.setItem("theme", theme);
            }
        }
    }
};
</script>

<style lang="scss">
#app {
    font-family: Avenir, Helvetica, Arial, sans-serif;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    text-align: center;
    color: #2c3e50;
}

// some change
.bg-grey-light{
    background-color: #F2F2F2;
}
nav {
    padding: 30px;

    a {
        font-weight: bold;
        color: #2c3e50;

        &.router-link-exact-active {
            color: #42b983;
        }
    }
}
</style>
}
