<template>
    <v-app>

        <Navigation />
        
        <Header v-if="!$store.state.search" scroll-target="#scrolling" />
        <SearchHeader v-if="$store.state.search" />

        <v-main id="scrolling">
            <router-view v-if="this.$store.state.user.auth || this.$route.path === '/login'" />
            <router-view v-if="this.$store.state.user.auth || this.$route.path === '/add'" />
        </v-main>
        
    </v-app>
</template>

<script>
    import Header from '@/components/Header.vue'
    import SearchHeader from '@/components/SearchHeader.vue'
    import Navigation from '@/components/Navigation.vue'

    export default {
        name: 'App',
        components: {
            Header,
            SearchHeader,
            Navigation,
        },
    }
</script>