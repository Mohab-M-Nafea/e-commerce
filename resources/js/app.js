import "./bootstrap";

import { createApp } from "vue";
import { createPinia } from "pinia";
import ClickAway from "@/assets/clickAway.js";
import App from "@/App.vue";
import router from "@/router/index.js";

let app = createApp(App);

app.directive("click-away", ClickAway);

app.use(router);

app.use(createPinia());

app.mount("#app");
