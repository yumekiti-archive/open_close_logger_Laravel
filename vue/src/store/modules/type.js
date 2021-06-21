import axios from 'axios';

export default {
    namespaced:true,
    state: {
        types: [],
    },
    mutations: {
        setTypes: (state, response) => {
            state.types = response.data;
        },
    },
    getters:{
    },
    actions: {
        async getType({ commit }, id){
            await axios
            .get('/api/types/' + id)
            .then( response =>{
                commit('setTypes', response);
            })
            .catch(error => {
                console.log(error);
            });
        },
        async getTypes({ commit }){
            await axios
            .get('/api/types/')
            .then( response =>{
                commit('setTypes', response);
            })
            .catch(error => {
                console.log(error);
            });
        },
    },
}