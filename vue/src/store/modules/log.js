import axios from 'axios';

export default {
    namespaced:true,
    state: {
        logs: [],
    },
    mutations: {
        setLogs: (state, response) => {
            state.logs = response.data;
        },
    },
    getters:{
    },
    actions: {
        async getLogs({ commit }, id){
            await axios
            .get('/api/logs/' + id)
            .then( response =>{
                commit('setLogs', response);
            })
            .catch(error => {
                console.log(error);
            });
        }
    },
}