<template>
    <v-container>
        <v-container fill-height fluid v-if="loading">
            <v-row align="center"
                   justify="center">
                <v-col
                    class="subtitle-1 text-center"
                    cols="12"
                >
                    Starting up engines...
                </v-col>
                <v-progress-linear
                    :active="loading"
                    :size="100"
                    indeterminate
                    color="secondary"
                    height="10"
                ></v-progress-linear>
            </v-row>
        </v-container>
        <div id="locations" v-if="!loading && !selectedEpisode">
            <v-container fluid>
                <h1>Episodes</h1>
                <v-divider></v-divider>
                <v-row dense>
                    <v-col
                        v-for="episode in episodes"
                        :key="episode.id"
                        :cols="6"
                    >
                        <v-card
                            elevation="3"
                            color="accent"
                        >
                            <v-card-text>
                                Season <span>{{ episode.details.Season }}</span> | Episode <span>{{ episode.details.Episode }}</span>
                            </v-card-text>
                            <v-img
                                v-bind:src="episode.details.Poster">
                                <v-overlay
                                    :absolute="true"
                                    :value="true"
                                >
                                    <v-card-title class="justify-center">
                                        <p class="display-1 text--primary text-center">
                                            {{ episode.name }}
                                        </p>
                                    </v-card-title>
                                    <v-card-subtitle class="justify-center">
                                        <p class="text-center">{{ episode.details.Released }}</p>
                                    </v-card-subtitle>
                                    <v-card-text class="justify-center">
                                        <p class="text-center">{{ episode.details.Runtime }}</p>
                                        <p class="text-center">{{ episode.details.Genre }}</p>
                                        <p class="text-center"><span>{{ episode.characters.length }}</span> Characters</p>
                                    </v-card-text>
                                </v-overlay>
                            </v-img>
                            <v-card-actions class="pa-4">
                                <v-btn
                                    color="orange lighten-2"
                                    text
                                    @click="selectEpisode(episode)"
                                >
                                    Explore
                                </v-btn>
                                <v-spacer></v-spacer>
                                <span class="grey--text text--lighten-2 caption mr-2">
                                    {{ episode.details.imdbRating }}
                                </span>
                                <v-rating
                                    v-model="episode.details.imdbRating"
                                    :length="10"
                                    readonly
                                    half-increments
                                    color="success lighten-3"
                                    background-color="grey lighten-1"
                                    dense
                                    hover
                                    size="18"
                                ></v-rating>
                            </v-card-actions>
                            <v-divider></v-divider>
                            <v-card-text>
                                <div class="text--primary">
                                    {{ episode.details.Plot }}
                                </div>
                            </v-card-text>
                        </v-card>
                    </v-col>
                </v-row>
            </v-container>
            <v-coontainer class="justify-center">
                <v-pagination
                    @input="getEpisodes"
                    v-model="page"
                    class="my-4"
                    :length="count"
                    :total-visible="8"
                ></v-pagination>
            </v-coontainer>
        </div>
        <v-container v-if="selectedEpisode">
            <v-container fluid>
                <v-btn
                    color="secondary"
                    @click="unselectEpisode"
                >
                    Return
                </v-btn>
                <v-divider></v-divider>

                <h1>{{ selectedEpisode.name }}</h1>
                <h4>Season <span>{{ selectedEpisode.details.Season }}</span> | Episode <span>{{ selectedEpisode.details.Episode }}</span></h4>

                <v-divider></v-divider>

                <v-row dense>
                    <v-col
                        v-for="character in selectedEpisode.characters"
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
        </v-container>
    </v-container>
</template>

<script>
    export default {
        name: "episode",
        data() {
            return {
                loading: true,
                selectedEpisode: null,
                episodes: {},
                name: '',
                dimension: '',
                count: 0,
                page: 1,
            }
        },
        methods: {
            getEpisodes() {
                this.loading = true;

                axios.get('/api/episodes?page=' + this.page)
                    .then((response)=>{
                        this.loading = false;
                        this.count = response.data.data.info.pages;
                        this.episodes = response.data.data.results;
                    })
            },
            selectEpisode(episode) {
                console.log('Selected episode');
                console.log(episode);
                this.selectedEpisode = episode;
            },
            unselectEpisode() {
                this.selectedEpisode = null;
            }
        },
        created() {
            this.getEpisodes()
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
