<template>
    <v-container>
        <h1>Rick and Morty showcase</h1>
        <v-divider></v-divider>
        <p>
            This is a showcase of Rick and Morty using the <a href="https://rickandmortyapi.com/">rickandmorty api</a> and IMDB information regarding the series.
        </p>
        <h4>The showcase shows the following:<br></h4>
        <v-row dense>
            <v-col
                :cols="12"
            >
                <v-card
                    elevation="3"
                    color="accent"
                >
                    <v-card-title>
                        Characters
                    </v-card-title>
                    <v-card-text>
                        In the <span>Character</span> tab you will find the list of characters and all of their information.
                    </v-card-text>
                </v-card>
            </v-col>
            <v-col
                :cols="12"
            >
                <v-card
                    elevation="3"
                    color="accent"
                >
                    <v-card-title>
                        Episode
                    </v-card-title>
                    <v-card-text>
                        In the <span>Episode</span> tab you will find information about all Rick and Morty episodes. Explore each episode in order
                        to see which Characters were present in the episode.
                    </v-card-text>
                </v-card>
            </v-col>
            <v-col
                :cols="12"
            >
                <v-card
                    elevation="3"
                    color="accent"
                >
                    <v-card-title>
                        Location
                    </v-card-title>
                    <v-card-text>
                        In the <span>Location</span> tab a you can find all location information. You can filter on location name and dimension as well as list all characters for
                        all filtered locations. Jump through the portal in each location to view characters currently at that location.
                    </v-card-text>
                </v-card>
            </v-col>
        </v-row>
    </v-container>
</template>

<script>
    export default {
        name: "info",
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
            getInfo() {
                this.loading = true;

                axios.get('/api/info')
                    .then((response)=>{
                        this.loading = false;
                        this.count = response.data.data.info.pages;
                        this.episodes = response.data.data.results;
                    })
            },
        },
        created() {
            this.getInfo()
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

    a {
        color: #4CA0F0 !important;
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
