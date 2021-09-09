import Vue from 'vue'
import App from './App.vue'
import './registerServiceWorker'
import router from './router'
import store from './store'
import vuetify from './plugins/vuetify'
import Push from 'push.js'

Vue.config.productionTip = false

new Vue({
    router,
    store,
    vuetify,
    render: h => h(App)
}).$mount('#app')

// laravel-echo
import Echo from "laravel-echo"

window.io = require('socket.io-client');

window.Echo = new Echo({
    broadcaster: 'socket.io',
    host: window.location.host,
});

window.Echo.private('state-channel.' + localStorage.getItem('id'))
.listen('StateEvent', (data) => {

    // パラメタ取得
    var url = new URL(window.location.href);
    var params = url.searchParams;
    var id = params.get('id');

    // get log
    if(id){
        store.dispatch('log/getLogs', id)
    }else{
        store.dispatch('device/getDevices')
        store.dispatch('category/getDeviceCategories')
        store.dispatch('log/getState')
    }
    
    var state = data.log.device_id ? 'OPEN.' : 'CLOSE.'
    var notification = store.state.device.devices[(data.log.device_id - 1)].device_name + ' ' + state

    Push.create(notification)
    
});