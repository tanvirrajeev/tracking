

// import Popper from 'popper.js/dist/umd/popper.js';
// window.Popper = Popper;
// require('./bootstrap');



// jquery-ui and datepicker
// import $ from 'jquery';
// window.$ = window.jQuery = $;
// global.$ = global.jQuery = require('jquery');
// global.$ = global.jQuery = require('jquery');


import 'jquery-ui/ui/widgets/datepicker.js';
$('.datepicker').datepicker();

import 'jquery-datetimepicker/build/jquery.datetimepicker.full.min.js';
$('.datetimepicker').datetimepicker();
