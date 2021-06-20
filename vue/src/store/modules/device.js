import axios from 'axios';

export default {
    namespaced:true,
    state: {
        devices: [],
        //検索
        keyword: '',
        //ソート
        sort: 0,
    },
    mutations: {
        setDevices: (state, response) => {
            state.devices = response.data;
        },
    },
    getters:{
    },
    actions: {
        async getDevices({ commit }){
            await axios
            .get('/api/devices')
            .then( response =>{
                commit('setDevices', response);
            })
            .catch(error => {
                console.log(error);
            });
        }
    },
}