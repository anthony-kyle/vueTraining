module.exports = {
  css: {
    loaderOptions: {
      // pass options to CSS-related loaders
      less: {
        javascriptEnabled: true
      }
    }
  },
  devServer: {
    proxy: {
      '/upload':{
        target: 'http://localhost:80/axios/api/v1/',
        changeOrigin: true,
        secure: false,
        pathRewrite: {
          "/upload": "iviewUpload.php"
        }
      }
    }
  }
}
