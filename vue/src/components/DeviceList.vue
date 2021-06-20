<template>
    <v-app>
        <v-container>
            <v-row>

                <v-col class="card-col" cols="6" sm="3" v-for="device in searchDevices" :key="device.id">

                    <v-card class="card" :to="{name: 'DeviceDetail', query: {id: device.id}}">

                        <!-- アイコンだよ -->
                        <v-icon v-if="device.type && device.logs[device.id]" class="card-icon">{{device.logs[device.logs.length-1].status ? device.type.open_icon : device.type.close_icon}}</v-icon>
                        <v-icon v-else-if="device.type" class="card-icon">{{device.type.close_icon}}</v-icon>
                        <v-icon v-else class="card-icon">mdi-help</v-icon>

                        <!--タイトルだよ-->
                        <v-card-title> {{device.device_name}} </v-card-title>

                        <!--サブタイトルだよ-->
                        <v-card-subtitle style="font-size: 20px;" v-if="device.logs[device.id]"> {{device.logs[device.logs.length-1].status ? "OPEN" : "CLOSE"}} </v-card-subtitle>

                    </v-card>

                </v-col>

            </v-row>
        </v-container>
    </v-app>
</template>

<script>
    export default {
        name: 'Device',
        computed: {

            //検索 + ソート
            searchDevices(){
                let devices = this.$store.state.device.full.filter(device => {
                    return device.device_name.includes(this.$store.state.device.keyword)
                })
                switch(this.$store.state.device.sort){
                    case 0:
                        return devices
                    case 1:
                        return devices.reverse()
                    default:
                        return ''
                }
            },
            
        },
        created() {
            //取得
            this.$store.dispatch('device/getFull')
        },
    }
</script>

<style scoped>

    .card-col{
        display: flex;
        justify-content: center;
    }

    .card{
        width: 100%;
        height: 100%;
        text-align: left;
    }

    .card-icon{
        display: flex;
        justify-content: center;
        margin-top: 30px;
        margin: 50px;
        font-size: 100px;
    }

</style>