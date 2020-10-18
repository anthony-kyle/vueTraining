import vue from 'vue'
import vuex from 'vuex'

vue.use(vuex)

const module_a = {
  namespaced:true,
  state: {
    info: 'Module A: Info set in vuex state'
  },
  getters: {
    getter_info: state => 'Module A: Getter Info set in Getters'
  },
  mutations: {
    mutate_method: (state, argument) => {
      alert('Module A: Mutation...')
    }
  },
  actions: {
    action_method: (context, argument) => {
      alert('Module A: Action...')
    }
  }
}

const module_b = {
  namespaced:true,
  state: {
    info: 'Module B: Info set in vuex state'
  },
  getters: {
    getter_info: state => 'Module B: Getter Info set in Getters'
  },
  mutations: {
    mutate_method: (state, argument) => {
      alert('Module B: Mutation...')
    }
  },
  actions: {
    action_method: (context, argument) => {
      alert('Module B: Action...')
    }
  }
}

export default new vuex.Store({ modules: { a: module_a, b: module_b } })
