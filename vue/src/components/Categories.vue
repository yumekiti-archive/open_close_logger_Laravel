<template>
<v-card>
    {{full}}
</v-card>
</template>
<script>
    export default {
        name: 'Categories',
        data () {
            return {
                search: '',
            }
        },
        computed: {
            full() {
                return this.$store.state.full.full
            }
        },
        created() {
            //取得
            this.$store.dispatch('full/get')
        },
    }
</script>