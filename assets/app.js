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
import 'datatables.net-bs4';
import  'datatables.net-searchbuilder-bs4';

// start the Stimulus application
import './bootstrap';

$(function () {
  var options = {
    lengthMenu: [10, 20, 50],
    dom: "PQfrtip"
  };
  $('[id*="tbl"]').each( function() {
    $(this).DataTable(options)
  });
} );
