<template>
  <div id="app">
    <masthead></masthead>
    <navi></navi>
    <router-view></router-view>
    <router-view name="child"></router-view>
    <foot></foot>
  </div>
</template>

<script>
import masthead from './components/header.vue';
import foot from './components/footer.vue';
import navi from './components/nav.vue';

export default {
  components:{
    masthead,
    navi,
    foot
  }
}
</script>

<style lang="scss">
body {
  padding: 0px;
  margin: 0px;
}
#app {
  font-family: 'Avenir', Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  padding:0px;
  margin: 0px;
  display: grid;
}

h1, h2 {
  font-weight: normal;
}

ul {
  list-style-type: none;
  padding: 0;
}

li {
  display: inline-block;
  margin: 0 10px;
}

a {
  color: #42b983;

  &:hover {
    opacity: 0.8;
    text-shadow: 1px 1px 2px rgba(44, 62, 80, 0.2);
  }
}
</style>
