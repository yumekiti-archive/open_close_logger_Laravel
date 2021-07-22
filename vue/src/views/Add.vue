<template>
    <v-app>
        <AddForm />
    </v-app>
</template>

<script>
    import AddForm from '@/components/AddForm.vue'

    export default {
        name: 'Add',
        components:{
            AddForm,
        }
    }
</script>
