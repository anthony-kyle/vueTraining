import vue from 'vue'
import vuex from 'vuex'

vue.use(vuex)

const store = {
  state: {
    products: [
      { product: 'Blueberry', price: 5 },
      { product: 'Peach', price: 4 },
      { product: 'Rhubarb', price: 6 },
      { product: 'Orange', price: 3 }
    ]
  },
  getters: {
    sale_product_list: state => {
      return state.products.map(item => {
        return {
          product: item.product,
          price: item.price / 2
        }
      })
    }
  },
  mutations: {},
  actions: {}
}

export default new vuex.Store(store)
