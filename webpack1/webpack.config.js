const path = require('path')
module.exports = {
  entry:{
    entry_file: './src/entry.js'
  },
  output:{
    path:path.join(__dirname,'dist'),
    filename: 'bundles.js',
    publicPath:'./dist/'
  },
  module:{
    rules: [
      {
        test:/\.css$/,
        use:['style-loader', 'css-loader']
      },
      {
        test: /\.s[ac]ss$/i,
        use: [
          // Creates `style` nodes from JS strings
          'style-loader',
          // Translates CSS into CommonJS
          'css-loader',
          // Compiles Sass to CSS
          'sass-loader',
        ],
      },
      {
        test:/\.(jpg|jpeg|png|gif)$/,
        use:{
          loader:'file-loader',
          options:{
            name:'[name].[ext]',
            
          }
        }
      // },
      // {
      //   test: require.resolve('jquery'),
      //   use:{
      //     loader:'expose-loader',
      //     options:{
      //       exposes: ['$', 'jQuery']
      //     }
      //   }
      // },
      // {
      //   test: require.resolve('lodash'),
      //   use:{
      //     loader:'expose-loader',
      //     options:{
      //       exposes: ['_', 'lodash']
      //     }
      //   }
      }
    ]
  }
}