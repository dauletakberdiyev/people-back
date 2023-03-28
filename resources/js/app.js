import {createApp} from "vue";
import App from "@/App.vue";
import i18n from "./locale";
import router from "./router/index";
import axios from "axios";
import VueCarousel from "vue-carousel";

i18n.global.locale = "ru";

const app = createApp(App);
app.config.globalProperties.$http = axios;
app.use(router);
app.use(i18n);
app.use(VueCarousel);
app.mount('#app');
