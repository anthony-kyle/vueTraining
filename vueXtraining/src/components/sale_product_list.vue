<template>
  <div id="sale_product_list">
    <p>Sale Price List</p>
    <ul>
      <li v-for="item in sale" v-bind:key="'sale' + item.product">
        <b>{{ item.product }}</b> @ $<i>{{ item.price }}</i
        >/KG
      </li>
    </ul>
  </div>
</template>

<script>
import { mapGetters } from 'vuex'
export default {
  data: function () {
    return {}
  },
  computed: {
    ...mapGetters({
      sale: 'sale_products'
    })
  },
  methods: {}
}
</script>

<style lang="scss" scoped>
* {
  margin: 0;
  padding: 0;
}
#sale_product_list {
  border: solid 2px blue;
  margin: 10px;
  padding: 10px;
}
p {
  font-size: 35px;
  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  color: white;
  background-color: blue;
}
ul {
  list-style: none;
}
li {
  font-size: 25px;
  line-height: 40px;
}
</style>
