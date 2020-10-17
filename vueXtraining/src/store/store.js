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
    sale_products: state => {
      return state.products.map(item => {
        return {
          product: item.product,
          price: item.price / 2
        }
      })
    }
  },
  mutations: {
    mutate_single_price(state, argument){
      if(argument[0]){
        argument[2].price += argument[1]
      }else{
        argument[2].price -= argument[1]
      }
      
    },
    mutate_all_prices(state, argument){
      if (argument[0]){
        state.products.forEach(product => {
          product.price += argument[1]
        })
      } else {
        state.products.forEach(product => {
          product.price -= argument[1]
        })
      }
    }
  },
  actions: {
    action_single_price(context, argument){
      setTimeout(()=>{
        context.commit('mutate_single_price', argument)
      }, 3000)
    }
  }
}

export default new vuex.Store(store)
