<template>
    <v-navigation-drawer
    v-model="$store.state.nav"
    app
    left
    temporary
    >
    <!-- appで固定 -->
        <v-list>
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
                { title: "デバイス", icon: "mdi-access-point", url: "/device" },
                { title: "統計", icon: "mdi-chart-timeline-variant", url: "/" },
                { title: "ログイン", icon: "mdi-login", url: "/login" },
                { title: "ログアウト", icon: "mdi-logout", url: "/" },
            ]
        }),

        watch: {
            group () {
                this.$store.state.nav = false
            },
        },
    }
</script>
