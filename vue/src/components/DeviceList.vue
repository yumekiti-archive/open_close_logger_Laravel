<template>
    <v-app>
        <v-container class="list-container">

            <DeviceAdd />

                <draggable class="row drag" v-model="Full" handle=".card" v-bind="getOptions">
                    <v-col class="list-col" cols="6" sm="3" xl="2" v-for="device in searchDevices" :key="device.id">

                        <v-card class="card" :to="{name: 'DeviceDetail', query: {id: device.id}}">

                            <!-- アイコンだよ -->
                            <v-icon v-if="device.categories && device.logs[0]" class="card-icon">{{device.logs[device.logs.length-1].status ? device.categories.open_icon : device.categories.close_icon}}</v-icon>
                            <v-icon v-else-if="device.categories" class="card-icon">{{device.categories.close_icon}}</v-icon>
                            <v-icon v-else class="card-icon">mdi-help</v-icon>

                            <!--タイトルだよ-->
                            <v-card-title> {{device.device_name}} </v-card-title>

                            <!--サブタイトルだよ-->
                            <v-card-subtitle style="font-size: 20px;" v-if="device.logs[0]"> {{device.logs[device.logs.length-1].status ? "OPEN" : "CLOSE"}} </v-card-subtitle>

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

            //検索
            searchDevices(){
                return this.$store.state.full.full.filter(full => {
                    let key = full.device_name.includes(this.$store.state.full.keyword)
                    if(full.categories != null){
                        key += full.categories.category_name.includes(this.$store.state.full.keyword)
                    }
                    return key
                })
            },

            Full: {
                get() {
                    return this.$store.state.full.full
                },
                set(value) {
                    this.$store.commit('full/updateFull', value)
                }
            },
            
            getOptions(){
                return {
                    delay:200,
                    animation:300,
                }
            },
            
        },
        created() {
            //取得
            this.$store.dispatch('full/getFull')
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

</style>