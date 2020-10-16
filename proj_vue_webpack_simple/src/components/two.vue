<template>
  <div>
    <p>{{msg}}</p>
  </div>
</template>
<script>
export default {
  data:()=>{
    return {
      msg: "Component 2"
    }
  }
}
</script>
<style lang="scss" scoped>
div {
  display: grid;
  background-color: #aa66aa;
  color: #440044;
}
</style>