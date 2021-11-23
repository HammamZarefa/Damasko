(function($){

	'use strict';

  //=================================== ToTop =============================================//
  $().UItoTop({
      scrollSpeed:500,
      easingType:'linear'
    }); 

  //=================================== Nav Responsive =====================================//
    $('#menu').tinyNav({
       active: 'selected'
    });
    
   //=================================== Nav Superfish ======================================//
    jQuery(document).ready(function() {
    jQuery('ul.sf-menu').superfish();
  });	

  //=================================== Nav Scroll ===============================//
  $('nav ul li a').click(function(){
        var el = $(this).attr('href');
        var elWrapped = $(el);  
        scrollToDiv(elWrapped,40);
        return false;    
    });

    function scrollToDiv(element,navheight){
      var offset = element.offset();
      var offsetTop = offset.top;
      var totalScroll = offsetTop-navheight;
          $('body,html').animate({
                  scrollTop: totalScroll
          }, 500);
    }

  //=================================== Text Rotate ========================================//
    $(".text_rotate .rotate").textrotator({
      animation: "fade",
      speed: 1000
    });
    //=================================== Text Rotate Sentence ========================================//
    $(".text_rotate_sentence .rotate").textrotator({
      animation: "fade",
      speed: 1500
    });

  //=================================== Hover Functions ========================================//
  $('.number_step').hover(function() {
    $('.icon_step').toggleClass('animated bounce');
  });

  $('.icon_service').hover(function() {
    $(this).toggleClass('animated rotateIn');
  });

  $('.moving').hover(function() {
    $(this).toggleClass('animated wobble');
  });

  //=================================== Scroll Functions ========================================//
  $(window).scroll(function() {

      $('.image_step').each(function(){
        var imagePos = $(this).offset().top;

        var topOfWindow = $(window).scrollTop();
          if (imagePos < topOfWindow+400) {
            $(this).addClass("animated slideInRight").css("opacity", "1");
          }
        });

      $('.image_step_right').each(function(){
        var imagePos = $(this).offset().top;

        var topOfWindow = $(window).scrollTop();
          if (imagePos < topOfWindow+400) {
            $(this).addClass("animated slideInLeft").css("opacity", "1");
          }
        });

       $('.social .icon_social').each(function(){
        var imagePos = $(this).offset().top;

        var topOfWindow = $(window).scrollTop();
          if (imagePos < topOfWindow+400) {
            $(this).addClass("animated slideInDown").css("opacity", "1");
          }
        });
       
       $('.item_table').each(function(){
        var imagePos = $(this).offset().top;

        var topOfWindow = $(window).scrollTop();
          if (imagePos < topOfWindow+400) {
            $(this).addClass("animated bounceInDown").css("opacity", "1");
          }
        });
    
    });  

  //=================================== Last version of Fancybox V2  ===================================//
  
  $('.fancybox').fancybox();
    jQuery("a[class*=fancybox]").fancybox({
    'overlayOpacity'  : 0.7,
    'overlayColor'    : '#000000',
    'transitionIn'    : 'fade',
    'transitionOut'   : 'fade',
    'easingIn'        : 'easeOutBack',
    'easingOut'       : 'easeInBack',
    'speedIn'       : '700',
    'centerOnScroll'  : true,
    'titlePosition'     : 'over'
  });
  
	//=================================== Submit Form ====================================//
	$('#form').submit(function(event) {
      event.preventDefault();
      var url = $(this).attr('action');
      var datos = $(this).serialize();
      $.get(url, datos, function(resultado) {
        $('#result').html(resultado);
      });
    });

    //================================== Grid Gallery ====================================//

    $('#ri-grid').gridrotator({

      // number of rows
      rows : 2,

      // number of columns
      columns : 8,

      // rows/columns for different screen widths
      // i.e. w768 is for screens smaller than 768 pixels
      w1024 : {
        rows : 3,
        columns : 8
      },

      w768 : {
        rows : 3,
        columns : 6
      },

      w480 : {
        rows : 3,
        columns : 4
      },

      w320 : {
        rows : 2,
        columns : 3
      },

      w240 : {
        rows : 2,
        columns : 3
      },

      // step: number of items that are replaced at the same time
      // random || [some number]
      // note: for performance issues, the number should not be > options.maxStep
      step : 'random',
      maxStep : 3,

      // prevent user to click the items
      preventClick : true,

      // animation type
      // showHide || fadeInOut || slideLeft ||
      // slideRight || slideTop || slideBottom ||
      // rotateLeft || rotateRight || rotateTop ||
      // rotateBottom || scale || rotate3d ||
      // rotateLeftScale || rotateRightScale ||
      // rotateTopScale || rotateBottomScale || random
      animType : 'random',

      // animation speed
      animSpeed : 600,

      // animation easings
      animEasingOut : 'linear',
      animEasingIn : 'linear',

      // the item(s) will be replaced every 3 seconds
      // note: for performance issues, the time "can't" be < 300 ms
      interval : 2500,
      // if false the animations will not start
      // use false if onhover is true for example
      slideshow : true,
      // if true the items will switch when hovered
      onhover : false,
      // ids of elements that shouldn't change
      nochange : []

    });

})(jQuery);
  
  //=================================== Map Background ====================================//
   // speed in milliseconds
   var scrollSpeed = 70;
   // set the default position
   var current = 0;
   // set the direction
   var direction = 'h';
   function bgscroll(){
   // 1 pixel row at a time
   current -= 1;
   // move the background with backgrond-position css properties
   $('section.map').css("backgroundPosition", (direction == 'h') ? current+"px 0" : "0 " + current+"px");
    }
    //Calls the scrolling function repeatedly
    setInterval("bgscroll()", scrollSpeed);
    
 //=================================== Slide Home =====================================//

     $('#slide').camera({        
        height: '51.5%'
     });  