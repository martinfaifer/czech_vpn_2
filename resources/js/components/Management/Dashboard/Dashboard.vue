<template>
    <v-main style="height: 100vh; background-color: #f8f9fa">
        <!-- navigation -->
        <v-app-bar
            fixed
            density="comfortable"
            style="cursor: pointer"
            flat
            color="transparent"
        >
            <v-app-bar-title @click="goToHome()">
                <span class="text-blue font-weight-bold">Czech</span
                ><span class="text-red font-weight-bold">VPN</span>
                <span class="text-body-2"> admin zóna</span>
            </v-app-bar-title>
            <template v-slot:append>
                <v-menu>
                    <template v-slot:activator="{ props }">
                        <v-btn
                            icon="mdi-account"
                            size="small"
                            v-bind="props"
                            style="background-color: #eceff1"
                        ></v-btn>
                    </template>

                    <v-list density="compact">
                        <v-list-item prepend-icon="mdi-currency-usd">
                            <v-list-item-title
                                class="text-body-2"
                                style="cursor: pointer"
                            >
                                Vaše faktury
                            </v-list-item-title>
                        </v-list-item>

                        <v-list-item prepend-icon="mdi-account">
                            <v-list-item-title
                                class="text-body-2"
                                style="cursor: pointer"
                            >
                                Uživatelský profil
                            </v-list-item-title>
                        </v-list-item>

                        <v-list-item prepend-icon="mdi-logout">
                            <v-list-item-title
                                class="text-body-2 text-red-darken-1"
                                style="cursor: pointer"
                            >
                                Odhlásit se
                            </v-list-item-title>
                        </v-list-item>
                    </v-list>
                </v-menu>
            </template>
        </v-app-bar>
        <v-container fluid class="mt-n12">
            <v-row>
                <!-- this will be cards with informations about users belongTo this isp -->
                <v-col cols="12" sm="12" md="2" lg="2">
                    <DashboardInformationCard
                        :numberOfItems="dashboardCardsItems.total"
                        text="zákazníků"
                    ></DashboardInformationCard>
                </v-col>
                <v-col cols="12" sm="12" md="2" lg="2">
                    <DashboardInformationCard
                        :numberOfItems="dashboardCardsItems.active"
                        text="aktivních"
                    ></DashboardInformationCard>
                </v-col>
                <v-col cols="12" sm="12" md="2" lg="2">
                    <DashboardInformationCard
                        :numberOfItems="dashboardCardsItems.paused"
                        text="pozastavených"
                    ></DashboardInformationCard>
                </v-col>
                <v-col cols="12" sm="12" md="2" lg="2">
                    <DashboardInformationCard
                        :numberOfItems="dashboardCardsItems.product_zaklad"
                        text="služba základ"
                    ></DashboardInformationCard>
                </v-col>
                <v-col cols="12" sm="12" md="2" lg="2">
                    <DashboardInformationCard
                        :numberOfItems="dashboardCardsItems.product_standard"
                        text="služba standard"
                    ></DashboardInformationCard>
                </v-col>
                <v-col cols="12" sm="12" md="2" lg="2">
                    <DashboardInformationCard
                        :numberOfItems="dashboardCardsItems.product_max"
                        text="služba max"
                    ></DashboardInformationCard>
                </v-col>
            </v-row>

            <v-row>
                <!-- this will be card with table, which contains customers -->
                <v-col cols="12" sm="12" md="12" lg="12">
                    <v-card
                        class="overflow-hidden rounded-xl blur shadow-blur-big-card"
                    >
                        <v-card-text>
                            <p class="text-h5 ml-3 mb-3">Vaši zákazníci</p>
                            <v-table fixed-header height="300px">
                                <thead>
                                    <tr>
                                        <th class="text-left">E-mail</th>
                                        <th class="text-left">Produkt</th>
                                        <th class="text-left">Aktivní</th>
                                        <!-- <th class="text-left"> </th> -->
                                        <th class="text-left">
                                            Uživatelská role
                                        </th>
                                        <th class="text-left">Akce</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="item in users" :key="item.email">
                                        <td>{{ item.email }}</td>
                                        <td>
                                            <span
                                                v-if="item.vpn_product != null"
                                            >
                                                {{
                                                    item.vpn_product
                                                        .product_speed
                                                }}
                                            </span>
                                            <span v-else>
                                                <!--  -->
                                            </span>
                                        </td>
                                        <td>
                                            <span
                                                v-if="item.paused_vpn == null"
                                            >
                                                <v-icon color="green"
                                                    >mdi-check</v-icon
                                                >
                                            </span>
                                            <span v-else>
                                                <v-icon color="orange">
                                                    mdi-pause
                                                </v-icon>
                                            </span>
                                            <span
                                                v-if="
                                                    item.waiting_on_delete !=
                                                    null
                                                "
                                            >
                                                Čeká na smazání
                                            </span>
                                            <span
                                                v-else-if="
                                                    item.waiting_for_pause !=
                                                    null
                                                "
                                            >
                                                Čeká na změnu služby
                                            </span>
                                        </td>
                                        <td>
                                            {{
                                                convertUserType(
                                                    item.user_type.type
                                                )
                                            }}
                                        </td>
                                        <td>
                                            <v-btn flat icon size="small">
                                                <v-icon color="info"
                                                    >mdi-vpn</v-icon
                                                >
                                            </v-btn>
                                            <v-btn
                                                v-if="
                                                    item.waiting_on_delete ==
                                                    null
                                                "
                                                flat
                                                icon
                                                size="small"
                                                @click="deleteUser(item.id)"
                                            >
                                                <v-icon color="red"
                                                    >mdi-delete</v-icon
                                                >
                                            </v-btn>
                                        </td>
                                    </tr>
                                </tbody>
                            </v-table>
                        </v-card-text>
                    </v-card>
                </v-col>
            </v-row>
        </v-container>

        <div class="text-center">
            <v-dialog v-model="userEditDialog" max-width="600" persistent>
                <v-card rounded="lg">
                    <v-card-title> Úprava uživatele </v-card-title>
                    <v-card-text>
                        <v-container fluid>
                            <v-row>
                                <v-col cols="12" sm="12" md="6" lg="6">
                                    <v-text-field
                                        prepend-inner-icon="mdi-account"
                                        variant="outlined"
                                        label="Jméno"
                                        v-model="formData.name"
                                        :error-messages="errors.name"
                                        readonly
                                        disabled
                                    ></v-text-field>
                                </v-col>
                            </v-row>
                        </v-container>
                        <!-- {{ formData }} -->
                    </v-card-text>
                    <v-card-actions>
                        <v-btn
                            color="primary"
                            block
                            @click="userEditDialog = false"
                            >Close Dialog</v-btn
                        >
                    </v-card-actions>
                </v-card>
            </v-dialog>

            <!-- warning dialog -->
            <v-dialog v-model="warningDialog" max-width="600" persistent>
                <v-card rounded="lg">
                    <v-card-text>
                        <p class="text-center text-h5">
                            Opravdu si přijete odebrat uživatele?
                        </p>
                    </v-card-text>
                    <v-card-actions>
                        <v-btn
                            color="red"
                            variant="outlined"
                            @click="closeDialog()"
                            >Zavřít</v-btn
                        >
                        <v-spacer></v-spacer>
                        <v-btn
                            variant="flat"
                            color="green"
                            @click="removeUser()"
                            >Odebrat</v-btn
                        >
                    </v-card-actions>
                </v-card>
            </v-dialog>
        </div>
        <v-snackbar
            v-model="snackbar"
            :timeout="timeout"
            :color="serverResponse.status"
        >
            {{ serverResponse.message }}
        </v-snackbar>
    </v-main>
