$(document).ready(function(){

$('.slider__list').slick({
    dots: true,
    arrows:true,
    autoplaySpeed:3000,
    infinite: true,
    speed: 1500,
    autoplay:true,
    fade: true,
  });

$('.owl-carousel').owlCarousel({
    loop:true,
    margin:10,
    data:false,
    nav:true,
    autoplaySpeed:2000,
    autoplay:true,
    responsive:{
        0:{
          items:1
        },

        650:{
          items:2
        },

        700:{
          items:3
        },
  
        900:{
          items:4
        },
  
        1300:{
          items:5
        }
    }
  });

})