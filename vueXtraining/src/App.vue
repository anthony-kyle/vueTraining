<template>
  <div id="app">
    <product_list></product_list>
    <sale_product_list></sale_product_list>
  </div>
</template>

<script>
import product_list from './components/product_list.vue'
import sale_product_list from './components/sale_product_list.vue'

export default {
  name: 'app',
  components: {
    product_list: product_list,
    sale_product_list: sale_product_list
  },
  data () {
    return {}
  },
  computed: {}
}
</script>
