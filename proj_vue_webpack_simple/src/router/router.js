import Vue from 'vue'
import VueRouter from 'vue-router'

import one from '../components/one.vue';
import two from '../components/two.vue';
import three from '../components/three.vue';

Vue.use(VueRouter)
const routes = [
  {
    name: 'first',
    path: '/comp_one',
    component:one
  },
  {
    name: 'second',
    path: '/comp_two',
    component:two
  },
  {
    name: 'third',
    path: '/comp_three',
    component:three
  }
]

export default new VueRouter({routes})