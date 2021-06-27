<template>
    <v-app>
        <v-container v-if="device && category">
            <v-row class="card-row">

                <v-col cols="12" md="7">

                    <v-card class="detail">
                        <!-- デバイス詳細だお -->
                        <v-card-title> {{device.device_name}} </v-card-title>
                        <v-card-text>
                            Token：<br>
                            {{device.token}}
                        </v-card-text>
                        <!-- カテゴリー情報だお -->
                        <v-icon v-if="log[0]" class="icon">{{log[log.length - 1].status ? category.open_icon : category.close_icon }}</v-icon>
                        <v-icon v-else-if="log[0] == null && category" class="icon">{{category.close_icon}}</v-icon>
                        <v-icon v-else class="icon">mdi-help</v-icon>
                        <v-card-text v-if="category">Category：{{category.category_name}}</v-card-text>
                        <v-card-text v-else>Category：Notset</v-card-text>
                    </v-card>

                </v-col>

                <v-col cols="12" md="5">

                    <!-- ログ情報だお -->
                    <v-card class="mb-5" v-for="log in log.slice().reverse()" :key="log.id">
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
        computed: {

            device(){
                return this.$store.state.device.devices[0]
            },
            
            log(){
                return this.$store.state.log.logs
            },

            category(){
                return this.$store.state.category.categories[0]
            },
            
        },
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