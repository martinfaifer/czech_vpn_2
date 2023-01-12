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
        <v-parallax
            src="images/network.jpg"
            scale="0.5"
            class="mt-n16"
            max-height="600"
        >
            <div
                class="d-flex flex-column justify-start fill-height align-start text-white"
            >
                <h1 class="text-h1 font-weight-black mb-4 mt-16 ml-14">
                    Czech<span class="text-red">VPN</span>
                </h1>
                <h4 class="text-h5 text-white font-weight-bold ml-16">
                    Česká VPN pro všechny
                </h4>

                <v-btn
                    style="postion: fixed; left: 45%; top: 50%"
                    rounded="xl"
                    color="#1661BD"
                    class="text-white font-size-bold animate pulse-btn"
                >
                    Pořídit službu
                    <v-icon class="mx-auto"> mdi-arrow-right </v-icon>
                </v-btn>
            </div>
        </v-parallax>
        <v-container fluid>
            <!-- some text section -->
            <v-container fluid>
                <v-card
                    flat
                    style="
                        background: rgba(204, 204, 204, 0.15);
                        box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
                        backdrop-filter: blur(4.5px);
                        -webkit-backdrop-filter: blur(4.5px);
                        border-radius: 10px;
                    "
                >
                    <v-card-text>
                        <p class="mb-6 text-center text-h2 font-weight-bold">
                            Nadpis sekce
                        </p>
                        <p class="text-h6">
                            Lorem ipsum dolor sit amet, consectetuer adipiscing
                            elit. Duis ante orci, molestie vitae vehicula
                            venenatis, tincidunt ac pede. Fusce nibh. Nam quis
                            nulla. Nullam sapien sem, ornare ac, nonummy non,
                            lobortis a enim. In sem justo, commodo ut, suscipit
                            at, pharetra vitae, orci. Quisque tincidunt
                            scelerisque libero. Donec vitae arcu. Quisque porta.
                            Maecenas sollicitudin. Curabitur vitae diam non enim
                            vestibulum interdum. Nullam at arcu a est
                            sollicitudin euismod. Nam quis nulla. Nulla turpis
                            magna, cursus sit amet, suscipit a, interdum id,
                            felis. Aliquam erat volutpat. Aenean placerat.
                            Phasellus faucibus molestie nisl. Fusce consectetuer
                            risus a nunc. Nulla quis diam. Itaque earum rerum
                            hic tenetur a sapiente delectus, ut aut reiciendis
                            voluptatibus maiores alias consequatur aut
                            perferendis doloribus asperiores repellat. Praesent
                            vitae arcu tempor neque lacinia pretium. In dapibus
                            augue non sapien. Fusce aliquam vestibulum ipsum.
                            Nullam sapien sem, ornare ac, nonummy non, lobortis
                            a enim. Integer vulputate sem a nibh rutrum
                            consequat. Aenean placerat. Phasellus rhoncus. Nunc
                            auctor. Aenean vel massa quis mauris vehicula
                            lacinia. Curabitur sagittis hendrerit ante. Aliquam
                            ornare wisi eu metus. Nulla pulvinar eleifend sem.
                            Integer vulputate sem a nibh rutrum consequat.
                        </p>
                    </v-card-text>
                </v-card>
            </v-container>
            <!-- cards -->
            <v-container fluid>
                <v-row>
                    <v-col cols="12" sm="12" md="4" lg="4">
                        <v-card
                            style="
                                background: rgba(204, 204, 204, 0.15);
                                box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
                                backdrop-filter: blur(4.5px);
                                -webkit-backdrop-filter: blur(4.5px);
                                border-radius: 10px;
                            "
                            flat
                        >
                            <v-card-title
                                class="text-center text-white"
                                style="
                                        background: rgba(3, 100, 125, 0.85);
                                            rgba(3, 100, 125, 0.37);
                                        backdrop-filter: blur(4.5px);
                                        -webkit-backdrop-filter: blur(4.5px);
                                    "
                                color="white"
                            >
                                titulek karty
                            </v-card-title>
                            <v-card-text>
                                <v-container fluid>
                                    <p
                                        class="text-center text-subtitle-1 font-weight-bold"
                                    >
                                        Quisque porta. Morbi leo mi, nonummy
                                        eget tristique non, rhoncus non leo.
                                        Nullam sit amet magna in magna gravida
                                        vehicula. Integer tempor. Duis sapien
                                        nunc, commodo et, interdum suscipit,
                                        sollicitudin et, dolor. Nullam dapibus
                                        fermentum ipsum. Aliquam id dolor.
                                        Nullam rhoncus aliquam metus. Nunc
                                        tincidunt ante vitae massa. Nullam
                                        rhoncus aliquam metus. Nulla pulvinar
                                        eleifend sem. Nunc auctor. Donec ipsum
                                        massa, ullamcorper in, auctor et,
                                        scelerisque sed, est. Mauris dictum
                                        facilisis augue. Nulla est. Praesent
                                        vitae arcu tempor neque lacinia pretium.
                                        Phasellus faucibus molestie nisl.
                                    </p>
                                </v-container>
                            </v-card-text>
                        </v-card>
                    </v-col>
                    <v-col cols="12" sm="12" md="4" lg="4">
                        <v-card
                            flat
                            style="
                                background: rgba(204, 204, 204, 0.15);
                                box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
                                backdrop-filter: blur(4.5px);
                                -webkit-backdrop-filter: blur(4.5px);
                                border-radius: 10px;
                            "
                        >
                            <v-card-title
                                class="text-center text-white"
                                style="
                                        background: rgba(3, 100, 125, 0.85);
                                            rgba(3, 100, 125, 0.37);
                                        backdrop-filter: blur(4.5px);
                                        -webkit-backdrop-filter: blur(4.5px);
                                    "
                                color="white"
                            >
                                titulek karty s img
                            </v-card-title>
                            <v-card-text>
                                <v-container fluid>
                                    <v-row
                                        class="d-flex align-center justify-center"
                                    >
                                        <v-col cols="12" sm="12" md="3" lg="3">
                                            <v-img
                                                src="images/shield.png"
                                                alt=""
                                            >
                                            </v-img>
                                        </v-col>
                                        <v-col cols="12" sm="12" md="9" lg="9">
                                            <p
                                                class="text-center text-subtitle-1 font-weight-bold"
                                            >
                                                Quisque porta. Morbi leo mi,
                                                nonummy eget tristique non,
                                                rhoncus non leo. Nullam sit amet
                                                magna in magna gravida vehicula.
                                                Integer tempor. Duis sapien
                                                nunc, commodo et, interdum
                                                suscipit, sollicitudin et,
                                                dolor. Nullam dapibus fermentum
                                                ipsum. Aliquam id dolor. Nullam
                                                rhoncus aliquam metus. Nunc
                                                tincidunt ante vitae massa.
                                                Nullam rhoncus aliquam metus.
                                                Nulla pulvinar eleifend sem.
                                                Nunc auctor. Donec ipsum massa,
                                                ullamcorper in, auctor et,
                                                scelerisque sed, est. Mauris
                                                dictum facilisis augue. Nulla
                                                est. Praesent vitae arcu tempor
                                                neque lacinia pretium. Phasellus
                                                faucibus molestie nisl.
                                            </p>
                                        </v-col>
                                    </v-row>
                                </v-container>
                            </v-card-text>
                        </v-card>
                    </v-col>
                    <v-col cols="12" sm="12" md="4" lg="4">
                        <v-card
                            flat
                            style="
                                background: rgba(204, 204, 204, 0.15);
                                box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
                                backdrop-filter: blur(4.5px);
                                -webkit-backdrop-filter: blur(4.5px);
                                border-radius: 10px;
                            "
                        >
                            <v-card-title
                                class="text-center text-white"
                                style="
                                        background: rgba(3, 100, 125, 0.85);
                                            rgba(3, 100, 125, 0.37);
                                        backdrop-filter: blur(4.5px);
                                        -webkit-backdrop-filter: blur(4.5px);
                                    "
                                color="white"
                            >
                                titulek karty s form
                            </v-card-title>
                            <v-card-text>
                                <v-container fluid>
                                    <v-col cols="12" sm="12" md="12" lg="12">
                                        <v-text-field
                                            autofocus
                                            variant="outlined"
                                            label="Nějaký text"
                                            required
                                        ></v-text-field>
                                    </v-col>
                                    <v-col
                                        cols="12"
                                        class="d-flex justify-space-between"
                                    >
                                        <v-btn
                                            variant="flat"
                                            rounded="md"
                                            color="red-darken-3"
                                            class="text-white font-weight-black"
                                            >Zavřít</v-btn
                                        >
                                        <v-btn
                                            variant="flat"
                                            rounded="md"
                                            class="text-white font-weight-black"
                                            color="green-darken-3"
                                            >Odeslat</v-btn
                                        >
                                    </v-col>
                                </v-container>
                            </v-card-text>
                        </v-card>
                    </v-col>
                </v-row>
            </v-container>
            <!-- footer -->
        </v-container>
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
                    Phasellus feugiat arcu sapien, et iaculis ipsum elementum
                    sit amet. Mauris cursus commodo interdum. Praesent ut risus
                    eget metus luctus accumsan id ultrices nunc. Sed at orci sed
                    massa consectetur dignissim a sit amet dui. Duis commodo
                    vitae velit et faucibus. Morbi vehicula lacinia malesuada.
                    Nulla placerat augue vel ipsum ultrices, cursus iaculis dui
                    sollicitudin. Vestibulum eu ipsum vel diam elementum tempor
                    vel ut orci. Orci varius natoque penatibus et magnis dis
                    parturient montes, nascetur ridiculus mus.
                </div>

                <v-divider></v-divider>

                <div>
                    {{ new Date().getFullYear() }} —
                    <strong>CzechVPN</strong>
                </div>
            </v-footer>
        </v-container>
    </div>
</template>
<script>
export default {
    data: () => ({
        icons: ["mdi-facebook", "mdi-twitter", "mdi-linkedin", "mdi-instagram"],
    }),
};
</script>
