<template>
  <div>
    <i>{{msg}}</i>
  </div>
</template>
<script>
export default {
  data:()=>{
    return {
      msg: 'Child Comp'
    }
  }
}
</script>
<style lang="scss" scoped>
  div {
    padding: 10px; 
    background: #CC3333;
    text-align: center;
    font-size: 44px;
    color: #FFFFCC;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    border: dashed 2px white;
  }
</style>