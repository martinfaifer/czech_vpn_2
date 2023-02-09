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
import CustomerLogin from "./components/Login/CustomerLogin.vue";
import Registration from "./components/Registration/Registration.vue";
import CustomerZone from "./components/Zones/CustomerZone.vue";

const router = createRouter({
    history: createWebHashHistory(),
    routes: [
        {
            path: "/",
            name: "Layout",
            component: Layout,
        },
        {
            path: "/login",
            name: "customerLogin",
            component: CustomerLogin,
        },
        {
            path: "/registration",
            name: "registration",
            component: Registration,
        },
        {
            path: "/customer",
            name: "customerZone",
            component: CustomerZone,
        },
    ],
});

const app = createApp(App);

app.use(vuetify).use(router);

router.isReady().then(() => {
    app.mount("#app");
});
