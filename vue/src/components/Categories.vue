<template>
    <v-data-table
    :headers="headers"
    :items="categories"
    :items-per-page="10"
    class="elevation-1"
    ></v-data-table>
</template>
<script>
    export default {
        name: 'Categories',
        data () {
            return {
                headers: [
                {
                    text: 'name',
                    align: 'center',
                    sortable: false,
                    value: 'category_name',
                },
                    { text: 'close_icon', value: 'open_icon' },
                    { text: 'close_icon', value: 'close_icon' },
                ],
                search: '',
            }
        },
        computed: {
            categories(){
                return this.$store.state.category.categories.filter((v1, i1, a1) => {
                    return a1.findIndex(v => v1.id === v.id) === i1
                })
            },
        },
        created() {
            //取得
            this.$store.dispatch('category/getCategories')
        },
    }
</script>