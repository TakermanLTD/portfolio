import { createApp } from "vue";
import { createPinia } from "pinia";

import App from "./App.vue";
import router from "./router";

import "@/assets/css/style.css";
import "@/assets/css/fonts.css";
import "aos/dist/aos.css";

import "@/assets/vendor/bootstrap/js/bootstrap.bundle.min.js";
import "@/assets/vendor/glightbox/js/glightbox.min.js";
import "@/assets/vendor/isotope-layout/isotope.pkgd.min.js";
import "@/assets/vendor/swiper/swiper-bundle.min.js";
import "@/assets/vendor/waypoints/noframework.waypoints.js";
import "@/assets/vendor/php-email-form/validate.js";
import "@/assets/js/main.js";

const app = createApp(App);

app.use(createPinia());
app.use(router);

app.mount("#app");
