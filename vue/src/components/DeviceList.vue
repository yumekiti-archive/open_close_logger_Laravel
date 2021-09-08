<template>
    <v-app>
        <v-container class="list-container">

            <DeviceAdd v-if="$store.state.device.addFlag" />

                <draggable class="row drag" handle=".card" v-bind="getOptions">
                    <v-col class="list-col" cols="6" sm="3" xl="2" v-for="(device, i) in searchDevices" :key="device.id">

                        <v-card class="card" :to="{name: 'DeviceDetail', query: {id: device.id}}">

                            <!-- アイコンだよ -->
                            <v-icon class="card-icon" v-if="categories[i]">{{state[device.id] ? categories[i].open_icon : categories[i].close_icon}}</v-icon>
                            <v-icon class="card-icon" v-else>mdi-help</v-icon>

                            <!--タイトルだよ-->
                            <v-card-title class="card-title"> <span class="title">{{device.device_name}}</span> </v-card-title>

                            <!--サブタイトルだよ-->
                            <v-card-subtitle class="subtitle" v-if="state[device.id] != null">
                                <div v-if="state[device.id]">
                                    <span style="color: blue;">OPEN</span>
                                </div>
                                <div v-else>
                                    <span style="color: red;">CLOSE</span>
                                </div>
                            </v-card-subtitle>
                            <v-card-subtitle class="subtitle" v-else>{{string.subtitle}}</v-card-subtitle>

                        </v-card>
                        
                    </v-col>
                </draggable>

        </v-container>
    </v-app>
</template>

<script>
    import draggable from 'vuedraggable'
    import DeviceAdd from '@/components/DeviceAdd'

    export default {
        name: 'Device',
        components: {
            draggable,
            DeviceAdd,
        },
        computed: {

            //取得
            devices(){
                return this.$store.state.device.devices
            },
            categories(){
                return this.$store.state.category.device
            },
            state(){
                return this.$store.state.log.state
            },
            string(){
                return this.$store.state.string.en.devicelist
            },

            //検索
            searchDevices(){
                return this.devices.filter(device => {
                    let key = device.device_name.includes(this.$store.state.keyword)
                    return key
                })
            },

            // draggable
            getOptions(){
                return {
                    delay:200,
                    animation:300,
                }
            },
            
        },
        created() {
            //取得
            this.$store.dispatch('device/getDevices')
            this.$store.dispatch('category/getDeviceCategories')
            this.$store.dispatch('log/getState')
            this.$store.dispatch('user/getUser')
        },
    }
</script>

<style scoped>

    .list-container{
        display: flex;
        justify-content: center;
    }

    .drag{
        width: 100%;
        height: 100%;
    }

    .list-col{
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

    .card-title{
        display: flex;
        align-items: center;
    }

    .title{
        overflow: hidden;
        white-space: nowrap;
        text-overflow: ellipsis;
    }

    .subtitle{
        font-size: 20px;
    }

</style>