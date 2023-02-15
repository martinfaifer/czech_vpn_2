<template>
    <div>
        <v-img
            src="images/Global_network_generated.jpg"
            cover
            :aspect-ratio="aspectRatio"
            height="100vh"
            class="mt-0"
        >
            <v-toolbar
                style="
                    background: rgba(255, 255, 255, 0.1);
                    backdrop-filter: blur(4.5px);
                    -webkit-backdrop-filter: blur(4.5px);
                "
            >
                <v-toolbar-title
                    @click="redirectToHome()"
                    style="cursor: pointer"
                    ><span class="text-blue font-weight-bold">Czech</span
                    ><span class="text-red font-weight-bold"
                        >VPN</span
                    ></v-toolbar-title
                >
                <template v-slot:append>
                    <v-menu>
                        <template v-slot:activator="{ props }">
                            <v-btn
                                icon="mdi-account"
                                size="small"
                                v-bind="props"
                            ></v-btn>
                        </template>

                        <v-list density="compact">
                            <v-list-item prepend-icon="mdi-logout">
                                <v-list-item-title
                                    class="text-body-2"
                                    @click="logout()"
                                    style="cursor: pointer"
                                >
                                    Odhlásit se
                                </v-list-item-title>
                            </v-list-item>

                            <v-list-item prepend-icon="mdi-delete">
                                <v-list-item-title
                                    class="text-body-2 text-red"
                                    @click="deleteAccountAlertDialog = true"
                                    style="cursor: pointer"
                                >
                                    Smazat účet
                                </v-list-item-title>
                            </v-list-item>
                        </v-list>
                    </v-menu>
                </template>
            </v-toolbar>

            <v-container fluid class="mt-16">
                <v-row>
                    <v-col cols="12" sm="12" md="7" lg="7">
                        <v-card
                            class="overflow-hidden rounded-xl blur shadow-blur-big-card"
                            flat
                        >
                            <v-card-text>
                                <v-container>
                                    <p
                                        class="text-center text-subtitle-1 font-weight-medium"
                                    >
                                        Informace o Vás
                                        <!-- <v-btn
                                            size="x-small"
                                            flat
                                            icon
                                            color="transparent"
                                            class="float-right"
                                        >
                                            <v-icon color="green" small
                                                >mdi-pencil</v-icon
                                            >
                                        </v-btn> -->
                                    </p>
                                    <v-row class="my-3 d-flex flex-column">
                                        <p class="mt-6">
                                            Jméno:
                                            <span
                                                class="font-weight-bold mx-3"
                                                >{{ customerData.name }}</span
                                            >
                                        </p>
                                        <p class="mt-6">
                                            Kontaktní email:
                                            <span
                                                class="font-weight-bold mx-3"
                                                >{{ customerData.email }}</span
                                            >
                                        </p>

                                        <p class="mt-6">
                                            Vaše ID:
                                            <span
                                                class="font-weight-bold mx-3"
                                                >{{
                                                    customerData.variable_symbol
                                                }}</span
                                            >
                                        </p>

                                        <p class="mt-6">
                                            Změna hesla:
                                            <v-btn
                                                color="transparent"
                                                class="mx-3"
                                                variant="flat"
                                                size="small"
                                                icon="mdi-lock-reset"
                                                @click="
                                                    openChangePasswordDialog()
                                                "
                                            ></v-btn>
                                        </p>
                                    </v-row>
                                </v-container>
                            </v-card-text>
                        </v-card>
                    </v-col>
                    <v-col
                        cols="12"
                        sm="12"
                        md="5"
                        lg="5"
                        v-if="customerData.vpn"
                    >
                        <v-card
                            class="overflow-hidden rounded-xl blur shadow-blur-big-card"
                            flat
                        >
                            <v-card-text>
                                <v-container>
                                    <p
                                        class="text-center text-subtitle-1 font-weight-medium"
                                    >
                                        VPN přístupy

                                        <v-btn
                                            @click="openVpnDeleteDialog()"
                                            size="small"
                                            flat
                                            icon
                                            color="transparent"
                                            class="float-right mt-n2"
                                        >
                                            <v-icon color="red"
                                                >mdi-delete</v-icon
                                            >
                                        </v-btn>
                                    </p>
                                    <v-row
                                        v-if="customerData.vpn.length != 0"
                                        class="my-3 d-flex flex-column"
                                    >
                                        <p class="mt-6">
                                            Uživatelské jméno:
                                            <span
                                                class="font-weight-bold mx-3"
                                                >{{
                                                    customerData.vpn.username
                                                }}</span
                                            >
                                        </p>
                                        <p class="mt-6">
                                            Heslo:
                                            <span
                                                v-if="passwordIsHidden == false"
                                                class="font-weight-bold mx-3"
                                                >{{ customerData.vpn.password }}
                                                <v-icon
                                                    class="mx-3"
                                                    @click="
                                                        passwordIsHidden = true
                                                    "
                                                    >mdi-eye-off</v-icon
                                                >
                                            </span>
                                            <span
                                                v-else
                                                class="font-weight-bold mx-3"
                                            >
                                                *****
                                                <v-icon
                                                    class="mx-6"
                                                    @click="
                                                        passwordIsHidden = false
                                                    "
                                                    >mdi-eye</v-icon
                                                >
                                            </span>
                                        </p>
                                        <p class="mt-6">
                                            Rychlost:
                                            <span
                                                class="font-weight-bold mx-3"
                                                >{{
                                                    customerData.vpn.speed
                                                }}</span
                                            >
                                            <v-btn
                                                v-if="
                                                    customerData.isWaitingForProductChange ==
                                                    false
                                                "
                                                icon
                                                color="transparent"
                                                variant="flat"
                                                size="small"
                                                @click="
                                                    openChangeProductDialog()
                                                "
                                            >
                                                <v-icon color="green"
                                                    >mdi-pencil</v-icon
                                                >
                                            </v-btn>
                                            <span
                                                v-if="
                                                    customerData.isWaitingForProductChange ==
                                                    true
                                                "
                                                class="font-italic"
                                            >
                                                čeká se na připsání platby
                                            </span>
                                        </p>
                                    </v-row>
                                    <v-row v-else class="my-3">
                                        <v-alert
                                            type="info"
                                            rounded="lg"
                                            class="overflow-hidden info-shadow-blur"
                                        >
                                            <v-alert-title>
                                                Neexistuje VPN služba
                                                <v-spacer></v-spacer>
                                                <v-btn
                                                    color="white"
                                                    rounded="lg"
                                                    @click="
                                                        openCreateVpnDialog()
                                                    "
                                                >
                                                    Založit službu
                                                </v-btn>
                                            </v-alert-title>
                                        </v-alert>
                                    </v-row>
                                </v-container>
                            </v-card-text>
                        </v-card>
                    </v-col>
                    <v-col cols="12">
                        <v-card
                            class="overflow-hidden rounded-xl blur shadow-blur-big-card"
                            flat
                        >
                            <v-card-text>
                                <v-container>
                                    <p
                                        class="text-center text-subtitle-1 font-weight-medium"
                                    >
                                        Přehled plateb
                                        <span class="font-italic text-body-2"
                                            >Přesunout do menu pod
                                            mdi-account?</span
                                        >
                                    </p>
                                    <v-row class="my-3 d-flex flex-column">
                                        {{ customerData.payments }}
                                    </v-row>
                                </v-container>
                            </v-card-text>
                        </v-card>
                    </v-col>
                    <v-dialog
                        persistent
                        v-model="changePasswordDialog"
                        max-width="600"
                    >
                        <v-card class="rounded-lg">
                            <v-card-text>
                                <v-container fluid>
                                    <p
                                        class="text-center text-subtitle-1 font-weight-medium mt-n3"
                                    >
                                        Změna hesla
                                    </p>
                                    <v-row class="mt-6">
                                        <!-- new password -->
                                        <v-col cols="12">
                                            <v-text-field
                                                density="compact"
                                                variant="outlined"
                                                label="Nové heslo"
                                                required
                                                v-model="formData.new_password"
                                                :error-messages="
                                                    errors.new_password
                                                "
                                            ></v-text-field>
                                        </v-col>
                                    </v-row>
                                </v-container>
                            </v-card-text>
                            <v-card-actions>
                                <v-btn
                                    color="red"
                                    variant="outlined"
                                    class="rounded-lg"
                                    @click="closeDialog()"
                                    >Zavřít</v-btn
                                >
                                <v-spacer> </v-spacer>
                                <v-btn
                                    color="green"
                                    variant="outlined"
                                    class="rounded-lg"
                                    @click="changePassword()"
                                >
                                    Změnit
                                </v-btn>
                            </v-card-actions>
                        </v-card>
                    </v-dialog>

                    <v-dialog
                        persistent
                        v-model="productDialog"
                        max-width="600"
                    >
                        <v-card class="rounded-lg">
                            <v-card-text>
                                <v-container fluid>
                                    <p
                                        class="text-center text-subtitle-1 font-weight-medium mt-n3"
                                    >
                                        Změna služby
                                    </p>
                                    <v-row class="mt-6">
                                        <v-col cols="12">
                                            <v-autocomplete
                                                density="compact"
                                                variant="outlined"
                                                label="Vyberte službu"
                                                :items="formData.products"
                                                item-value="id"
                                                item-title="product_summary"
                                                required
                                                v-model="formData.product_id"
                                                :error-messages="
                                                    errors.product_id
                                                "
                                            >
                                            </v-autocomplete>
                                        </v-col>
                                        <v-col
                                            v-if="
                                                responseData.status == 'error'
                                            "
                                        >
                                            <v-alert
                                                v-if="
                                                    responseData.status ==
                                                    'error'
                                                "
                                                type="warning"
                                                title="Chyba"
                                                :text="responseData.message"
                                                rounded="lg"
                                                class="overflow-hidden warning-shadow-blur"
                                            >
                                            </v-alert>
                                        </v-col>
                                    </v-row>
                                </v-container>
                            </v-card-text>
                            <v-card-actions>
                                <v-btn
                                    color="red"
                                    variant="outlined"
                                    class="rounded-lg"
                                    @click="closeDialog()"
                                    >Zavřít</v-btn
                                >
                                <v-spacer> </v-spacer>
                                <v-btn
                                    v-if="!responseData.status"
                                    color="green"
                                    variant="outlined"
                                    class="rounded-lg"
                                    @click="changeProduct()"
                                >
                                    Změnit
                                </v-btn>
                            </v-card-actions>
                        </v-card>
                    </v-dialog>

                    <v-dialog
                        persistent
                        v-model="qrPaymentDialog"
                        max-width="600"
                    >
                        <v-card class="rounded-lg">
                            <v-card-text>
                                <v-container fluid>
                                    <p
                                        class="text-center text-subtitle-1 font-weight-medium mt-n3"
                                    >
                                        Zaplacení služby
                                    </p>
                                    <v-row class="mt-6">
                                        <!-- new password -->
                                        <v-col cols="12">
                                            <div
                                                class="d-flex justify-center"
                                                v-html="responseData.message"
                                            ></div>
                                            <p
                                                class="text-center text-body-1 my-3"
                                            >
                                                Pro provedení platby požijte
                                                svůj telefon
                                            </p>
                                        </v-col>
                                    </v-row>
                                </v-container>
                            </v-card-text>
                            <v-card-actions>
                                <v-btn
                                    block
                                    color="red"
                                    variant="outlined"
                                    class="rounded-lg"
                                    @click="closeDialog()"
                                    >Zavřít</v-btn
                                >
                            </v-card-actions>
                        </v-card>
                    </v-dialog>

                    <!-- create vpn product -->

                    <v-dialog persistent v-model="createVpnDialog">
                        <v-card class="rounded-lg">
                            <v-card-text>
                                <v-container fluid>
                                    <p
                                        class="text-center text-subtitle-1 font-weight-medium mt-n3"
                                    >
                                        Vyberte si službu
                                    </p>
                                    <v-row class="mt-6">
                                        <v-col
                                            cols="12"
                                            sm="12"
                                            :md="countProducts()"
                                            :lg="countProducts()"
                                            v-for="product in products"
                                            :key="product.id"
                                        >
                                            <v-card
                                                rounded="lg"
                                                class="hidden-offer-1 overflow-hidden rounded-xl blur shadow-blur"
                                                elevation-12
                                                color="white"
                                                height="500px"
                                            >
                                                <v-card-title>
                                                    <p
                                                        class="text-center text-h4 font-weight-medium mt-8"
                                                    >
                                                        {{
                                                            product.product_name
                                                        }}
                                                    </p>
                                                </v-card-title>
                                                <v-card-text>
                                                    <!-- content -->
                                                    <v-container
                                                        class=""
                                                        fill-height
                                                    >
                                                        <p
                                                            class="text-center text-h5 font-weight-medium my-12"
                                                        >
                                                            {{
                                                                product.product_description
                                                            }}
                                                        </p>
                                                        <p
                                                            class="text-h4 text-center font-weight-bold"
                                                        >
                                                            {{
                                                                product.product_speed
                                                            }}
                                                        </p>
                                                        <!-- cena -->
                                                        <p
                                                            class="text-center text-body-1 font-weight-medium my-8"
                                                        >
                                                            za
                                                            <span
                                                                class="text-green"
                                                                >{{
                                                                    product.product_cost
                                                                }}Kč</span
                                                            >
                                                            měsíčně
                                                        </p>
                                                        <v-btn
                                                            @click="
                                                                buyProduct(
                                                                    product.id
                                                                )
                                                            "
                                                            color="green"
                                                            rounded="lg"
                                                            style="
                                                                position: fixed;
                                                                bottom: 30px;
                                                                left: 10px;
                                                                right: 10px;
                                                                font-weight: bold;
                                                                font-size: 16px;
                                                            "
                                                        >
                                                            Koupit
                                                            <v-icon
                                                                class="mx-auto mt-1"
                                                                >mdi-arrow-right</v-icon
                                                            >
                                                        </v-btn>
                                                    </v-container>
                                                </v-card-text>
                                                <v-card-action> </v-card-action>
                                            </v-card>
                                        </v-col>
                                    </v-row>
                                </v-container>
                            </v-card-text>
                            <v-card-actions>
                                <v-btn
                                    block
                                    variant="flat"
                                    color="red"
                                    class="rounded-lg"
                                    @click="closeDialog()"
                                    >Zavřít</v-btn
                                >
                            </v-card-actions>
                        </v-card>
                    </v-dialog>

                    <v-dialog
                        persistent
                        v-model="deleteAccountAlertDialog"
                        max-width="600"
                    >
                        <v-card class="rounded-lg">
                            <v-card-text>
                                <v-container fluid>
                                    <p
                                        class="text-center text-h5 font-weight-medium mt-n3"
                                    >
                                        Přejete si odebrat účet??
                                    </p>
                                    <p
                                        class="text-center text-red text-body-1 font-weight-medium mt-6"
                                    >
                                        Tímto krokem přijdete o své přístupy do
                                        VPN
                                    </p>
                                </v-container>
                            </v-card-text>
                            <v-card-actions>
                                <v-btn
                                    color="red"
                                    variant="outlined"
                                    class="rounded-lg"
                                    @click="removeCustomer()"
                                    >Odebrat</v-btn
                                >
                                <v-spacer> </v-spacer>
                                <v-btn
                                    color="green"
                                    variant="outlined"
                                    class="rounded-lg"
                                    @click="closeDialog()"
                                >
                                    Ponechat
                                </v-btn>
                            </v-card-actions>
                        </v-card>
                    </v-dialog>

                    <v-dialog
                        persistent
                        v-model="vpnDeleteDialog"
                        max-width="600"
                    >
                        <v-card class="rounded-lg">
                            <v-card-text>
                                <v-container fluid>
                                    <p
                                        class="text-center text-red text-body-1 font-weight-medium mt-6"
                                    >
                                        Přejete si zrušit predplatné?
                                    </p>
                                </v-container>
                            </v-card-text>
                            <v-card-actions>
                                <v-btn
                                    color="red"
                                    variant="outlined"
                                    class="rounded-lg"
                                    @click="removeVpnAccount()"
                                    >Odebrat</v-btn
                                >
                                <v-spacer> </v-spacer>
                                <v-btn
                                    color="green"
                                    variant="outlined"
                                    class="rounded-lg"
                                    @click="closeDialog()"
                                >
                                    Ponechat
                                </v-btn>
                            </v-card-actions>
                        </v-card>
                    </v-dialog>
                </v-row>

                <!-- snackbar -->
                <v-snackbar
                    :color="responseData.color"
                    v-model="snackbar"
                    :timeout="timeout"
                >
                    {{ responseData.message }}
                </v-snackbar>
            </v-container>
        </v-img>
    </div>
