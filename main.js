
/*$(document).ready(function(){
    $('.carousel').carousel();
  
   //parallax
    $('.parallax').parallax();
  
  
  //menu movil
  $(".button-collapse").sideNav();
  
  $('.slider').slider();
  $(".button-collapse").sideNav();
  
    $('.carousel.carousel-slider').carousel({fullWidth: true});
  
  
  
  });  */

  document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.sidenav');
    var instances = M.Sidenav.init(elems, options);
  });

  // Or with jQuery

  $(document).ready(function(){
    $('.sidenav').sidenav();
  });

  
  function check_text(input) {  
      if (input.validity.patternMismatch){  
          input.setCustomValidity("Debe ingresar al menos 3 LETRAS");  
      }  
      else {  
          input.setCustomValidity("");  
      }                 
  }
