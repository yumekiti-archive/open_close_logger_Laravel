import axios from 'axios';

export default {
    namespaced:true,
    state: {
        categories: [],
        category: [],
        addFlag: false,
    },
    mutations: {
        setCategories: (state, response) => {
            state.categories = response.data;
        },
        setCategory: (state, response) => {
            state.category = response.data;
        },
    },
    getters:{
    },
    actions: {
        async getCategory({ commit }, id){
            await axios
            .get('/api/categories/' + id)
            .then( response =>{
                commit('setCategory', response);
            })
            .catch(error => {
                console.log(error);
            });
        },
        async getCategories({ commit }){
            await axios
            .get('/api/categories/')
            .then( response =>{
                commit('setCategories', response);
            })
            .catch(error => {
                console.log(error);
            });
        },
    },
}