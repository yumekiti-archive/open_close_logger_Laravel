import Vue from 'vue'
import VueRouter from 'vue-router'
import Home from '../views/Home.vue'
import Login from '../views/Login.vue'
import Logout from '../views/Logout.vue'
import Device from '../views/Device.vue'
import DeviceDetail from '../views/DeviceDetail.vue'
import Category from '../views/Category.vue'
import Add from '../views/Add.vue'

Vue.use(VueRouter)

const routes = [
  {
    path: '/',
    name: 'Home',
    component: Home,
    beforeEnter: (to, from, next) => {
      next('/login');
    }
  },
  {
    path: '/login',
    name: 'Login',
    component: Login
  },
  {
    path: '/logout',
    name: 'Logout',
    component: Logout,
    beforeEnter: (to, from, next) => {
      next('/login');
    }
  },
  {
    path: '/device',
    name: 'Device',
    component: Device,
    beforeEnter: (to, from, next) => {
      next('/login');
    }
  },
  {
    path: '/device/detail',
    name: 'DeviceDetail',
    component: DeviceDetail,
    beforeEnter: (to, from, next) => {
      next('/login');
    }
  },
  {
    path: '/category',
    name: 'Category',
    component: Category,
    beforeEnter: (to, from, next) => {
      next('/login');
    }
  },
  {
    path: '/add',
    name: 'Add',
    component: Add
  },
  {
    path: '/about',
    name: 'About',
    // route level code-splitting
    // this generates a separate chunk (about.[hash].js) for this route
    // which is lazy-loaded when the route is visited.
    component: () => import(/* webpackChunkName: "about" */ '../views/About.vue'),
    beforeEnter: (to, from, next) => {
      next('/login');
    }
  }
]

const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  routes
})

export default router
