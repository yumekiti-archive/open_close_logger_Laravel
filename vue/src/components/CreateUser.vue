<template>
    <v-app>
        <v-container class="container">
            <v-row class="row">
                <v-col cols="12" md="6">
                    <v-card class="mx-auto mt-5">

                        <v-card-title class="mx-auto mt-5">
                            <h1 class="display-1">Login</h1>
                        </v-card-title>
                        
                        <v-card-text>
                            <v-form>


                            </v-form>
                        </v-card-text>


                    </v-card>
                </v-col>
            </v-row>
        </v-container>
    </v-app>
</template>

<script>
    import axios from 'axios';

    export default {
        name: 'Device',
        data: () => ({
            showPassword: false,

            email: null,
            password: null,
            errors: [null],
        }),
        methods:{
            async login(){
                let data = new FormData();
                data.append("email", this.email);
                data.append("password", this.password);
                
                await axios.get('/api/csrf-cookie').then(() => {
                    axios
                    .post("/api/login", data)
                    .then(() => {
                        this.$router.go(this.$router.push('/device'));
                        localStorage.setItem("auth", "ture");
                    })
                    .catch(error => {
                        this.errors = error.response.data.errors;
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