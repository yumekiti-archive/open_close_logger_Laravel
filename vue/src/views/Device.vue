<template>
    <v-app>
        <DeviceList />
    </v-app>
</template>

<script>
    import DeviceList from '@/components/DeviceList.vue'

    export default {
        name: 'Device',

        components: {
            DeviceList,
        },
    }
</script>
