import axios from 'axios';

export default {
    namespaced:true,
    state: {
        auth: localStorage.getItem('auth'),
        user: [],
    },
    mutations: {
        setUser: (state, response) => {
            state.user = response.data;
        },
    },
    getters:{
    },
    actions: {
        async getUser({ commit }){
            await axios
            .get('/api/user')
            .then( response =>{
                commit('setUser', response);
            })
            .catch(error => {
                console.log(error);
            });
        },
    },
}