<template>
    <v-app>
        <DeviceDetail />
    </v-app>
</template>

<script>
    import DeviceDetail from '@/components/DeviceDetail.vue'

    export default {
        name: 'Device',

        components: {
            DeviceDetail,
        },
    }
</script>
