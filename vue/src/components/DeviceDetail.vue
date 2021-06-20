<template>
    <v-app>
        <v-container>
            <v-row class="card-row">

                <v-col cols="12" md="6">

                    <v-card class="detail" v-for="device in this.$store.state.device.devices" :key="device.id">
                        <v-card-title> {{device.device_name}} </v-card-title>
                    </v-card>

                </v-col>

                <v-col v-if="this.$store.state.log.logs" cols="12" md="6">

                    <v-card class="mb-5" v-for="log in this.$store.state.log.logs" :key="log.id">
                        <v-card-title> {{log.created_at}} </v-card-title>
                        <v-card-text> {{log.status}} </v-card-text>
                    </v-card>

                </v-col>

            </v-row>
                {{this.$store.state.type.types}}
        </v-container>
    </v-app>
</template>

<script>
    export default {
        name: 'DeviceDetail',
        created() {
            //取得
            this.$store.dispatch('device/getDevices', this.$route.query.id)
            this.$store.dispatch('log/getLogs', this.$route.query.id)
            this.$store.dispatch('type/getTypes', this.$route.query.id)
        },
    }
</script>

<style scoped>
    .card-row{
        display: flex;
        justify-content: center;
    }
    .detail{
        height: 500px;
    }
</style>