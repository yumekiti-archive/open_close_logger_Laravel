<template>
    <v-app>
        <v-container v-if="this.$store.state.device.devices[0] && this.$store.state.category.categories[0] && this.$store.state.log.logs[0]">
            <v-row class="card-row">

                <v-col cols="12" md="7">

                    <v-card class="detail">
                        <v-card-title> {{this.$store.state.device.devices[0].device_name}} </v-card-title>
                        <v-card-text>
                            Token：<br>
                            {{this.$store.state.device.devices[0].token}}
                        </v-card-text>
                        <v-icon class="icon">{{this.$store.state.log.logs[this.$store.state.log.logs.length - 1].status ? this.$store.state.category.categories[0].open_icon : this.$store.state.category.categories[0].close_icon }}</v-icon>
                        <v-card-text>Category：{{this.$store.state.category.categories[0].category_name}}</v-card-text>
                        <v-card-text>cmd：{{this.$store.state.category.categories[0].cmd}}</v-card-text>
                    </v-card>

                </v-col>

                <v-col cols="12" md="5">

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
        created() {
            //取得
            this.$store.dispatch('device/getDevices', this.$route.query.id)
            this.$store.dispatch('log/getLogs', this.$route.query.id)
            this.$store.dispatch('category/getCategory', this.$route.query.id)
        },
    }
</script>

<style scoped>
    .card-row{
        display: flex;
        justify-content: center;
        margin-top: 10px;
    }
    .detail{
        position: -webkit-sticky;
        position: sticky;
        top: 100px;
        overflow-x: hidden;
    }
    .icon{
        font-size: 300px;
        margin-top: 10px;
        display: flex;
        justify-content: center;
        overflow: hidden;
    }
</style>