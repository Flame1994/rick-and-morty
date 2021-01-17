<template>
    <v-main class="grey primary" dark>
        <v-container>
            <v-row>
                <v-col cols="2">
                    <v-sheet rounded="lg">
                        <v-list color="accent">

                            <v-list-item
                                link
                                v-for="tab in tabs"
                                v-bind:key="tab"
                                v-bind:class="['tab-button', { active: currentTab === tab }]"
                                v-on:click="currentTab = tab"
                            >
                                <v-img
                                    v-if="tab === 'Plumbus'"
                                    width="100%"
                                    :src="'/img/plumbus.png'"
                                ></v-img>
                                <v-img
                                    v-else-if="tab === 'Info'"
                                    width="100%"
                                    :src="'/img/logo.png'"
                                ></v-img>
                                <v-list-item-content v-else>
                                    <v-list-item-title color="white">
                                        {{ tab }}
                                    </v-list-item-title>
                                </v-list-item-content>
                            </v-list-item>
                        </v-list>
                    </v-sheet>
                </v-col>

                <v-col>
                    <v-sheet
                        min-height="70vh"
                        rounded="lg"
                    >
                        <component v-bind:is="currentTabComponent" class="tab"></component>
                    </v-sheet>
                </v-col>
            </v-row>
        </v-container>
    </v-main>
</template>

<script>
    import Character from './Character';
    import Episode from './Episode';
    import Location from './Location';
    import Info from './Info';
    import Plumbus from './Plumbus';

    export default {
        name: "Home",
        components: {Info, Character, Location, Episode, Plumbus},
        mounted() {},
        data: () => ({
            currentTab: "Info",
            tabs: ["Info", "Character", "Episode", "Location", "Plumbus"]
        }),
        computed: {
            currentTabComponent() {
                return this.currentTab.toLowerCase();
            }
        }
    }
</script>

<style scoped>

</style>
