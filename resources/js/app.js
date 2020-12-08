require('./bootstrap');

//jquery-ui and datepicker
import $ from 'jquery';
window.$ = window.jQuery = $;

import 'jquery-ui/ui/widgets/datepicker.js';
$('.datepicker').datepicker();

import 'jquery-datetimepicker/build/jquery.datetimepicker.full.min.js';
$('.datetimepicker').datetimepicker();
