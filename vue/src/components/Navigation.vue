<template>
    <v-navigation-drawer
    v-model="$store.state.nav"
    temporary
    app
    >
    <!-- appで固定 -->
        <v-list>
            <v-list-item>
                <v-list-item-content>
                    <v-list-item-title class="text-h6">
                        OCLogger
                    </v-list-item-title>
                    <v-list-item-subtitle>
                        User：{{this.user.name}}
                    </v-list-item-subtitle>
                </v-list-item-content>
            </v-list-item>

            <v-list-item-group v-model="group">
                <v-list-item v-for="(item, index) in items" :key="index" :to="item.url">
                    <v-icon>{{item.icon}}</v-icon>
                    <v-list-item-title class="text-center">{{item.title}}</v-list-item-title>
                </v-list-item>
            </v-list-item-group>
        </v-list>
    </v-navigation-drawer>
</template>

<script>
    export default {
        name: 'Navigation',
        data: () => ({
            group: null,
            items:[
                { title: "Device", icon: "mdi-access-point", url: "/device" },
                { title: "Category", icon: "mdi-tag-multiple-outline", url: "/category" },
                // { title: "Statistics", icon: "mdi-chart-timeline-variant", url: "/" },
                { title: "Login", icon: "mdi-login", url: "/login" },
                { title: "Logout", icon: "mdi-logout", url: "/logout" },
            ]
        }),
        computed: {
            user(){
                return this.$store.state.user.user
            },
        },
        created() {
            this.$store.dispatch('user/getUser')
        }
    }
</script>
