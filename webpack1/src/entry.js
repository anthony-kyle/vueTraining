const $ = require('jquery')
const _ = require('lodash')
require('./main.scss');
require('./module1.js');
require('./module2.js');
document.querySelector('#p3').innerText = 'Set by Entry.js';
$('#p1').click(()=>{
  console.log('thankyou expose-loader')
})
$('#p2').click(()=>{
  console.log('thankyou expose-loader')
})
$('#p3').click(()=>{
  console.log('thankyou expose-loader')
})
console.log(_.compact([0,1,false,2,'',3]))