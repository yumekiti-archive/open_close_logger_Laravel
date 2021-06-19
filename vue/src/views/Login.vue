<template>
    <v-app>
        <LoginForm />
    </v-app>
</template>

<script>
    import LoginForm from '@/components/LoginForm.vue'

    export default {
        name: 'Login',
        components:{
            LoginForm,
        }
    }
</script>
