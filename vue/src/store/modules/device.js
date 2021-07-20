import axios from 'axios';

export default {
    namespaced:true,
    state: {
        devices: [],
        addFlag: false,
    },
    mutations: {
        setDevice: (state, response) => {
            state.devices = response.data;
        },
        setDevices: (state, response) => {
            state.devices = response.data;
        },
    },
    getters:{
    },
    actions: {
        async getDevice({ commit }, id){
            await axios
            .get('/api/devices/' + id)
            .then( response =>{
                commit('setDevice', response);
            })
            .catch(error => {
                console.log(error);
            });
        },
        async getDevices({ commit }){
            await axios
            .get('/api/devices')
            .then( response =>{
                commit('setDevices', response);
            })
            .catch(error => {
                console.log(error);
            });
        },
    },
}