<template>
    <v-app class="modal-window">
        <v-dialog v-model="$store.state.device.addFlag" max-width="600px">

            <v-card>

                <v-card-title>
                    <span class="headline">Add</span>
                    <v-spacer></v-spacer>
                    <v-btn icon @click="$store.state.device.addFlag = false">
                    <v-icon>mdi-close</v-icon>
                    </v-btn>
                </v-card-title>

                <form>

                    <v-card-text>
                        <v-container>
                            
                            <!-- 名前入力欄 -->
                            <v-row justify="center">
                                <v-spacer>
                                    <v-text-field label="Name" prepend-icon="mdi-access-point" v-model="name" />
                                </v-spacer>
                            </v-row>

                            <!-- カテゴリー入力欄 -->
                            <v-row justify="center">
                                <v-spacer class="mx-auto">
                                    <v-select label="Category" prepend-icon="mdi-label-outline" v-model="category" item-text="category_name" item-value="id" :items="this.$store.state.category.categories" />
                                </v-spacer>
                            </v-row>

                        </v-container>
                    </v-card-text>

                    <v-card-actions>
                        <v-container>
                            <v-btn @click="itemAdd" block dark>ADD</v-btn>
                        </v-container>
                    </v-card-actions>

                </form>

            </v-card>
        </v-dialog>
    </v-app>
</template>

<script>
    import axios from 'axios';

    export default {
        name: 'DeviceAdd',
        data: () => ({
            name: '',
            category: null,
        }),
        methods:{
            itemAdd() {
                axios
                .post("/api/devices", {
                    "device_name": this.name,
                    "id": this.category,
                })
                .then(() => {
                    this.$store.dispatch('device/getDevices')
                    this.$store.dispatch('category/getDeviceCategories')
                    this.$store.state.device.addFlag = false;
                })
                .catch(error => {
                    console.log(error);
                });
            },
        },
        created(){
            this.$store.dispatch('category/getCategories')
        },
    }
</script>

<style scoped>
    .modal-window{
        position:fixed;
    }
</style>