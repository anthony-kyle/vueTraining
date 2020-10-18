<template>
  <div id="component">
    <p><b>State Value:</b> {{ $store.state.a.info }}</p>
    <p><b>State Value:</b> {{ $store.state.b.info }}</p>
    <p><b>Getters Value:</b> {{ $store.getters['a/getter_info'] }}</p>
    <p><b>Getters Value:</b> {{ $store.getters['b/getter_info'] }}</p>
    <button @click="$store.commit('a/mutate_method')">Trigger Mutation</button>
    <button @click="$store.dispatch('b/action_method')">Trigger Action</button>
  </div>
</template>

<script>
export default {
  data: function () {
    return {}
  },
  computed:{},
  methods:{}
}
</script>

<style lang="scss" scoped>
  * {margin:0; padding: 0;}
  p{font-size: 25px; line-height: 40px; margin: 5px; padding: 5px; font-family: sans-serif;}
  button {font-size: 20px; padding: 5px; margin: 10px;}
</style>