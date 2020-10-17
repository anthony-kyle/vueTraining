<template>
  <div>
    <p>{{msg}}: {{url_msg}}</p>
    <router-view></router-view>
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
  font-size: 2em;
  background-color: #66aaaa;
  color: #004444;
  padding: 1em;
}
</style>