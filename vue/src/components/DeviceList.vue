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
                            <v-card-subtitle class="subtitle" v-if="state[device.id] != null"> {{state[device.id] ? "OPEN" : "CLOSE"}} </v-card-subtitle>
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
            full(){
                return this.$store.state.full.full.full
            },
            devices(){
                return this.$store.state.full.full.full.devices
            },
            categories(){
                return this.$store.state.full.full.full.categories
            },
            state(){
                return this.$store.state.full.full.state
            },
            string(){
                return this.$store.state.string.en.devicelist
            },

            //検索
            searchDevices(){
                if(this.full){
                    return this.full.devices.filter(devices => {
                        let key = devices.device_name.includes(this.$store.state.full.keyword)
                        
                        for(let i in this.full.categories){
                            if(this.full.categories[i] != null){
                                key += this.full.categories[i].category_name.includes(this.$store.state.full.keyword)
                            }
                        }
                        return key
                    })
                }else return ''
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
            this.$store.dispatch('full/get')
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