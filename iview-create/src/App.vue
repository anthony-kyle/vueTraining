<template>
<img alt="Vue logo" src="./assets/logo.png">
<Icon type="ios-umbrella"></Icon>
<HelloWorld msg="Welcome to Your Vue.js App" />
</template>

<script>
import HelloWorld from './components/HelloWorld.vue'
import {
  Icon
} from 'iview'

export default {
  name: 'App',
  components: {
    Icon,
    HelloWorld
  }
}
</script>

<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}
</style>
