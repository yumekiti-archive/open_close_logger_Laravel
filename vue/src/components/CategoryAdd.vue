<template>
    <v-app class="modal-window">
        <v-dialog v-model="$store.state.category.addFlag" max-width="600px">

            <v-card>

                <v-card-title>
                    <span class="headline">Add</span>
                    <v-spacer></v-spacer>
                    <v-btn icon @click="$store.state.category.addFlag = false">
                    <v-icon>mdi-close</v-icon>
                    </v-btn>
                </v-card-title>

                <form>

                    <v-card-text>
                        <v-container>

                            <!-- カテゴリー入力欄 -->
                            <v-row justify="center" v-if="this.category">
                                <v-select v-model="id" item-text="category_name" item-value="id" :items="this.category" chips label="Category" multiple ></v-select>
                            </v-row>

                        </v-container>
                    </v-card-text>

                    <v-card-actions>
                        <v-container>
                            <v-btn @click="categoryAdd" block dark>ADD</v-btn>
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
            id: null,
        }),
        computed: {
            category(){
                let data = [null]
                data = []

                let array1 = [null]
                let array2 = [null]

                for(let i in this.$store.state.category.categories){
                    array1[i] = this.$store.state.category.categories[i].id
                }
                for(let j in this.$store.state.category.category){
                    array2[j] = this.$store.state.category.category[j].id
                }

                let array3 = array1.filter(i => array2.indexOf(i) == -1)

                for(let i in array3){
                    if(parseInt(array3[i]) && parseInt(array3[i]) > 0){
                        data[i] = this.$store.state.category.categories[parseInt(--array3[i])]
                    }
                }

                return data
            }
        },
        methods:{
            categoryAdd() {
                axios
                .post("/api/categories/" + this.$route.query.id, {
                    "id": this.id,
                })
                .then(() => {
                    this.$store.dispatch('category/getCategory', this.$route.query.id)
                    this.$store.state.category.addFlag = false;
                })
                .catch(error => {
                    console.log(error);
                });
            },
        },
        created() {
            this.$store.dispatch('category/getCategories')
            this.$store.dispatch('category/getCategory', this.$route.query.id)
        }
    }
</script>

<style scoped>
    .modal-window{
        position:fixed;
    }
</style>