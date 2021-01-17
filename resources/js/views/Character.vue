<template>
    <v-container>
        <v-container fill-height fluid v-if="loading">
            <v-row align="center"
                   justify="center">
                <v-col
                    class="subtitle-1 text-center"
                    cols="12"
                >
                    Getting Shwifty...
                </v-col>
                <v-progress-linear
                    :active="loading"
                    :size="100"
                    indeterminate
                    color="info"
                    height="10"
                ></v-progress-linear>
            </v-row>
        </v-container>
        <div id="locations" v-if="!loading">
            <v-container fluid>
                <h1>Characters</h1>
                <v-divider></v-divider>
                <v-row dense>
                    <v-col
                        v-for="character in characters"
                        :key="character.id"
                        :cols="4"
                    >
                        <v-card
                            elevation="3"
                            color="accent"
                        >
                            <v-img v-bind:src="character.image">
                                <v-overlay
                                    :absolute="true"
                                    :value="true"
                                >
                                    <v-card-title class="justify-center">
                                        <p class="display-1 text--primary text-center">
                                            {{ character.name }}
                                        </p>
                                    </v-card-title>
                                    <v-card-subtitle class="justify-center">
                                        <p class="text-center">
                                            <span>Location</span>: {{ character.location.name }}
                                        </p>
                                        <p class="text-center">
                                            <span>Origin</span>: {{ character.origin.name }}
                                        </p>
                                    </v-card-subtitle>
                                </v-overlay>
                            </v-img>
                            <v-row no-gutters>
                                <v-col
                                    cols="12"
                                    sm="4"
                                >
                                    <v-card-text>
                                        <p class="text-center character-info-heading">
                                            Species
                                        </p>
                                        <p class="text-center">
                                            <span>{{ character.species }}</span>
                                        </p>
                                    </v-card-text>
                                </v-col>
                                <v-col
                                    cols="12"
                                    sm="4"
                                >
                                    <v-card-text>
                                        <p class="text-center character-info-heading">
                                            Gender
                                        </p>
                                        <p class="text-center">
                                            <span>{{ character.gender }}</span>
                                        </p>
                                    </v-card-text>
                                </v-col>
                                <v-col
                                    cols="12"
                                    sm="4"
                                >
                                    <v-card-text>
                                        <p class="text-center character-info-heading">
                                            Type
                                        </p>
                                        <p class="text-center" v-if="character.type == ''">
                                            <span>None</span>
                                        </p>
                                        <p class="text-center" v-if="character.type != ''">
                                            <span>{{ character.type }}</span>
                                        </p>
                                    </v-card-text>
                                </v-col>
                            </v-row>
                            <v-card-title
                                class="justify-center"
                                v-bind:class="{'status-alive': character.status == 'Alive',  'status-dead': character.status == 'Dead', 'status-unknown': character.status == 'unknown'}"
                            >
                                {{ character.status }}
                            </v-card-title>
                        </v-card>
                    </v-col>
                </v-row>
            </v-container>
            <v-coontainer class="justify-center">
                <v-pagination
                    @input="getCharacters"
                    v-model="page"
                    :length="count"
                    :total-visible="8"
                ></v-pagination>
            </v-coontainer>
        </div>
    </v-container>
</template>

<script>
    export default {
        name: "character",
        data() {
            return {
                loading: true,
                characters: {},
                count: 0,
                page: 1,
            }
        },
        methods: {
            getCharacters() {
                this.loading = true;

                axios.get('/api/characters?page=' + this.page)
                    .then((response)=>{
                        this.loading = false;
                        this.count = response.data.data.info.pages;
                        this.characters = response.data.data.results;
                    })
            },
        },
        created() {
            this.getCharacters()
        }
    }
</script>

<style scoped>
    span {
        color: #E89241 !important;
        font-weight: bold;
    }

    .character-info-heading {
        color: #7B84A0;
    }

    p {
        margin: 0 !important;
    }

    .status-alive {
        background-color: #37AA8C;
    }

    .status-unknown {
        background-color: #FFC107;
    }

    .status-dead {
        background-color: #AA3756;
    }

    .portal-button {
        height: 100px !important;
        background-color: transparent !important;
    }

    .portal-button::before {
        background-color: transparent !important;
    }
</style>
