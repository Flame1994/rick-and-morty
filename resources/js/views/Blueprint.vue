<template>
    <v-container>
        <h1>Blueprint</h1>
        <v-row>
            <v-col cols="12">
                <h3>Colors</h3>
            </v-col>
        </v-row>
        <v-row>
            <v-col cols="6">
                <v-row>
                    <v-col cols="12">
                        <h4>Main</h4>
                    </v-col>
                </v-row>
                <v-row>
                    <v-col cols="4">
                        <v-sheet
                            color="primary"
                            height="100"
                        >
                            primary - #227E9A
                        </v-sheet>
                    </v-col>
                    <v-col cols="4">
                        <v-sheet
                            color="secondary"
                            height="100"
                        >
                            secondary - #DB5931
                        </v-sheet>
                    </v-col>
                    <v-col cols="4">
                        <v-sheet
                            color="accent"
                            height="100"
                        >
                            accent - #4CA0F0
                        </v-sheet>
                    </v-col>
                </v-row>
            </v-col>
            <v-col cols="6">
                <v-row>
                    <v-col cols="12">
                        <h4>Messages</h4>
                    </v-col>
                </v-row>
                <v-row>
                    <v-col cols="2">
                        <v-sheet
                            color="error"
                            height="100"
                        >
                            error - #AA3756
                        </v-sheet>
                    </v-col>
                    <v-col cols="2">
                        <v-sheet
                            color="danger"
                            height="100"
                        >
                            danger - #AA3756
                        </v-sheet>
                    </v-col>
                    <v-col cols="2">
                        <v-sheet
                            color="info"
                            height="100"
                        >
                            info - #2196F3
                        </v-sheet>
                    </v-col>
                    <v-col cols="2">
                        <v-sheet
                            color="success"
                            height="100"
                        >
                            success - #37AA8C
                        </v-sheet>
                    </v-col>
                    <v-col cols="2">
                        <v-sheet
                            color="warning"
                            height="100"
                        >
                            warning - #FFC107
                        </v-sheet>
                    </v-col>
                </v-row>
            </v-col>
            <v-col cols="12">
                <v-row>
                    <v-col cols="12">
                        <h4>Pages</h4>
                    </v-col>
                </v-row>
                <v-row>
                    <v-col cols="2">
                        <v-sheet
                            color="network"
                            height="100"
                        >
                            network - #4CA0F0
                        </v-sheet>
                    </v-col>
                    <v-col cols="2">
                        <v-sheet
                            color="clients"
                            height="100"
                        >
                            clients - #37AA8C
                        </v-sheet>
                    </v-col>
                    <v-col cols="2">
                        <v-sheet
                            color="schedule"
                            height="100"
                        >
                            schedule - #7852BC
                        </v-sheet>
                    </v-col>
                    <v-col cols="2">
                        <v-sheet
                            color="exercises"
                            height="100"
                        >
                            exercises - #9A227E
                        </v-sheet>
                    </v-col>
                    <v-col cols="2">
                        <v-sheet
                            color="billing"
                            height="100"
                        >
                            billing - #4CA0F0
                        </v-sheet>
                    </v-col>
                </v-row>
            </v-col>
        </v-row>
        <v-row>
            <v-col cols="12">
                <h3>Buttons</h3>
            </v-col>
            <v-col cols="12">
                <v-btn
                    color="primary"
                    elevation="2"
                    small
                >
                    Small Button
                </v-btn>
                <v-btn
                    color="primary"
                    elevation="2"
                    medium
                >
                    Medium Button
                </v-btn>
                <v-btn
                    color="primary"
                    elevation="2"
                    large
                >
                    Large Button
                </v-btn>
            </v-col>
            <v-col cols="12">
                <v-btn
                    color="primary"
                    elevation="2"
                    small
                >
                    Small Button
                    <v-icon
                        right
                    >
                        mdi-checkbox-marked-circle
                    </v-icon>
                </v-btn>
                <v-btn
                    color="primary"
                    elevation="2"
                    medium
                >
                    Medium Button
                    <v-icon
                        right
                        dark
                    >
                        mdi-checkbox-marked-circle
                    </v-icon>
                </v-btn>
                <v-btn
                    color="primary"
                    elevation="2"
                    large
                >
                    Large Button
                    <v-icon
                        right
                    >
                        mdi-checkbox-marked-circle
                    </v-icon>
                </v-btn>
            </v-col>
            <v-col cols="12">
                <v-btn
                    color="primary"
                    elevation="2"
                    icon
                    small
                >
                    S
                </v-btn>
                <v-btn
                    color="primary"
                    elevation="2"
                    icon
                    medium
                >M</v-btn>
                <v-btn
                    color="primary"
                    elevation="2"
                    icon
                    large
                >L</v-btn>
                <v-btn

                    elevation="2"
                    icon
                    loading
                ></v-btn>
            </v-col>
        </v-row>
        <v-row>
            <v-col cols="12">
                <h3>Text</h3>
            </v-col>
            <v-col cols="12">

            </v-col>
        </v-row>
    </v-container>
</template>

<script>
    export default {
        name: "blueprint"
    }
</script>

<style scoped>

</style>
