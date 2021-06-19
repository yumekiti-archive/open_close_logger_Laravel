<template>
    <v-app>
        <v-container>
            <v-row>

                <v-col class="card-col" cols="6" sm="4" v-for="item in items" :key="item.id">

                    <v-card class="card" :to="{name: 'DeviceDetail', query: {id: item.id}}">

                        <v-icon class="card-icon">mdi-lock-open-variant-outline</v-icon>

                        <!--タイトルだよ-->
                        <v-card-title> {{item.name}} </v-card-title>

                        <!--サブタイトルだよ-->
                        <v-card-subtitle> {{item.state}} </v-card-subtitle>

                    </v-card>

                </v-col>

            </v-row>

        </v-container>
    </v-app>
</template>

<script>
    export default {
        name: 'Device',
        data:()=>({
            items:[
                { name: "test", state: "false" },
                { name: "test", state: "false" },
                { name: "test", state: "false" },
                { name: "test", state: "false" },
                { name: "test", state: "false" },
            ],
        }),
    }
</script>

<style scoped>

    .card-col{
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