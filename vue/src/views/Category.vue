<template>
    <v-app>
        <Categories />
    </v-app>
</template>

<script>
    import Categories from '@/components/Categories.vue'

    export default {
        name: 'Device',

        components: {
            Categories,
        },
    }
</script>
