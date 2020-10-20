<template>
<div id="app">
  <Icon type="ios-checkmark" size="50" color="rgba(99,16,33,1)" />
  <Icon type="ios-umbrella" size="50" color="rgba(99,16,33,0.5)" />

  <Button type="primary" size="large" shape="circle" icon="ios-umbrella">Is a Button</Button>

  <Button type="primary" :loading="loading_control" size="default" shape="circle" icon="ios-umbrella">Is a Button</Button>

  <Button type="primary" size="small" icon="ios-umbrella" v-bind:disabled=button_switch>Is a Button</Button>

  <ButtonGroup :vertical=vertical>
    <Button type="primary">Primary</Button>
    <Button type="warning">warning</Button>
    <Button type="success">success</Button>
    <Button type="error">error</Button>
    <Button type="dashed">dashed</Button>
  </ButtonGroup>
</div>
</template>

<script>
export default {
  name: 'App',
  data() {
    return {
      button_switch: true,
      loading_control: true,
      vertical: true
    }
  }
}
</script>

<style>
body {
  padding: 2em;
}
</style>
