import axios from 'axios';

export default {
    namespaced:true,
    state: {
        devices: [],
        full: [],
        //検索
        keyword: '',
        //ソート
        sort: 0,
    },
    mutations: {
        setDevices: (state, response) => {
            state.devices = response.data;
        },
        setFull: (state, response) => {
            state.full = response.data;
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
        async getFull({ commit }){
            await axios
            .get('/api/devices/')
            .then( response =>{
                commit('setFull', response);
            })
            .catch(error => {
                console.log(error);
            });
        },
    },
}