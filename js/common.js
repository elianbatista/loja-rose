$(document).ready(function(){

       $('.carousel').slick({

              prevArrow: $('.prev-arrow'),

              nextArrow: $('.next-arrow')

       });

       $('.left-case i').on('click', function(){

              $('section#topo nav').addClass('activated');

              $('.background-gray').addClass('activated');

       });

       $('.top-bar .right-case i').on('click', function(){

              $('section#topo nav').removeClass('activated');

              $('.background-gray').removeClass('activated');

       });

});