<template>
    <v-container>
        <v-container fill-height fluid v-if="loading">
            <v-row align="center"
                   justify="center">
                <v-col
                    class="subtitle-1 text-center"
                    cols="12"
                >
                    Generating Portals...
                </v-col>
                <v-progress-linear
                    :active="loading"
                    :size="100"
                    indeterminate
                    color="success"
                    height="10"
                ></v-progress-linear>
            </v-row>
        </v-container>
        <div id="locations" v-if="!loading && !selectedLocations">
            <v-container fluid>
                <h1>Locations</h1>
                <v-toolbar
                    floating
                >
                    <v-text-field
                        @keydown.enter="getLocationsByName"
                        v-model="name"
                        hide-details
                        prepend-icon="mdi-magnify"
                        single-line
                        placeholder="Search Name"
                    ></v-text-field>
                </v-toolbar>
                <v-toolbar
                    floating
                >
                    <v-text-field
                        @keydown.enter="getLocationsByDimension"
                        v-model="dimension"
                        hide-details
                        prepend-icon="mdi-magnify"
                        single-line
                        placeholder="Search Dimensions"
                    ></v-text-field>
                </v-toolbar>
                <v-row dense>
                    <v-col
                        :cols="4"
                    >
                        <v-btn
                            color="secondary"
                            @click="selectAllLocation()"
                        >Show all characters</v-btn>
                    </v-col>
                </v-row>

                <v-divider></v-divider>
                <v-row dense>
                    <v-col
                        v-for="location in locations"
                        :key="location.id"
                        :cols="6"
                    >
                        <v-card
                            elevation="3"
                            color="accent"
                        >
                            <v-card-text>
                                <span>{{ location.dimension }}</span> | <span>{{ location.type }}</span>
                            </v-card-text>
                            <v-card-title>
                                <p class="display-1 text--primary text-center">
                                    {{ location.name }}
                                </p>
                            </v-card-title>
                            <v-card-subtitle>
                                <p><span>{{ location.residents.length }}</span> character(s) are currently here. </p>
                            </v-card-subtitle>
                            <v-btn
                                class="portal-button"
                                depressed
                                :ripple="false"
                                @click="selectLocation(location)"
                            >
                                <v-img
                                    max-width="50"
                                    :src="'/img/rickandmorty.png'"
                                >
                                </v-img>
                                <v-img
                                    max-width="50"
                                    :src="'/img/portal.png'"
                                >
                                </v-img>
                            </v-btn>
                        </v-card>
                    </v-col>
                </v-row>
            </v-container>
            <v-coontainer class="justify-center">
                <v-pagination
                    @input="getLocations"
                    v-model="page"
                    class="my-4"
                    :length="count"
                    :total-visible="8"
                ></v-pagination>
            </v-coontainer>
        </div>
        <v-container v-if="selectedLocations">
            <v-container fluid>
                <v-btn
                    class="portal-button"
                    depressed
                    @click="unselectLocation"
                    :ripple="false"
                >
                    <v-img
                        max-width="100"
                        :src="'/img/ship.png'"
                    >
                    </v-img>
                    <v-img
                        max-width="50"
                        :src="'/img/portal.png'"
                    ></v-img>
                </v-btn>
                <div v-for="selectedLocation in selectedLocations">

                    <v-divider></v-divider>

                    <h1>{{ selectedLocation.name }}</h1>
                    <h4><span>{{ selectedLocation.dimension }}</span> | <span>{{ selectedLocation.type }}</span></h4>

                    <v-divider></v-divider>

                    <v-row dense>
                        <v-col
                            v-for="character in selectedLocation.residents"
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
                </div>
            </v-container>
        </v-container>
    </v-container>
</template>

<script>
    export default {
        name: "location",
        data() {
            return {
                loading: true,
                selectedLocations: null,
                locations: {},
                name: '',
                dimension: '',
                count: 0,
                page: 1,
            }
        },
        methods: {
            getLocations() {
                if (this.name !== '') {
                    this.getLocationsByName();
                } else if (this.dimension !== '') {
                    this.getLocationsByDimension();
                } else {
                    this.loading = true;

                    axios.get('/api/locations?page=' + this.page)
                        .then((response)=>{
                            this.loading = false;
                            this.count = response.data.data.info.pages;
                            this.locations = response.data.data.results;
                        })
                }
            },
            getLocationsByName() {
                this.loading = true;

                axios.get('/api/locations?page=' + this.page + '&name=' + this.name)
                    .then((response)=>{
                        this.loading = false;
                        this.count = response.data.data.info.pages;
                        this.locations = response.data.data.results;
                    })
            },
            getLocationsByDimension() {
                this.loading = true;

                axios.get('/api/locations?page=' + this.page + '&dimension=' + this.dimension)
                    .then((response)=>{
                        this.loading = false;
                        this.count = response.data.data.info.pages;
                        this.locations = response.data.data.results;
                    })
            },
            selectLocation(location) {
                this.selectedLocations = [location];
            },
            selectAllLocation() {
                this.selectedLocations = this.locations;
            },
            unselectLocation() {
                this.selectedLocations = null;
            }
        },
        created() {
            this.getLocations()
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
