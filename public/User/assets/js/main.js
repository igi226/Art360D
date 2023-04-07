(function ($) {
  'use strict';

  // aos
  AOS.init({
    duration: 1500,
  });

  // drawer menu
  $('.open-submenu').on('click', function () {
    $(this).parent().siblings('.submenu-transform').addClass('active');
  });

  $('.btn-menu-back').on('click', function () {
    $(this).closest('.submenu-transform').removeClass('active');
  });

  // header search
  $('.icon-search, .search-close').on('click', function () {
    $('.search-wrapper').toggleClass('search-appear');
  });


$('.payment_option h3').on('click', function () {
    // console.log(this)
    $(this).parent().find('.payment_inner').toggle('');
});

// const plus = document.querySelector('.plus_minus'),
//   minus = document.querySelector('.minus_plus');

// let number_el = document.getElementById('person_num');
// number_el.innerText= 1;

// plus.addEventListener('click', () => {
//   let val = parseInt(number_el.innerText);
//   if(val >= 12 ){
//     return;
//   }else{
//     number_el.innerText = ++val;
//   }
  
// });

// minus.addEventListener('click', () => {
//   let val = parseInt(number_el.innerText);
//   if(val <= 1){
//     return;
//   }else{
//     number_el.innerText = --val;
    
//   }
  
  
// });

  // $(".payment_option h3").click(function(){
  //   $(".payment_inner").toggle();
  // });

  // quickview slider initiation
  $('#quickview-modal').on('shown.bs.modal', function (e) {
    $('.qv-large-slider').slick('setPosition');
    $('.qv-thumb-slider').slick('setPosition');
  });

  // common slider
  $('.common-slider').each(function () {
    var $this = $(this);
    var verticalSlide = $(this).attr('data-vertical-slider');

    if ($this.children().length > 1) {
      var selectorAppendDots = $this.parent().find('.activate-dots');
      var selectorAppendArrows = $this.parent().find('.activate-arrows');
      var selectorPrevArrow = `<span class="arrow-slider arrow-prev"><svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 24 24" fill="none" stroke="#FEFEFE" stroke-width="0.5" stroke-linecap="round" stroke-linejoin="round" class="icon-arrow-left"><polyline points="15 18 9 12 15 6"></polyline></svg></span>`;
      var selectorNextArrow = `<span class="arrow-slider arrow-next"><svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 24 24" fill="none" stroke="#FEFEFE" stroke-width="0.5" stroke-linecap="round" stroke-linejoin="round" class="icon-arrow-right"><polyline points="9 18 15 12 9 6"></polyline></svg></span>`;

      $($this).slick({
        infinite: false,
        speed: 500,
        cssEase: 'ease',
        swipeToSlide: true,        
        vertical: verticalSlide ? true : false,
        verticalSwiping: verticalSlide ? true : false,
        appendDots: selectorAppendDots,
        appendArrows: selectorAppendArrows,
        prevArrow: selectorPrevArrow,
        nextArrow: selectorNextArrow,
        responsive: [
            {
                breakpoint: 768,
                settings: {
                    vertical: false,
                    verticalSwiping: false,
                }
            }
        ]
      });
    }
  });

  // slideshow
  $('.activate-slider').each(function () {
    var $this = $(this);
    if ($this.children().length > 1) {
      var selectorAppendDots = $this.parent().find('.activate-dots');
      var selectorAppendArrows = $this.parent().find('.activate-arrows');
      var selectorPrevArrow = `<span class="arrow-slider arrow-prev"><svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 24 24" fill="none" stroke="#000" stroke-width="0.5" stroke-linecap="round" stroke-linejoin="round" class="icon-arrow-left"><polyline points="15 18 9 12 15 6"></polyline></svg></span>`;
      var selectorNextArrow = `<span class="arrow-slider arrow-next"><svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 24 24" fill="none" stroke="#000" stroke-width="0.5" stroke-linecap="round" stroke-linejoin="round" class="icon-arrow-right"><polyline points="9 18 15 12 9 6"></polyline></svg></span>`;

      function doAnimation() {
        $this.find('.slick-slide').each(function () {
          $(this).find('[data-animation]').each(function () {
            var dataAnimation = $(this).attr('data-animation');
            $(this).removeClass(dataAnimation);

            if ($(this).closest('.slick-slide').is('.slick-current.slick-active')) {
              $(this).addClass(dataAnimation);
            }
          })
        })

        return false;
      }

      $(this)
        .on('init', function (event, slick) {
          doAnimation();
        })
        .on('afterChange', function (event, slick, direction) {
          doAnimation();
        })
        .slick({
          appendDots: selectorAppendDots,
          appendArrows: selectorAppendArrows,
          prevArrow: selectorPrevArrow,
          nextArrow: selectorNextArrow
        });
    }
  })

  // increament-decreament button
  $(".qty-btn").on('click', function () {
    var qtyInput = $(this).parent().find('input');

    if ($(this).hasClass('inc-qty')) {
      qtyInput.val(parseInt(qtyInput.val()) + 1);
    } else if (qtyInput.val() >= 1) {
      qtyInput.val(parseInt(qtyInput.val()) - 1);
    }
  });

  // footer copyright current date
  $('.current-year').text(new Date().getFullYear());

  // toggle footer menu
  $('.footer-heading').on('click', function () {
    $(this).siblings().slideToggle();
  });

  // toggle & accordion 
  $('.accordion-btn').on('click', function () {
    $(this).siblings('.accordion-child').slideToggle();
    $(this).toggleClass('active');
  });
  $('.write-btn').on('click', function () {
    $(this).closest('.accordion-parent').find('.accordion-child').slideToggle();
  });

  // filter drawer open
  $('.filter-drawer-trigger').on('click', function () {
    $('.filter-drawer').toggleClass('active');
  });

  // product img popup
  $('[data-fancybox="gallery"]').fancybox({
    buttons: [
      "slideShow",
      "thumbs",
      "zoom",
      "fullScreen",
      "share",
      "close"
    ],
    loop: false,
    protect: true
  });


  /* --------------------------------------------------------
    scrollUp active
  -------------------------------------------------------- */
  var scrollUpBtn = $('#scrollup');

  $(window).scroll(function() {
    if ($(window).scrollTop() > 700) {
      scrollUpBtn.addClass('show');
    } else {
      scrollUpBtn.removeClass('show');
    }
  });

  scrollUpBtn.on('click', function(e) {
    e.preventDefault();
    $('html, body').animate({scrollTop:0}, 300);
  });

  /* --------------------------------------------------------
    newsletter popup
  -------------------------------------------------------- */
  $ (window).ready (function () {
    setTimeout (function () {
      $ ('#modal-subscribe').modal ("show")
    }, 3000);
  });

  $('#shop-category').owlCarousel({
    loop:false,
    margin:-1,
    nav:true,
    navText:['<i class="fas fa-chevron-left"></i>','<i class="fas fa-chevron-right"></i>'],
    responsive:{
        0:{
            items:2
        },
        600:{
            items:3
        },
        1000:{
            items:5
        }
    }
});
$('#museum').owlCarousel({
    loop:false,
    margin:10,
    nav:true,
    navText:['<i class="fas fa-chevron-left"></i>','<i class="fas fa-chevron-right"></i>'],
    responsive:{
        0:{
            items:2
        },
        600:{
            items:3
        },
        1000:{
            items:4
        }
    }
});
$('#latestnews').owlCarousel({
    loop:false,
    margin:10,
    nav:true,
    navText:['<i class="fas fa-chevron-left"></i>','<i class="fas fa-chevron-right"></i>'],
    responsive:{
        0:{
            items:2
        },
        600:{
            items:3
        },
        1000:{
            items:4
        }
    }
});
$('#eventsslide').owlCarousel({
    loop:false,
    margin:10,
    nav:true,
    navText:['<i class="fas fa-chevron-left"></i>','<i class="fas fa-chevron-right"></i>'],
    responsive:{
        0:{
            items:2
        },
        600:{
            items:3
        },
        1000:{
            items:4
        }
    }
});
$('#categorybox').owlCarousel({
    loop:false,
    margin:10,
    nav:true,
    dots:false,
    navText:['<i class="fas fa-chevron-left"></i>','<i class="fas fa-chevron-right"></i>'],
    responsive:{
        0:{
            items:2
        },
        600:{
            items:3
        },
        1000:{
            items:5
        }
    }
});

$(".gallerytop").owlCarousel({
    items:1,
    itemsDesktop: [1024, 1],
    itemsDesktopSmall: [900, 1],
    itemsTablet: [600, 1],
    itemsMobile: [320, 1],
    navigation: true,
    slideSpeed: 500,
    pagination: !1,
    nav:true
  });

// $(".gallery_slider1").owlCarousel({
//             items: 4,
//             itemsDesktop: [1024, 4],
//             itemsDesktopSmall: [900, 3],
//             itemsTablet: [600, 1],
//             itemsMobile: [320, 1],
//             navigation: !0,
//             navigationText: ['<a class="flex-prev"></a>', '<a class="flex-next"></a>'],
//             slideSpeed: 500,
//             pagination: !1
//         })
$('.gallery_slider1').owlCarousel({
                loop: true,
                margin: 10,
                responsiveClass: true,
                responsive: {
                  360: {
                    items: 1,
                    nav: false
                  },
                  480: {
                    items: 1,
                    nav: false
                  },
                  600: {
                    items: 2,
                    nav: false
                  },
                  1000: {
                    items: 4,
                    nav: false,
                    loop: false,
                    margin: 20
                  }
                }
              });
$('.gallery_slider2').owlCarousel({
                loop: true,
                margin: 10,
                responsiveClass: true,
                responsive: {
                  360: {
                    items: 1,
                    nav: false
                  },
                  480: {
                    items: 1,
                    nav: false
                  },
                  600: {
                    items: 2,
                    nav: false
                  },
                  1000: {
                    items: 4,
                    nav: false,
                    loop: false,
                    margin: 20
                  }
                }
              });
$('.gallery_slider3').owlCarousel({
                loop: true,
                margin: 10,
                responsiveClass: true,
                responsive: {
                  360: {
                    items: 1,
                    nav: false
                  },
                  480: {
                    items: 1,
                    nav: false
                  },
                  600: {
                    items: 2,
                    nav: false
                  },
                  1000: {
                    items: 4,
                    nav: false,
                    loop: false,
                    margin: 20
                  }
                }
              });
$('.gallery_slider4').owlCarousel({
                loop: true,
                margin: 10,
                responsiveClass: true,
                responsive: {
                  360: {
                    items: 1,
                    nav: false
                  },
                  480: {
                    items: 1,
                    nav: false
                  },
                  600: {
                    items: 2,
                    nav: false
                  },
                  1000: {
                    items: 4,
                    nav: false,
                    loop: false,
                    margin: 20
                  }
                }
              });
})(jQuery);