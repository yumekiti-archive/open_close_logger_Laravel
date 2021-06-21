<template>
    <div>
    </div>
</template>
<script>
    import axios from 'axios';

    export default {
        name: 'Logout',
        async created(){
            await axios
            .post("/api/logout")
            .then(() => {
                localStorage.clear();
                this.$router.go(this.$router.push("/login"));
            })
            .catch(error => {
                console.log(error);
            });
        },
    }
</script>