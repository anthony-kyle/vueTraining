<!--
 - App.vue
 - Main file for vue app
 - Vue version 2.5.11

 - @category Training
 - @package  Axios1
 - @author   Anthony McGrath <akm@anthonykyle.co.nz>
 - @license  MIT https://opensource.org/licenses/MIT
 - @link     http://localhost/axios/api/v1/interface.php
 -->

<template>
<div id="app">
  <button @click="trigger_get()">Trigger Axios Get</button>
  <button @click="trigger_post()">Trigger Axios Post</button>
  <button @click="trigger_both()">Trigger Both</button>
</div>
</template>

<script>
import axios from 'axios'
import qs from 'qs'
export default {
  name: 'app',
  methods: {
    trigger_both() {
      function send_msg() {
        return axios.post(
          '/interface',
          qs.stringify({
            msg: 'Sent by send_msg via POST'
          })
        )
      }

      function send_author() {
        return axios.get('/interface', {
          params: {
            author: 'me...'
          }
        })
      }
      axios
        .all([send_msg(), send_author()])
        .then(
          axios.spread((msg, author) => {
            console.log('MSG', msg)
            console.log('AUTHOR:', author)
          })
        )
        .catch(err => console.error(err))
    },
    trigger_post() {
      const request_interceptor = axios.interceptors.request.use(
        config => {
          return config
        },
        error => {
          return Promise.reject(error)
        }
      )

      const response_interceptor = axios.interceptors.response.use(
        response => {
          return response
        },
        error => {
          if (error.response) {
            error.message = 'Successful request + response: ' + error.message
          } else if (error.request) {
            error.message =
              'Successful request but no response: ' + error.message
          } else {
            error.message = 'No request sent: ' + error.message
          }
          return Promise.reject(error)
        }
      )
      axios
        .post(
          '/interface',
          qs.stringify({
            msg: 'Hello from axios POST'
          }), {
            timeout: 1
          }
        )
        .then(res => {
          console.log('RESULT', res)
        })
        .catch(err => {
          console.error(err)
        })
      axios.interceptors.request.eject(request_interceptor)
      axios.interceptors.response.eject(response_interceptor)
    },
    trigger_get() {
      axios
        .get('/interface', {
          params: {
            msg: 'Hello from axios get'
          }
        })
        .then(res => {
          console.log('RESULT', res)
        })
        .catch(err => {
          console.error('ERROR', err)
        })
    }
  }
}
</script>

<style lang="scss"></style>
