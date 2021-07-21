<template>
    <div>
        <CategoryCreate v-if="$store.state.category.addFlag" />
        <v-data-table
        :headers="headers"
        :items="categories"
        :items-per-page="10"
        ></v-data-table>
    </div>
</template>
<script>
    import CategoryCreate from '@/components/CategoryCreate.vue'

    export default {
        name: 'Categories',
        components:{
            CategoryCreate,
        },
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