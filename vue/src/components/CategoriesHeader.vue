<template>
    <div>
        <v-btn @click="$store.state.category.addFlag = !$store.state.category.addFlag" icon>
            <v-icon>mdi-tag-plus-outline</v-icon>
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