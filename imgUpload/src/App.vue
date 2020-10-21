<!--
 - App.vue
 - Main file for vue app
 - Vue version 2.5.11

 - @category Training
 - @package  custom_1
 - @author   Anthony McGrath <akm@anthonykyle.co.nz>
 - @license  MIT https://opensource.org/licenses/MIT
 - @link     http://localhost/axios/api/v1/interface.php
 -->

<template>
<div id="app">
  <p>Upload File: Images Only</p>
  <input type="file" ref="file" accept="image/*" multiple />
  <button @click="upload_multiple">Upload Multiple Images</button>
  <div v-show='progress'>
    <progress v-bind:value='progress' max='100'></progress> {{progress}}%
    <div id="progress">
      <div id="bar" ref="progress"></div>
      <div id="value">{{progress}}%</div>
    </div>
  </div>
  <ul v-if='saved.length > 0'>
    <li v-for='entry in saved' v-bind:key='"message" + entry.msg'>{{entry.msg}}</li>
  </ul>
  <ul v-if="url_list">
    <li v-for="image in url_list"><img v-bind:src="image"></li>
  </ul>
</div>
</template>

<script>
import axios from 'axios'
import vue from 'vue'
vue.prototype.custom_axios = axios.create({})
import qs from 'qs'
export default {
  name: 'app',
  data: function () {
    return {
      saved: [],
      progress: 0,
      url_list: []
    }
  },
  methods: {
    upload(formData) {
      this.saved = [];
      let message = [];
      this.progress = 0;
      this.showProgress = true;
      const that = this;
      this.custom_axios
        .post('/interface', formData, {
          onUploadProgress: uploadEvent => {
            let progress = Math.round(uploadEvent.loaded / uploadEvent.total * 100)
            that.progress = progress;
            that.$refs.progress.style.width = progress + '%';
          }
        })
        .then(res => {
          const resLength = res.data.length
          this.url_list = [];
          for (let i = 0; i < resLength; i++) {
            if (res.data[i][0]) {
              message.push({
                msg: res.data[i][1] + ' uploaded'
              })
              this.url_list.push(res.data[i][2]);
            } else {
              if (Array.isArray(res.data[0])) {
                message.push({
                  msg: this.handleUploadError(res.data[i][1], res.data[i][2])
                })
              } else {
                message = [{
                  msg: this.handleUploadError(res.data[1], res.data[i][2])
                }]
              }
            }
          }
          this.saved = message;
        })
        .catch(err => {
          console.error(err)
        })
    },
    upload_multiple() {
      const formData = new FormData()
      const length = this.$refs.file.files.length
      if (length === 0) {
        this.saved.push({
          msg: 'Please select a file to upload.'
        })
      } else {
        for (let i = 0; i < length; i++) {
          formData.append(i, this.$refs.file.files[i])
        }
        this.upload(formData)
      }
    },
    handleUploadError(error_code, filename) {
      switch (error_code) {
        case 0:
          return 'No File Provided'
          break
        case 1:
          return 'File Exceeds Server Max File Size: ' + filename
          break
        case 2:
          return 'File Exceeds Front End Max File Size: ' + filename
          break
        case 3:
          return 'The Operation could not complete: ' + filename
          break
        case 4:
          return 'Not an accepted file type: ' + filename
          break
        case 5:
          return 'Could not save file: ' + filename
          break
        default:
          return 'Something went wrong. Whoops :('
      }
    }
  }
}
</script>

<style lang="scss">
#progress {
  width: 50%;
  height: 2em;
  margin: 1em auto;
  border: solid 1px black;
  border-radius: 0.5em;
  position: relative;
  overflow: hidden;

  #bar {
    position: absolute;
    top: 0px;
    left: 0px;
    height: 110%;
    background-color: green;
    transition: width 0.2s;
  }

  #value {
    position: absolute;
    width: 100%;
    height: 100%;
    line-height: 2em;
    z-index: 1;
    text-align: center;
    text-shadow: 0px 0px 4px white;
    font-family: sans-serif;
    font-weight: bold;
  }

}

img {
  width: 300px;
  height: auto;
}
</style>