</template>
<script>
import axios from "axios";
export default {
    data() {
        return {
            productChangeAlert: false,
            qrPaymentDialog: false,
            snackbar: false,
            timeout: 5000,
            customerData: [],
            customerNanguDetail: [],
            notificationData: [],
            snackColor: "",
            passwordIsHidden: true,
            changePasswordDialog: false,
            formData: [],
            errors: [],
            responseData: [],
            productDialog: false,
            createVpnDialog: false,
            products: [],
            deleteAccountAlertDialog: false,
            vpnDeleteDialog: false,
        };
    },
    components: {},

    created() {
        this.index();
    },
    methods: {
        async index() {
            await axios.get("customer").then((response) => {
                this.customerData = response.data.data;
            });
        },

        redirectToHome() {
            this.$router.push("/");
        },

        removeCustomer() {
            axios.delete("customer").then((response) => {
                this.closeDialog();
                this.redirectToHome();
            });
        },

        openVpnDeleteDialog() {
            this.vpnDeleteDialog = true;
        },

        removeVpnAccount() {
            axios.delete("customer/vpn").then((response) => {
                this.responseData = response.data;
                if (this.responseData.status == "success") {
                    this.responseData.color = "green";
                    this.closeDialog();
                } else {
                    this.responseData.color = "red";
                }
                this.snackbar = true;
                setTimeout(() => {
                    this.responseData = [];
                }, 5000);
            });
        },

        openChangeProductDialog() {
            axios.get("vpn/products").then((response) => {
                this.formData.products = response.data.data;
            });
            this.productDialog = true;
        },

        logout() {
            axios.post("logout").then((response) => {
                this.redirectToHome();
            });
        },

        openChangePasswordDialog() {
            this.changePasswordDialog = true;
        },

        closeDialog() {
            this.formData = [];
            this.errors = [];
            this.changePasswordDialog = false;
            this.productDialog = false;
            this.productChangeAlert = false;
            this.qrPaymentDialog = false;
            this.responseData = [];
            this.createVpnDialog = false;
            this.products = [];
            this.deleteAccountAlertDialog = false;
            this.vpnDeleteDialog = false;
            this.index();
        },

        openCreateVpnDialog() {
            axios.get("vpn/products").then((response) => {
                this.products = response.data.data;
                this.createVpnDialog = true;
            });
        },

        buyProduct(productId) {
            axios
                .post("customer/vpn", {
                    vpn_speed_products_id: productId,
                })
                .then((response) => {
                    this.responseData = response.data;

                    if (this.responseData.status == "success") {
                        this.responseData.color = "green";
                        this.closeDialog();
                    } else {
                        this.responseData.color = "red";
                    }
                    this.snackbar = true;
                    setTimeout(() => {
                        this.responseData = [];
                    }, 5000);
                });
        },

        changeProduct() {
            axios
                .post("customer/vpn/change/product", {
                    product_id: this.formData.product_id,
                })
                .then((response) => {
                    this.responseData = response.data;
                    if (this.responseData.status == "error") {
                        // již objednáno
                        this.productChangeAlert = true;
                    } else {
                        // zobrazit dialog s qr na platbu, kde se vykreslí img
                        // nesting
                        this.qrPaymentDialog = true;
                    }
                });
        },

        changePassword() {
            axios
                .post("customer/password/change", {
                    new_password: this.formData.new_password,
                })
                .then((response) => {
                    this.responseData = response.data;

                    if (this.responseData.status == "success") {
                        this.responseData.color = "green";
                        this.closeDialog();
                    } else {
                        this.responseData.color = "red";
                    }
                    this.snackbar = true;
                    setTimeout(() => {
                        this.responseData = [];
                    }, 5000);
                })
                .catch((error) => {
                    this.loading = false;
                    this.errors = error.response.data.errors;
                });
        },

        countProducts() {
            return 12 / this.products.length;
        },
    },

    computed: {},

    watch: {
        $route(to, from) {},
    },
    beforeDestroy: function () {},
};
</script>
