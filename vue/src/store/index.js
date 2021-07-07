import Vue from 'vue'
import Vuex from 'vuex'

import device from '@/store/modules/device.js'
import log from '@/store/modules/log.js'
import category from '@/store/modules/category.js'
import user from '@/store/modules/user.js'
import full from '@/store/modules/full.js'
import string from '@/store/modules/string.js'

import axios from 'axios';

Vue.use(Vuex)

export default new Vuex.Store({
    state: {
        nav: false,
        search: false,
    },
    mutations: {
    },
    actions: {
    },
    modules: {

        async get(url){
            await axios
            .get('/api/' + url)
            .then( response =>{
                return response
            })
            .catch(error => {
                console.log(error);
            });
        },

        user,
        device,
        log,
        category,
        full,
        string,
    }
})
