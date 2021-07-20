import axios from 'axios';

export default {
    namespaced:true,
    state: {
        full: [],
        
    },
    mutations: {
        set: (state, response) => {
            state.full = response.data;
        },
        update: (state, response) => {
            state.full = response.data;
        },
    },
    getters:{
    },
    actions: {
        async get({commit}){
            await axios
            .get('/api/full')
            .then( response =>{
                commit('set', response)
            })
            .catch(error => {
                console.log(error);
            });
        },
    },
}