<template>
    <div>
        <v-btn @click="$store.state.search = !$store.state.search" icon>
            <v-icon>mdi-magnify</v-icon>
        </v-btn>
        <v-btn icon>
            <v-icon>mdi-plus</v-icon>
        </v-btn>
    </div>
</template>

<style scoped>
    div{
        overflow: hidden;
        white-space: nowrap;
        margin-right: 10px;
    }
</style>