<template>
    <div>
        <v-fab-transition>
            <v-btn class="fab" fab large dark bottom right>
                <v-icon>mdi-plus</v-icon>
            </v-btn>
        </v-fab-transition>
    </div>
</template>

<style scoped>
    .fab{
        bottom: 0;
        right: 0;
        position: absolute;
        margin: 0 32px 32px 0;
        position: fixed;
    }
</style>