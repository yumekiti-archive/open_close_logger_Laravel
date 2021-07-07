<template>
  <v-card>
    <p>{{this.$store.state.string.en.device.test}}</p>
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
  }
</script>