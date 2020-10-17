<template>
  <nav>
    <ul>
      <li><router-link :to="{ name: 'first', params: {msg: 'Hello'} }">1</router-link></li>
      <li><router-link :to="{ name: 'first', params: {msg: 'Bye'} }">1</router-link></li>
      <li><router-link :to="{ name: 'second' }">2</router-link></li>
      <li><router-link :to="{ name: 'third' }">3</router-link></li>
    </ul>
  </nav>
</template>
<script>
export default {
  data: () => {
    return {}
  }
}
</script>
<style lang="scss" scoped>
nav {
  display: grid;
  ul {
    li {
      a {
        padding: 0.5em;
        display: block;
        width: 1.2em;
        height: 1.2em;
        border-radius: 50%;
        background-color: #3f003f;
        color: white;
        font-weight: bold;
        text-decoration: none;
        font-size: 2em;
        line-height: 1.2em;
      }
    }
  }
}
</style>
