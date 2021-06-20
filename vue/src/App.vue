<template>
    <v-app>

        <Navigation />
        
        <Header scroll-target="#scrolling" />

        <v-main id="scrolling">
            <router-view/>
        </v-main>
        
    </v-app>
</template>

<script>
    import Header from '@/components/Header.vue'
    import Navigation from '@/components/Navigation.vue'

    export default {
        name: 'App',
        components: {
            Header,
            Navigation,
        },
    }
</script>
