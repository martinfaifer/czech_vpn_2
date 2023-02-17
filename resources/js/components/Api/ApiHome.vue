<template>
    <div>
        <v-card class="overflow-hidden rounded-xl blur shadow-blur-big-card">
            <v-card-text>
                <p class="text-left text-h3 mt-3">Úvod</p>
                <v-divider class="my-3"></v-divider>
                <v-container fluid>
                    <p class="my-4">
                        CzechVPN nabízí možnost správy zákazníků pomocí
                        jednoduchého rest API, které nabízí základní operace se
                        zákazníky.
                    </p>
                    <p class="my-4">
                        Toto API je dostupné pro ISP nebo společnosti, kteří
                        chtejí využívat naše API. Pokud zákazník sám sebe chce
                        spravovat pomocí API, tak tato služba bude dostupná v
                        průběhu roku 2023.
                    </p>

                    <p class="my-4 text-subtitle-1 font-weight-medium">
                        Autorizace:
                    </p>
                    <p class="my-4">
                        Autorizace je dostupná pomocí basic authentication, kdy
                        se jako uživatelské jméno používá Váš email.
                        <span class="font-weight-medium">
                            Pokud není platná autorizace je vrácen status code
                            <span class="text-red font-weight-bold"> 401</span
                            >.</span
                        >
                    </p>
                    <p class="my-4">
                        Při správě uživatelů může každá společnost upravovat
                        pouze své uživatele. Při pokusu o úpravu uživatele jiné
                        společnosti ( například při použití jiného userId ),
                        bude vrácen status code
                        <span class="text-red font-weight-bold">401</span>.
                    </p>

                    <p class="my-4 text-subtitle-1 font-weight-medium">
                        Návratové hodnoty:
                    </p>
                    <p class="my-4">
                        Api vrací výsledky ve formátu json v struktuře:
                        <br />
                        <span class="text-blue font-italic">
                            {
                            <br />
                            <span class="ml-6">
                                "status": "error",
                                <span class="text-disabled"
                                    >// status může mít hodnotu success nebo
                                    error v závislosti na akci a výsledku
                                    akce</span
                                >
                            </span>
                            <br />
                            <span class="ml-6">
                                "time": "2023-02-16T07:25:03.500529Z",
                            </span>
                            <br />
                            <span class="ml-6">
                                "data": "data"
                                <span class="text-disabled"
                                    >// data může být text nebo object v
                                    závisloti na požadované akci</span
                                ></span
                            >
                            <br />
                            }
                            <br />
                        </span>

                        <br />
                        Může nastat situace, kdy se budete snažit upravit nebo
                        založit záznam. Api má v sobě zabudovanou validaci všech
                        vstupů a při neplatném vstupu nebo záznamu dojde k
                        návratu ze strany API s chybou
                        <span class="text-red font-weight-bold">422</span> a
                        odpovědí od serveru ve formátu json například:
                        <br />
                        <span class="text-blue font-italic">
                            {
                            <br />
                            <span class="ml-6">
                                "message": "Tento email, je již registrován",
                            </span>
                            <br />
                            <span class="ml-6">
                                "errors":{
                                <br />
                                <span class="ml-8"> "email": [ </span>
                                <br /><span class="ml-12"
                                    >"Tento email, je již registrován"</span
                                >
                                <br /><span class="ml-12">]</span> <br />
                                <span class="ml-6">}</span><br />
                            </span>
                            }
                        </span>
                    </p>
                </v-container>
            </v-card-text>
        </v-card>
    </div>
</template>
