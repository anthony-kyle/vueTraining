<template>
  <div id="product_list">
    <p>Price List</p>
    <ul>
      <li v-for="item in products" v-bind:key="'product' + item.product">
        <b>{{ item.product }}</b> @ $<i>{{ item.price }}</i
        >/KG
        <button @click="edit_this_price(true, item)">Up</button>
        <button @click="edit_this_price(false, item)">Down</button>
      </li>
    </ul>
    <button @click="edit_all_price(true)">All Up</button>
    <button @click="edit_all_price(false)">All Down</button>
  </div>
</template>

<script>
import {mapState, mapMutations, mapActions} from 'vuex'
export default {
  data: function () {
    return {margin: 0.5}
  },
  computed: {
    ...mapState([
      'products'
    ])
  },
  methods: {
    ...mapMutations([
      'mutate_all_prices'
    ]),
    ...mapActions([
      'action_single_price'
    ]),
    edit_this_price(direction, item){
     this.action_single_price([direction, this.margin, item])
    //  this.$store.dispatch('action_single_price', [direction, this.margin, item])
    },
    edit_all_price(direction){
      this.mutate_all_prices([direction, this.margin])
      // this.$store.commit('mutate_all_prices', [direction, this.margin])
    }
  }
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
  font-family: Verdana, sans-serif;
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
button {
  position: relative;
  top: 0px;
  left: 0px;
  font-size: 0.8em;
  font-family: inherit;
  padding: 0.2em;
  margin: 0 0.5em 0 0;
  border-radius: 0.5em;
  background-color: white;
  border: solid 2px red;
  box-shadow: 1px 1px 2px #343434;
  transition: top 0.2s, left 0.2s, box-shadow 0.2s;

  &:hover {
    top: -1px;
    left: -1px;
    opacity: 0.6;
    box-shadow: 2px 2px 4px #343434;
  }

  &:active {
    top: 1px;
    left: 1px;
    opacity: 0.6;
    box-shadow: 0px 0px 4px #343434;
  }

  &:focus {
    outline: none;
  }
}
</style>
