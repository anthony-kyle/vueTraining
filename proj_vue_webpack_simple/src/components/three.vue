<template>
  <div>
    <p>{{msg}}</p>
  </div>
</template>
<script>
export default {
  data:()=>{
    return {
      msg: "Component 3"
    }
  }
}
</script>
<style lang="scss" scoped>
div {
  display: grid;
  background-color: #aaaa66;
  color: #444400;
}
</style>