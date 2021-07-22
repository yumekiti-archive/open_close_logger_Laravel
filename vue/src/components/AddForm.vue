<template>
    <v-container class="container">
        <v-row class="row">
            <v-col cols="12" md="6">
                <v-card class="mx-auto mt-5">

                    <v-card-title class="mx-auto mt-5">
                        <h1 class="display-1">Add</h1>
                    </v-card-title>
                    
                    <v-card-text>
                        <v-form>
                            <v-text-field
                                prepend-icon="mdi-account"
                                label="Name"
                                v-model="name"
                            />
                            <v-text-field
                                prepend-icon="mdi-account-circle"
                                label="Email"
                                v-model="email"
                            />
                            <v-text-field
                                v-bind:type="showPassword ? 'text' : 'password'"
                                @click:append="showPassword = !showPassword"
                                prepend-icon="mdi-lock" 
                                v-bind:append-icon="showPassword ? 'mdi-eye' : 'mdi-eye-off'"
                                label="Password"
                                v-model="password"
                            />

                            <v-card-actions>
                                <v-btn class="info" @click="add">add</v-btn>
                            </v-card-actions>

                        </v-form>
                    </v-card-text>
                    
                </v-card>
            </v-col>
        </v-row>
    </v-container>
</template>

<script>
    import axios from 'axios';

    export default {
        name: 'AddForm',
        data: ()=>({
            showPassword: false,

            name: null,
            email: null,
            password: null,
        }),
        methods:{
            async add(){
                let data = new FormData();
                data.append("name", this.name);
                data.append("email", this.email);
                data.append("password", this.password);
                
                await axios.get('/api/csrf-cookie').then(() => {
                    axios
                    .post("/api/add", data)
                    .then(() => {
                        this.$router.go(this.$router.push('/login'));
                    })
                    .catch(error => {
                        console.log(error);
                    });
                });
            }
        },
    }
</script>

<style scoped>
    .container{
        margin: auto;
    }
    .row{
        display: flex;
        justify-content: center;
        margin-bottom: 10%;
    }
</style>