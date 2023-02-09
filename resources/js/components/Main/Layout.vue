<template>
    <div>
        <v-app-bar
            density="comfortable"
            style="
                background: rgba(255, 255, 255, 0.1);
                backdrop-filter: blur(4.5px);
                -webkit-backdrop-filter: blur(4.5px);
            "
            flat
        >
            <v-app-bar-title>
                <span class="text-blue font-weight-bold">Czech</span
                ><span class="text-red font-weight-bold">VPN</span>
            </v-app-bar-title>
            <template v-slot:append>
                <v-btn
                    variant="flat"
                    rounded="md"
                    color="#1661BD"
                    class="text-white font-weight-black"
                    @click="logInAsCustomer()"
                >
                    Zákazník</v-btn
                >
            </template>
        </v-app-bar>
        <v-img
            src="images/Global_network_generated.jpg"
            cover
            :aspect-ratio="aspectRatio"
            max-height="600"
            class="mt-n16"
        >
            <v-container fluid class="mt-16">
                <v-col cols="12" sm="12" md="4" lg="4">
                    <p class="text-h3 font-weight-bold text-white text-start">
                        Czech<span class="text-red">VPN</span>
                    </p>

                    <p class="text-h5 text-white text-start my-6">
                        Lorem ipsum dolor sit amet, consectetuer adipiscing
                        elit. Nam quis nulla. Phasellus enim erat, vestibulum
                        vel, aliquam a, posuere eu, velit. Pellentesque ipsum.
                    </p>
                </v-col>
            </v-container>
            <!-- <v-btn
                style="postion: fixed; left: 35%; bottom: 20px"
                rounded="xl"
                color="green"
                class="text-white font-size-bold animate pulse-btn"
            >
                Pořídit službu
                <v-icon class="mx-auto"> mdi-arrow-right </v-icon>
            </v-btn> -->
        </v-img>
        <!-- some text section -->

        <v-card flat color="white" class="rounded-t-xl mt-n8">
            <v-container fluid>
                <!-- where is -->
                <v-col cols="12" sm="12" md="12" lg="12" class="mt-16">
                    <v-card class="" flat>
                        <v-card-text>
                            <v-container>
                                <v-row>
                                    <v-col cols="12" sm="12" md="6" lg="6">
                                        <v-img
                                            src="images/earth_2.jpg"
                                            class="rounded-xl"
                                        ></v-img>
                                    </v-col>
                                    <v-col
                                        cols="12"
                                        sm="12"
                                        md="6"
                                        lg="6"
                                        class="flex-column-reverse"
                                    >
                                        <p
                                            class="text-center text-h3 font-weight-medium"
                                        >
                                            Dostupnost
                                        </p>
                                        <p
                                            class="text-center text-subtitle-1 my-8"
                                        >
                                            Lorem ipsum dolor sit amet,
                                            consectetuer adipiscing elit. Nam
                                            quis nulla. Phasellus enim erat,
                                            vestibulum vel, aliquam a, posuere
                                            eu, velit. Pellentesque ipsum.
                                            Integer imperdiet lectus quis justo.
                                            Aenean vel massa quis mauris
                                            vehicula lacinia. Duis sapien nunc,
                                            commodo et, interdum suscipit,
                                            sollicitudin et, dolor. Mauris
                                            metus. Fusce suscipit libero eget
                                            elit. Nullam rhoncus aliquam metus.
                                        </p>
                                        <!-- <div class="d-flex justify-center">
                                            <v-btn
                                                color="green"
                                                class="mt-8 rounded-xl"
                                                height="50px"
                                            >
                                                <p
                                                    class="text-center text-white mx-2"
                                                    style="
                                                        font-weight: bold;
                                                        font-size: 16px;
                                                    "
                                                >
                                                    Získat CzechVPN
                                                    <v-icon class="ml-2">
                                                        mdi-arrow-right
                                                    </v-icon>
                                                </p>
                                            </v-btn>
                                        </div> -->
                                    </v-col>
                                </v-row>
                            </v-container>
                        </v-card-text>
                    </v-card>
                </v-col>
                <!-- security -->
                <v-col cols="12" sm="12" md="12" lg="12">
                    <v-card class="" flat style="margin-top: 150px">
                        <v-card-text>
                            <v-container>
                                <v-row>
                                    <v-col
                                        cols="12"
                                        sm="12"
                                        md="6"
                                        lg="6"
                                        class="flex-column-reverse"
                                    >
                                        <p
                                            class="text-center text-h3 font-weight-medium"
                                        >
                                            Bezpečnost
                                        </p>
                                        <p
                                            class="text-center text-subtitle-1 my-8"
                                        >
                                            Lorem ipsum dolor sit amet,
                                            consectetuer adipiscing elit. Nam
                                            quis nulla. Phasellus enim erat,
                                            vestibulum vel, aliquam a, posuere
                                            eu, velit. Pellentesque ipsum.
                                            Integer imperdiet lectus quis justo.
                                            Aenean vel massa quis mauris
                                            vehicula lacinia. Duis sapien nunc,
                                            commodo et, interdum suscipit,
                                            sollicitudin et, dolor. Mauris
                                            metus. Fusce suscipit libero eget
                                            elit. Nullam rhoncus aliquam metus.
                                        </p>
                                    </v-col>
                                    <v-col cols="12" sm="12" md="6" lg="6">
                                        <v-img
                                            src="images/vpn.webp"
                                            class="rounded-xl"
                                        ></v-img>
                                    </v-col>
                                </v-row>
                            </v-container>
                        </v-card-text>
                    </v-card>
                </v-col>
                <!-- what is -->
                <v-col cols="12" sm="12" md="12" lg="12" class="mt-16">
                    <v-card class="" flat style="margin-top: 150px">
                        <v-card-text>
                            <v-container>
                                <v-row>
                                    <v-col cols="12" sm="12" md="6" lg="6">
                                        <v-img
                                            src="images/wp7136151-magnifying-glass-wallpapers.jpg"
                                            class="rounded-xl"
                                        ></v-img>
                                    </v-col>
                                    <v-col
                                        cols="12"
                                        sm="12"
                                        md="6"
                                        lg="6"
                                        class="flex-column-reverse"
                                    >
                                        <p
                                            class="text-center text-h3 font-weight-medium"
                                        >
                                            Co je VPN
                                        </p>
                                        <p
                                            class="text-center text-subtitle-1 my-8"
                                        >
                                            Lorem ipsum dolor sit amet,
                                            consectetuer adipiscing elit. Nam
                                            quis nulla. Phasellus enim erat,
                                            vestibulum vel, aliquam a, posuere
                                            eu, velit. Pellentesque ipsum.
                                            Integer imperdiet lectus quis justo.
                                            Aenean vel massa quis mauris
                                            vehicula lacinia. Duis sapien nunc,
                                            commodo et, interdum suscipit,
                                            sollicitudin et, dolor. Mauris
                                            metus. Fusce suscipit libero eget
                                            elit. Nullam rhoncus aliquam metus.
                                        </p>
                                    </v-col>
                                </v-row>
                            </v-container>
                        </v-card-text>
                    </v-card>
                </v-col>
                <!-- prices -->
                <v-col cols="12" sm="12" md="12" lg="12" class="mt-16">
                    <v-card
                        class="overflow-hidden rounded-xl blur shadow-blur-big-card"
                        flat
                        style="margin-top: 150px"
                    >
                        <v-card-text>
                            <v-container>
                                <p
                                    class="text-center text-h3 font-weight-medium"
                                >
                                    Ceník
                                </p>
                                <v-row class="my-8">
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
                                                    {{ product.product_name }}
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
                                                        <span class="text-green"
                                                            >{{
                                                                product.product_cost
                                                            }}Kč</span
                                                        >
                                                        měsíčně
                                                    </p>
                                                    <v-btn
                                                        @click="
                                                            openBuyProduktInfoDialog(
                                                                product.id,
                                                                product
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
                                <!-- buyinfo dialog -->

                                <v-row>
                                    <v-dialog
                                        persistent
                                        v-model="buyProductInfoDialog"
                                    >
                                        <v-card class="rounded-lg">
                                            <v-card-text>
                                                <v-container fluid>
                                                    <p
                                                        class="text-center font-weight-medium text-h5"
                                                        v-if="formData.product"
                                                    >
                                                        Opravdu si přejete
                                                        pořídit produkt
                                                        {{
                                                            formData.product
                                                                .product_name
                                                        }}
                                                        ?
                                                    </p>
                                                </v-container>
                                            </v-card-text>
                                            <v-card-actions class="ml-6 mr-6">
                                                <v-btn
                                                    color="red"
                                                    variant="outlined"
                                                    class="rounded-lg"
                                                    @click="closeDialog()"
                                                    ><v-icon class="mr-2"
                                                        >mdi-close</v-icon
                                                    >
                                                    Ne</v-btn
                                                >
                                                <v-spacer> </v-spacer>
                                                <v-btn
                                                    color="green"
                                                    variant="outlined"
                                                    class="rounded-lg"
                                                    @click="buyProduct()"
                                                >
                                                    <v-icon class="mr-2"
                                                        >mdi-check</v-icon
                                                    >
                                                    Ano
                                                </v-btn>
                                            </v-card-actions>
                                        </v-card>
                                    </v-dialog>
                                </v-row>
                            </v-container>
                        </v-card-text>
                    </v-card>
                </v-col>
                <!-- easy to setup -->
            </v-container>
        </v-card>
    </div>
    <v-container fluid>
        <v-footer
            color="transparent"
            class="text-center font-weight-medium d-flex flex-column"
        >
            <div>
                <v-btn
                    v-for="icon in icons"
                    :key="icon"
                    class="mx-4"
                    :icon="icon"
                    variant="text"
                ></v-btn>
            </div>

            <div class="pt-0">
                Phasellus feugiat arcu sapien, et iaculis ipsum elementum sit
                amet. Mauris cursus commodo interdum. Praesent ut risus eget
                metus luctus accumsan id ultrices nunc. Sed at orci sed massa
                consectetur dignissim a sit amet dui. Duis commodo vitae velit
                et faucibus. Morbi vehicula lacinia malesuada. Nulla placerat
                augue vel ipsum ultrices, cursus iaculis dui sollicitudin.
                Vestibulum eu ipsum vel diam elementum tempor vel ut orci. Orci
                varius natoque penatibus et magnis dis parturient montes,
                nascetur ridiculus mus.
            </div>

            <v-divider></v-divider>

            <div>
                {{ new Date().getFullYear() }} —
                <strong>CzechVPN</strong>
            </div>
        </v-footer>
    </v-container>
</template>
<script>
import axios from "axios";
import { useDisplay } from "vuetify";
export default {
    setup() {
        const { mobile } = useDisplay();

        return { mobile };
    },
    data: () => ({
        icons: ["mdi-facebook", "mdi-twitter", "mdi-linkedin", "mdi-instagram"],
        aspectRatio: "16 / 9",
        products: [],
        formData: [],
        buyProductInfoDialog: false,
        customerData: [],
    }),

    created() {
        this.index();
    },

    methods: {
        index() {
            axios.get("vpn/products").then((response) => {
                this.products = response.data.data;
            });
        },

        logInAsCustomer() {
            // redirect to login page
            this.$router.push({ name: "customerLogin" });
        },

        countProducts() {
            return 12 / this.products.length;
        },

        openBuyProduktInfoDialog(productId, product) {
            this.formData.productId = productId;
            this.formData.product = product;
            this.buyProductInfoDialog = true;
        },

        closeDialog() {
            this.buyProductInfoDialog = false;
            this.formData = [];
        },

        buyProduct() {
            // check if customer is logged
            this.$router.push({ name: "customerLogin" });
            // axios.get("customer").then((response) => {
            //     this.customerData = response.data;

            //     if (this.customerData == "") {
            //         this.$router.push({ name: "customerLogin" });
            //     }
            // });

            // axios
            //     .post("customer/vpn", {
            //         vpn_speed_products_id: this.formData.productId,
            //     })
            //     .then((response) => {
            //         this.responseData = response.data;

            //         if (this.responseData.status == "success") {
            //             this.responseData.color = "green";
            //             this.closeDialog();
            //         } else {
            //             this.responseData.color = "red";
            //         }
            //         this.snackbar = true;
            //         setTimeout(() => {
            //             this.responseData = [];
            //         }, 5000);
            //     });
        },
    },
};
</script>
