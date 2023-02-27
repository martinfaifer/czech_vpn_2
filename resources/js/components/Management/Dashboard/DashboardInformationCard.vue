<template>
    <div>
        <v-card
            class="overflow-hidden rounded-xl blur shadow-blur-big-card"
            flat
        >
            <v-card-text>
                <v-container fluid>
                    <p class="text-center text-h3">{{ numberOfItems }}</p>
                    <p class="text-h6 text-center">{{ text }}</p>
                </v-container>
            </v-card-text>
        </v-card>
    </div>
</template>
<script>
export default {
    props: {
        numberOfItems: String,
        text: String,
    },

    data() {
        return {};
    },

    methods: {
        //
    },
};
</script>
