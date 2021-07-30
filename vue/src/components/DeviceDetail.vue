<template>
    <v-app>
        <CategoryAdd v-if="$store.state.category.addFlag"/>
        <v-container v-if="device && category[0]">
            <v-row class="card-row">

                <v-col cols="12" md="7">

                    <v-card class="detail">
                        <!-- デバイス詳細だお -->
                        <v-card-title>
                            <longpress
                            duration="3"
                            :on-confirm="this.del"
                            pressing-text="Delete in {$rcounter} second"
                            action-text="Deleting…">{{device.device_name}}
                            </longpress>
                        </v-card-title>
                        <v-card-text>
                            Token：<br>
                            {{device.token}}
                        </v-card-text>

                        <!-- カテゴリー情報だお -->
                        <v-icon v-if="log[0]" class="icon">{{log[log.length - 1].state ? category[0].open_icon : category[0].close_icon }}</v-icon>
                        <v-icon v-else-if="log[0] == null && category[0]" class="icon">{{category[0].close_icon}}</v-icon>
                        <v-icon v-else class="icon">mdi-help</v-icon>
                        <v-card-text v-if="category[0]">
                        <v-btn rounded small @click="categoryAdd">Category</v-btn>： 
                        <v-chip class="cate mx-1" v-for="cate in category" :key="cate.id">{{ cate.category_name }}</v-chip>
                        </v-card-text>
                        <v-card-text v-else>Category：Notset</v-card-text>
                    </v-card>

                </v-col>

                <v-col cols="12" md="5">

                    <!-- ログ情報だお -->
                    <v-card class="mb-5" v-for="log in log.slice().reverse()" :key="log.id">
                        <v-card-title> {{log.created_at}} </v-card-title>
                        <v-card-text>
                            {{log.state ? "OPEN" : "CLOSE" }}
                            <span v-if="log.state" style="float: right;"><v-icon color="blue">mdi-checkbox-blank-circle</v-icon></span>
                            <span v-else style="float: right;"><v-icon color="red">mdi-checkbox-blank-circle</v-icon></span>
                        </v-card-text>
                    </v-card>

                </v-col>

            </v-row>
        </v-container>
    </v-app>
</template>

<script>
    import CategoryAdd from '@/components/CategoryAdd.vue'
    import axios from 'axios'
    import Longpress from 'vue-longpress';

    export default {
        name: 'DeviceDetail',
        components: {
            CategoryAdd,
            Longpress,
        },
        data:()=>({
            showToken: false,
        }),
        methods:{
            categoryAdd(){
                this.$store.state.category.addFlag = true
            },
            del(){
                axios
                .post("/api/devices/" + this.$route.query.id)
                .then(() => {
                    this.$router.go(this.$router.push('/device'));
                })
                .catch(error => {
                    console.log(error);
                });
            }
        },
        computed: {

            device(){
                return this.$store.state.device.devices[0]
            },
            
            log(){
                return this.$store.state.log.logs
            },

            category(){
                return this.$store.state.category.category
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
            this.$store.dispatch('device/getDevice', this.$route.query.id)
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
        padding: 30px;
    }
    .icon{
        font-size: 300px;
        margin-top: 10px;
        display: flex;
        justify-content: center;
        overflow: hidden;
    }
</style>