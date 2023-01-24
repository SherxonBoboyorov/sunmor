// -------------------------------===========-------------------------------

$(document).ready(function(){
document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.modal');
    var instances = M.Modal.init(elems, options);
  });

  // Or with jQuery

$(document).ready(function(){
    $('.modal').modal();
});

// -------------------------------===========-------------------------------

document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.sidenav');
    var instances = M.Sidenav.init(elems, options);
  });

  // Initialize collapsible (uncomment the lines below if you use the dropdown variation)
  // var collapsibleElem = document.querySelector('.collapsible');
  // var collapsibleInstance = M.Collapsible.init(collapsibleElem, options);

  // Or with jQuery

  $(document).ready(function(){
    $('.sidenav').sidenav();
  });

})

// -------------------------------===========-------------------------------

$(function(){
    let Catalog_max__pro__ul_link = document.querySelectorAll('.header__ru__link');
  
    for(let i = 0; i<Catalog_max__pro__ul_link.length; i++){
        Catalog_max__pro__ul_link[i].addEventListener('click',function(){
            for(let j = 0; j<Catalog_max__pro__ul_link.length;j++){
                Catalog_max__pro__ul_link[j].classList.remove('active');
            }
            this.classList.add('active');
  
        })
    }
  });


// -------------------------------===========-------------------------------

$(function(){
  let Catalog_max__pro__ul_link = document.querySelectorAll('.news_all__pagination__page');

  for(let i = 0; i<Catalog_max__pro__ul_link.length; i++){
      Catalog_max__pro__ul_link[i].addEventListener('click',function(){
          for(let j = 0; j<Catalog_max__pro__ul_link.length;j++){
              Catalog_max__pro__ul_link[j].classList.remove('active');
          }
          this.classList.add('active');

      })
  }
});
  
// -------------------------------===========-------------------------------

$(document).ready(function(){
    (function($){
      $('.numbers').each(function(){
          $(this).prop('Counter',0).animate({
              Counter:$(this).text()
          },
          {
              duration:9000,
              easing:"swing",
              step:function(now){
                  $(this).text(Math.ceil(now));
              }  
         });
      })
    })(jQuery);
  });

// -------------------------------===========-------------------------------