</template>
<script>
import axios from "axios";
import DashboardInformationCard from "./DashboardInformationCard.vue";
export default {
    data() {
        return {
            dashboardCardsItems: [],
            users: [],
            userEditDialog: false,
            warningDialog: false,
            formData: [],
            errors: [],
            serverResponse: [],
            snackbar: false,
            timeout: 5000,
        };
    },

    components: {
        DashboardInformationCard,
    },
    created() {
        this.index();
    },
    methods: {
        index() {
            axios
                .get("management/dashboard/customers-count")
                .then((response) => {
                    this.dashboardCardsItems = response.data;
                })
                .catch((error) => {
                    if (error.response.status == 403) {
                        this.$router.push("/");
                    }
                });

            axios.get("management/dashboard/customers").then((response) => {
                this.users = response.data;
            });
        },

        goToHome() {
            this.$router.push("/");
        },

        convertUserType(userType) {
            if (userType == "admin") {
                return "admin";
            }

            if (userType == "generate_by_api") {
                return "zákazník vytvořen API";
            }

            if (userType == "customer") {
                return "zákazník";
            }
        },

        deleteUser(userId) {
            this.formData = userId;
            this.warningDialog = true;
        },

        removeUser() {
            axios
                .delete("management/dashboard/customer/" + this.formData)
                .then((response) => {
                    this.serverResponse = response.data;
                    this.closeDialog();
                    this.manipulateWithSnackBar();
                })
                .catch((error) => {
                    this.loading = false;
                    this.errors = error.response.data.errors;
                });
        },

        openUserEditDialog(user) {
            this.formData = user;
            this.userEditDialog = true;
        },

        closeDialog() {
            // this.userEditDialog = false;
            this.warningDialog = false;
            this.formData = [];
            this.errors = [];
        },

        manipulateWithSnackBar() {
            this.snackbar = true;

            setTimeout(() => {
                this.snackbar = false;
                this.serverResponse = [];
            }, 5500);
        },
    },
    watch: {},
};
</script>
