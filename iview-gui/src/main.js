import Vue from 'vue'
import App from './App.vue'
import router from './router'
import store from './store'

import {locale, Icon, Button, ButtonGroup, Switch, Slider, Message, Table, Carousel, CarouselItem, Progress, Upload} from 'iview'
import language from 'iview/dist/locale/en-US'
locale(language)
// import 'iview/dist/styles/iview.css'
import './theme.less'

Vue.component('Icon', Icon)
Vue.component('Button', Button)
Vue.component('ButtonGroup', ButtonGroup)
Vue.component('i-Switch', Switch)
Vue.component('Slider', Slider)
Vue.component('Table', Table)
Vue.component('Carousel', Carousel)
Vue.component('CarouselItem', CarouselItem)
Vue.component('Progress', Progress)
Vue.component('Upload', Upload)


Vue.prototype.$Message = Message

Vue.config.productionTip = false

new Vue({
  router,
  store,
  render: h => h(App)
}).$mount('#app')
