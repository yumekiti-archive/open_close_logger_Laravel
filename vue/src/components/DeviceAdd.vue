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
                            
                            <v-row justify="center">
                                <v-spacer>
                                    <v-text-field label="Name" prepend-icon="mdi-briefcase" v-model="name" />
                                </v-spacer>
                            </v-row>

                            <v-row justify="center">
                                <v-spacer class="mx-auto">
                                    <v-select label="Category" v-model="category" />
                                    <!-- <v-select label="カテゴリー" v-model=" " item-text="name" item-value="id" :items="this.$store.state.box.boxes" /> -->
                                </v-spacer>
                            </v-row>

                        </v-container>
                    </v-card-text>

                    <v-card-actions>
                        <v-container>
                            <v-btn block dark>ADD</v-btn>
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
            dialog: false,
            name: '',
            category: null,
        }),
        methods:{
            itemAdd() {
                let data = new FormData();
                data.append("name", this.name);
                data.append("category_id", this.categoryId);
                axios
                .post("/api/items", {
                    "name": this.name
                })
                .then(() => {
                    this.$store.dispatch('item/getItems')
                    this.$store.state.device.addFlag = false;
                })
                .catch(error => {
                    console.log(error);
                });
            },
        },
    }
</script>

<style scoped>
    .modal-window{
        position:fixed;
    }
</style>