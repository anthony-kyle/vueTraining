<template>
<div id="app">

  <Upload id="uploader" type="drag" multiple name="file" action="/upload" :show-upload-list="false" :on-success="success" :on-progress="progress" :on-error="error">
    <div>
      <Icon type="ios-cloud-upload" size="52"></Icon>
      <p>Click or drag files here to upload.</p>
    </div>
  </Upload>
  <Progress v-if="progress_percent" :percent="progress_percent"></Progress>
  <Table :columns='table_structure' :data='table_data' stripe border></Table>
  <div v-if="uploadedImages.length > 0">
    <Carousel :autoplay="carousel.autoplay" :autoplay-speed="carousel.speed">
      <CarouselItem v-for="image in uploadedImages" :key="image.id">
        <img :src="image">
      </CarouselItem>
    </Carousel>
    <div class="switch">
      <i-Switch @on-change="autoplay"></i-Switch> Autoplay
    </div>
    <Slider v-show="carousel.autoplay" v-model='carousel.speed' :min='500' :max="10000" step="500"></Slider>
  </div>
</div>
</template>

<script>
export default {
  name: 'App',
  data() {
    return {
      progress_percent: 0,
      uploadedImages: [],
      carousel: {
        autoplay: true,
        speed: 5000
      },
      table_data: [

      ]
    }
  },
  computed: {
    table_structure() {
      return [{
          title: 'Image Name',
          key: 'image'
        },
        {
          title: 'Upload Status',
          key: 'status',
          align: 'center',
          render(h, params) {
            if (params.row.status === 1) {
              return h('Icon', {
                props: {
                  type: 'ios-checkmark',
                  color: 'green',
                  size: 53
                }
              })
            } else {
              return h('Icon', {
                props: {
                  type: 'ios-close',
                  color: 'red',
                  size: 53
                }
              })
            }
          }
        }

      ]
    }
  },
  methods: {
    autoplay(status) {
      this.carousel.autoplay = status
    },
    success(response, file, filelist) {
      this.uploadedImages.push(response[2])
      this.table_data.push({
        image: response[1],
        status: response[0]
      })
    },
    progress(event, file, filelist) {
      this.progress_percent = Math.round(event.percent)
    },
    error(error, file, filelist) {
      this.$Message.error({
        content: error,
        closable: true,
        duration: 0
      })
    }
  }
}
</script>

<style lang="scss">
body {
  padding: 20px;
  display: flex;
  flex-direction: column;
  width: 100vw;
  height: 100vh;
  align-items: center;
  justify-items: center;

  #app {
    width: 80%;
    padding: 20px;

    .ivu-switch {
      i {
        font-size: 1.6em;
        font-weight: bold;
        padding: auto;
        margin: auto;
        top: -4px !important;
        left: -2px;
      }
    }

    .ivu-carousel {
      width: 100%;

      img {
        width: 100%;
        height: auto;
      }
    }

    #vert {
      height: 200px;
    }

    #uploader {
      width: 100%;

      div {
        padding: 20px 0;

        i {
          color: #3399ff;
        }
      }
    }

    .switch {
      line-height: 2em;
      font-size: 1.3em;
    }
  }
}
</style>
