/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
import './styles/app.scss';

// import 'jquery';
let $ = require('jquery');
import 'bootstrap';
import 'datatables.net-bs5';
import  'datatables.net-searchbuilder-bs5';

// start the Stimulus application
import './bootstrap';

$(function () {
  $('[id*="tbl"]').each( function() {
    $(this).DataTable(datatableOptions)
  });
} );
