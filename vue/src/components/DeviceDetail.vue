<template>
    <v-app>
        <v-container>
            <v-row class="card-row">

                <v-col cols="12" md="7">

                    <v-card class="detail" v-if="this.device && this.type">
                        <v-card-title> {{device.device_name}} </v-card-title>
                        <v-card-text>
                            token：<br>
                            {{device.token}}
                        </v-card-text>
                        <v-icon class="icon">{{this.$store.state.log.logs[this.$store.state.log.logs.length - 1].status ? this.type.open_icon : this.type.close_icon }}</v-icon>
                        <v-card-text>種類：{{this.type.type_name}}</v-card-text>
                        <v-card-text>cmd：{{this.type.cmd}}</v-card-text>
                    </v-card>

                </v-col>

                <v-col v-if="this.$store.state.log.logs" cols="12" md="5">

                    <v-card class="mb-5" v-for="log in this.$store.state.log.logs.slice().reverse()" :key="log.id">
                        <v-card-title> {{log.created_at}} </v-card-title>
                        <v-card-text> {{log.status ? "OPEN" : "CLOSE" }} </v-card-text>
                    </v-card>

                </v-col>

            </v-row>
        </v-container>
    </v-app>
</template>

<script>
    export default {
        name: 'DeviceDetail',
        data:()=>({
            showToken: false,
        }),
        computed:{
            device(){
                return this.$store.state.device.devices[0]
            },
            type(){
                return this.$store.state.type.types[0]
            },
        },
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
        margin-top: 20px;
    }
    .detail{
        position: sticky;
        top: 100px;
    }
    .icon{
        font-size: 300px;
        margin-top: 10px;
        display: flex;
        justify-content: center;
        overflow: hidden;
    }
</style>