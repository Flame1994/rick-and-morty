<template>
    <v-app dark>
        <router-view/>
    </v-app>
</template>

<script>
export default {
    name: "App",

    mounted() {
        console.log("App mounted.");
    },
};
</script>

<style lang="scss">
    body {
        font-family: Exo;
    }
</style>
