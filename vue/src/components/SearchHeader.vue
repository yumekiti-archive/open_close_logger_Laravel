<template>
    <v-toolbar
        dark
    >
        <v-toolbar-title>Search</v-toolbar-title>
        <v-autocomplete
            v-model="select"
            :search-input.sync="key"
            cache-items
            class="mx-4"
            flat
            hide-no-data
            hide-details
            label="What is the device's name?"
            solo-inverted
        ></v-autocomplete>
        
        <v-btn @click="close" icon>
            <v-icon>mdi-close</v-icon>
        </v-btn>

    </v-toolbar>
</template>

<script>
    export default {
        name: 'Search',
        data: () => ({
            key: '',
            select: '',
            readFlag: false,
        }),
        methods:{
            close(){
                this.$store.state.search = !this.$store.state.search
                this.$store.state.keyword = ''
            }
        },
        watch: {
            key(){        
                this.$store.state.keyword = this.key === null ? '' : this.key
            },
        },
    }
</script>