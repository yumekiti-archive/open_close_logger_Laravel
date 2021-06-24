import axios from 'axios';

export default {
    namespaced:true,
    state: {
        devices: [],
        addFlag: false,
    },
    mutations: {
        setDevices: (state, response) => {
            state.devices = response.data;
        },
    },
    getters:{
    },
    actions: {
        async getDevices({ commit }, id){
            await axios
            .get('/api/devices/' + id)
            .then( response =>{
                commit('setDevices', response);
            })
            .catch(error => {
                console.log(error);
            });
        },
    },
}