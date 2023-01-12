require("./bootstrap");
import "../sass/main.scss";
import { createApp } from "vue";
import "vuetify/styles";
import { createVuetify } from "vuetify";
import * as components from "vuetify/components";
import * as directives from "vuetify/directives";

const vuetify = createVuetify({
    components,
    directives,
    theme: {
        // defaultTheme: "dark"
    },
});

import { createRouter, createWebHashHistory } from "vue-router";

import App from "./App.vue";

import Layout from "./components/Main/Layout.vue";

const router = createRouter({
    history: createWebHashHistory(),
    routes: [
        {
            path: "/",
            name: "Layout",
            component: Layout,
        },
    ],
});

const app = createApp(App);

app.use(vuetify).use(router);

router.isReady().then(() => {
    app.mount("#app");
});
