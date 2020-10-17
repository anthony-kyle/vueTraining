import Vue from 'vue'
import VueRouter from 'vue-router'

import one from '../components/one.vue';
import two from '../components/two.vue';
import three from '../components/three.vue';

Vue.use(VueRouter)
const routes = [
  {
    name: 'root',
    path:'/',
    redirect:{
      name: 'first',
      params: {
        msg: 'Welcome'
      }
    }
  },
  {
    name: 'first',
    path: '/comp_one/:msg',
    component:one
  },
  {
    name: 'second',
    path: '/comp_two/:msg',
    component:two
  },
  {
    name: 'third',
    path: '/comp_three/:msg',
    component:three
  }
]

export default new VueRouter({routes})