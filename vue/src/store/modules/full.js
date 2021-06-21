import axios from 'axios';

export default {
    namespaced:true,
    state: {
        full: [],
        flag: true,
        //検索
        keyword: '',
        //ソート
        sort: 0,
    },
    mutations: {
        setFull: (state, response) => {
            state.full = response.data;
            var data = localStorage.getItem('full');
            if(data){
                state.full = JSON.parse(data);
            }
            state.flag = false;
        },
        updateFull:(state, value) => {
            state.full = value;
            localStorage.setItem("full", JSON.stringify(value));
        },
    },
    getters:{
    },
    actions: {
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