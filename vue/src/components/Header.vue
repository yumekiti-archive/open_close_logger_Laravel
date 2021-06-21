<template>
    <v-app-bar
    :collapse="!collapseOnScroll"
    :collapse-on-scroll="collapseOnScroll"
    dark
    app
    >
    <!-- appで固定 -->

        <v-app-bar-nav-icon @click="nav" />

        <v-toolbar-title>OCLogger</v-toolbar-title>

        <v-spacer></v-spacer>

        <DeviceListHeader v-if="this.$route.path === '/device'" />

        <v-checkbox
        v-model="collapseOnScroll"
        color="white"
        hide-details
        ></v-checkbox>

    </v-app-bar>
</template>

<script>
    import DeviceListHeader from '@/components/DeviceListHeader.vue'

    export default {
        name: 'Header',
        components:{
            DeviceListHeader
        },
        data: () => ({
            collapseOnScroll: true,
        }),
        methods:{
            nav(){
                this.$store.state.nav = !this.$store.state.nav
            }
        }
    }
</script>