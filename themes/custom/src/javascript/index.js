//import 'bootstrap/js/dist/alert';
//import 'bootstrap/js/dist/button';
import 'bootstrap/js/dist/collapse';
import 'bootstrap/js/dist/carousel';
import 'bootstrap/js/dist/dropdown';
//import 'bootstrap/js/dist/modal';
//import 'bootstrap/js/dist/popover';
//import 'bootstrap/js/dist/scrollspy';
//import 'bootstrap/js/dist/tab';
//import 'bootstrap/js/dist/toast';
//import 'bootstrap/js/dist/tooltip';
import 'bootstrap/js/dist/util';
//import Cookies from 'js-cookie';
import $ from 'jquery'
import AOS from 'aos'
import bsCustomFileInput from 'bs-custom-file-input'


(function() {
  'use strict';
  AOS.init({
    once: true
  })
  bsCustomFileInput.init()
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation')
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault()
          event.stopPropagation()
        }
        form.classList.add('was-validated')
      }, false)
    });
  }, false)
})()