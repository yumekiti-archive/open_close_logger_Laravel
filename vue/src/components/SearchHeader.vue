<template>
    <v-toolbar
        dark
    >
        <v-toolbar-title>Search</v-toolbar-title>
        <v-autocomplete
        v-model="select"
        :items="items"
        :search-input.sync="key"
        cache-items
        class="mx-4"
        flat
        hide-no-data
        hide-details
        label="What is the device's name?"
        solo-inverted
        ></v-autocomplete>
    </v-toolbar>
</template>

<script>
    export default {
        name: 'Search',
        data: () => ({
            key: '',
            select: '',
            items: [],
        }),
        mathods:{
            getItem(){
                if(this.$store.state.type.types[0]){
                    for(let i in this.$store.state.type.types){
                        var type = this.$store.state.type.types[i].type_name;
                        this.items[i] = type
                    }
                }
            }
        },
        created(){
            this.$store.dispatch('type/getTypes')
        },
        watch: {
            key(){
                this.$store.state.full.keyword = this.key
                console.log(this.items)
            },
            items(){
                this.getItem
            },
        },
    }
</script>