<template>
  <div id="app">
    <comp></comp>
  </div>
</template>

<script>
import comp from './components/comp.vue'

export default {
  name: 'app',
  components: {
    comp: comp
  },
  data () {
    return {}
  },
  computed: {}
}
</script>

<style lang="scss">
  * {
    font-family: Verdana, sans-serif;
  }
</style>