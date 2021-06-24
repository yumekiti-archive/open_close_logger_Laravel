import axios from 'axios';

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
        setFull: (state, response) => {
            state.full = response.data;
        },
        updateFull:(state, value) => {
            //ここでPOSTする
            state.full = value;
        },
    },
    getters:{
    },
    actions: {
        async getFull({ commit }){
            await axios
            .get('/api/devices')
            .then( response =>{
                commit('setFull', response);
            })
            .catch(error => {
                console.log(error);
            });
        },
    },
}