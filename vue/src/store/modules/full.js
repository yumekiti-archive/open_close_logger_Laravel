export default {
    namespaced:true,
    state: {
        full: [],
        //検索
        keyword: '',
        //ソート
        sort: 0,
    },
    mutations: {
        set: (state, response) => {
            state.full = response.data;
        },
    },
    getters:{
    },
    actions: {
        get({ commit }){
            var url = "full"
            commit('set', this.$store.dispatch('get', url));
        },
    },
}