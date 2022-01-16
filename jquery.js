// Next slide
$('.carousel').carousel('next');
$('.carousel').carousel('next', 3); // Move next n times.

// Previous slide
$('.carousel').carousel('prev');
$('.carousel').carousel('prev', 4); // Move prev n times.

// Set to nth slide
$('.carousel').carousel('set', 4);

// Destroy carousel
$('.carousel').carousel('destroy');

//nav drop
$(document).ready(function(){
  $('.sidenav').sidenav();
});


$(document).ready(function(){
    $('select').formSelect();
    //drop nav
$(".dropdown-trigger").dropdown();
  });