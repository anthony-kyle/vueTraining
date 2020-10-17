<template>
  <div id="product_list">
    <p>Price List</p>
    <ul>
      <li v-for='item in info' v-bind:key='"product"+item.product'>
        <b>{{ item.product }}</b> @ $<i>{{ item.price }}</i
        >/KG
      </li>
    </ul>
  </div>
</template>

<script>
export default {
  data: function () {
    return {}
  },
  computed: {
    info: function(){
      return this.$store.state.products
    }
  },
  methods: {}
}
</script>

<style lang="scss" scoped>
* {
  margin: 0;
  padding: 0;
}
#product_list {
  border: solid 2px red;
  margin: 10px;
  padding: 10px;
}
p {
  font-size: 35px;
  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  color: white;
  background-color: red;
}
ul {
  list-style: none;
}
li {
  font-size: 25px;
  line-height: 40px;
}
</style>
