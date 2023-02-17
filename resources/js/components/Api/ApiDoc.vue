<template>
    <div>
        <v-navigation-drawer fixed app permanent location="left">
            <v-list nav v-model:opened="open">
                <v-list-item :to="'home'" prepend-icon="mdi-home" title="Úvod"></v-list-item>

                <v-list-item
                    :to="'customers'"
                    prepend-icon="mdi-account"
                    title="Zákazníci"
                ></v-list-item>
                <v-list-item
                    :to="'vpn'"
                    prepend-icon="mdi-vpn"
                    title="VPN"
                ></v-list-item>
            </v-list>
        </v-navigation-drawer>
        <v-container fluid>
            <ApiHome v-if="$route.params.topic == 'home'"></ApiHome>
            <!-- {{ $route.params.topic }} -->
        </v-container>
    </div>
</template>
<script>

import ApiHome from "./ApiHome.vue"

export default {
    components: { ApiHome },
    data: () => ({}),
};
</script>
