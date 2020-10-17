<template>
  <div>
    <p>{{msg}}: {{url_msg}}</p>
  </div>
</template>
<script>
export default {
  data:()=>{
    return {
      msg: "Component 1"
    }
  },
  computed: {
    url_msg:function(){
      return this.$route.params.msg; 
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