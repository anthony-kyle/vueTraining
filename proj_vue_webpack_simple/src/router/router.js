import Vue from 'vue'
import VueRouter from 'vue-router'

const one = () => import('../components/one.vue');
const two = () => import('../components/two.vue');
const three = () => import('../components/three.vue');
const child = () => import('../components/child.vue');

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
    component:one,
    children: [
      {
        path: 'child',
        component: child
      }
    ],
    
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