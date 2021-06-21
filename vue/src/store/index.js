import Vue from 'vue'
import Vuex from 'vuex'

import device from '@/store/modules/device.js'
import log from '@/store/modules/log.js'
import type from '@/store/modules/type.js'
import user from '@/store/modules/user.js'
import full from '@/store/modules/full.js'

Vue.use(Vuex)

export default new Vuex.Store({
    state: {
        nav: false,
    },
    mutations: {
    },
    actions: {
    },
    modules: {
        user,
        device,
        log,
        type,
        full,
    }
})
