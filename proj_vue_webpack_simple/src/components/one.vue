<template>
  <div>
    <p>{{msg}}</p>
  </div>
</template>
<script>
export default {
  data:()=>{
    return {
      msg: "Component 1"
    }
  }
}
</script>
<style lang="scss" scoped>
div {
  display: grid;
  background-color: #66aaaa;
  color: #004444;
}
</style>