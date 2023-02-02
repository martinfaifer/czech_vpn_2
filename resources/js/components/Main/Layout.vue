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
                <span class="text-white">Czech</span
                ><span class="text-red">VPN</span>
            </v-app-bar-title>
            <template v-slot:append>
                <v-btn
                    variant="flat"
                    rounded="md"
                    color="#1661BD"
                    class="text-white font-weight-black"
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
                        Integer imperdiet lectus quis justo. Aenean vel massa
                        quis mauris vehicula lacinia. Duis sapien nunc, commodo
                        et, interdum suscipit, sollicitudin et, dolor. Mauris
                        metus. Fusce suscipit libero eget elit. Nullam rhoncus
                        aliquam metus.
                    </p>
                </v-col>

                <div class="d-flex flex-column-reverse mb-6">
                    <v-col cols="12" sm="12" md="12" lg="12">
                        <v-btn
                            style="postion: fixed; left: 45%; top: 40%"
                            rounded="xl"
                            color="green-darken-4"
                            class="text-white font-size-bold animate pulse-btn"
                        >
                            Pořídit službu
                            <v-icon class="mx-auto"> mdi-arrow-right </v-icon>
                        </v-btn>
                    </v-col>
                </div>
            </v-container>
        </v-img>
        <!-- some text section -->

        <v-card flat color="white" class="hidden rounded-t-xl mt-n8">
            <v-container fluid>
                <!-- where is -->
                <v-col cols="12" sm="12" md="12" lg="12" class="mt-16">
                    <v-card class="hidden" flat>
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
                                        <div class="d-flex justify-center">
                                            <v-btn
                                                color="rgba(13,126,53,1)"
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
                                        </div>
                                    </v-col>
                                </v-row>
                            </v-container>
                        </v-card-text>
                    </v-card>
                </v-col>
                <!-- security -->
                <v-col cols="12" sm="12" md="12" lg="12">
                    <v-card class="hidden" flat style="margin-top: 150px">
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
                    <v-card class="hidden" flat style="margin-top: 150px">
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
                <!-- easy to setup -->
            </v-container>
        </v-card>

        <!-- footer -->
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
import { useDisplay } from "vuetify";
export default {
    setup() {
        const { mobile } = useDisplay();

        return { mobile };
    },
    data: () => ({
        icons: ["mdi-facebook", "mdi-twitter", "mdi-linkedin", "mdi-instagram"],
        aspectRatio: "16 / 9",
    }),
};
</script>
