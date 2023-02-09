<template>
    <v-main
        style="
            background-image: url('images/Global_network_generated.jpg');
            background-repeat: no-repeat;
            background-position: center center;
            background-size: cover;
            height: 100vh;
        "
    >
        <v-container class="d-flex fill-height justify-start align-center">
            <v-row class="d-flex align-center justify-center">
                <v-col cols="12" sm="12" md="6" lg="7">
                    <v-form @submit.prevent="LoginCustomer()">
                        <v-card
                            style="
                                background: rgba(239, 247, 254, 0.75);
                                box-shadow: 0 8px 32px 0
                                    rgba(239, 247, 254, 0.37);
                                backdrop-filter: blur(4.5px);
                                -webkit-backdrop-filter: blur(4.5px);
                                border-radius: 10px;
                                border: 1px solid rgba(255, 255, 255, 0.18);
                            "
                        >
                            <v-card-text class="mt-6">
                                <v-col cols="12" sm="12" md="12">
                                    <v-text-field
                                        prepend-inner-icon="mdi-account"
                                        autofocus
                                        density="compact"
                                        variant="outlined"
                                        label="Email"
                                        required
                                        v-model="formData.email"
                                        :error-messages="errors.email"
                                    ></v-text-field>
                                </v-col>
                                <v-col cols="12" sm="12" md="12">
                                    <v-text-field
                                        type="password"
                                        prepend-inner-icon="mdi-lock"
                                        density="compact"
                                        variant="outlined"
                                        label="Heslo"
                                        required
                                        v-model="formData.password"
                                        :error-messages="errors.password"
                                    ></v-text-field>
                                </v-col>

                                <v-col cols="12" sm="12" md="12">
                                    <v-btn
                                        :loading="loading"
                                        variant="flat"
                                        color="green"
                                        block
                                        type="submit"
                                        class="rounded-md font-size-bold text-h6 my-2 text-white"
                                        ><strong>Přihlásit se</strong>
                                    </v-btn>
                                </v-col>

                                <v-col cols="12" sm="12" md="12">
                                    <a
                                        :href="'/#/registration'"
                                        class="text-caption"
                                        >Nemáte účet? Vytvořte se jej!</a
                                    >
                                </v-col>
                            </v-card-text>
                        </v-card>
                    </v-form>
                </v-col>
            </v-row>
            <div class="text-center">
                <v-snackbar
                    v-model="currSnackBar"
                    :timeout="timeout"
                    color="red"
                >
                    {{ serverResponse.message }}
                </v-snackbar>
            </div>
        </v-container>
    </v-main>
</template>

<script>
import axios from "axios";
export default {
    data() {
        return {
            loading: false,
            currSnackBar: false,
            serverResponse: [],
            timeout: 5000,
            errors: [],
            formData: [],
            customerData: [],
        };
    },

    components: {},
    created() {
        this.index();
    },
    methods: {
        async index() {
            await axios.get("customer").then((response) => {
                this.customerData = response.data;

                if (this.customerData != "") {
                    this.$router.push({ name: "customerZone" });
                }
            });
        },
        LoginCustomer() {
            this.loading = true;
            axios
                .post("login", {
                    email: this.formData.email,
                    password: this.formData.password,
                })
                .then((response) => {
                    this.loading = false;
                    this.serverResponse = response.data;
                    if (response.data.status == "error") {
                        this.currSnackBar = true;
                        this.serverResponse = response.data;
                        setTimeout(() => {
                            this.resetVars();
                        }, 6000);
                    } else {
                        this.serverResponse = response.data;
                        this.$router.push({ name: "customerZone" });
                    }
                })
                .catch((error) => {
                    this.loading = false;
                    this.errors = error.response.data.errors;
                });
        },

        resetVars() {
            this.serverResponse = [];
            this.nanguIsps = [];
            this.currSnackBar = false;
        },
    },
    watch: {},
};
</script>
