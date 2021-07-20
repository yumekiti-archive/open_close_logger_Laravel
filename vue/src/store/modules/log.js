import axios from 'axios';

export default {
    namespaced:true,
    state: {
        logs: [],
        state: [],
    },
    mutations: {
        setLogs: (state, response) => {
            state.logs = response.data;
        },
        setState: (state, response) => {
            state.state = response.data;
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
        },
        async getState({ commit }){
            await axios
            .get('/api/state')
            .then( response =>{
                commit('setState', response);
            })
            .catch(error => {
                console.log(error);
            });
        }
    },
}