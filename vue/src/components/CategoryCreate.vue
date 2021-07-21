<template>
    <v-app class="modal-window">
        <v-dialog v-model="$store.state.category.addFlag" max-width="600px">

            <v-card>

                <v-card-title>
                    <span class="headline">CREATE</span>
                    <v-spacer></v-spacer>
                    <v-btn icon @click="$store.state.category.addFlag = false">
                    <v-icon>mdi-close</v-icon>
                    </v-btn>
                </v-card-title>

                <form>

                    <v-card-text>
                        <v-container>

                            <!-- カテゴリー入力欄 -->
                            <v-row justify="center">
                                <v-col cols="12">
                                    <v-text-field
                                        v-model="name"
                                        label="name"
                                        clearable
                                    ></v-text-field>
                                </v-col>
                                <v-col cols="12">
                                    <v-text-field
                                        v-model="open"
                                        label="open"
                                        clearable
                                    ></v-text-field>
                                </v-col>
                                <v-col cols="12">
                                    <v-text-field
                                        v-model="close"
                                        label="close"
                                        clearable
                                    ></v-text-field>
                                </v-col>
                            </v-row>

                        </v-container>
                    </v-card-text>

                    <v-card-actions>
                        <v-container>
                            <v-btn @click="categoryCreate" block dark>CREATE</v-btn>
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
        name: 'CategoryCreate',
        data: () => ({
            name: '',
            open: '',
            close: '',
        }),
        methods:{
            categoryCreate() {
                axios
                .post("/api/categories", {
                    'category_name': this.name,
                    'open_icon': 'mdi-' + this.open,
                    'close_icon': 'mdi-' + this.close,
                })
                .then(() => {
                    this.$store.dispatch('category/getCategories')
                    this.$store.state.category.addFlag = false;
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