/**
 * WPGL Slider Js
 *
 * Includes function for slick slider
 * init with settings
 *
 * @version 1.2.1
 * @author Memorres digital pvt. ltd.
 * @package WPGL v1.0
 *
 */

(function($){

  $.fn.initSlider = function() {


    $(this).each(function(){

      /* override values based on data attr in div */

      var $this = $(this);

      var slideTarget = $this.attr('data-slide') ? $this.attr('data-slide') : '';
      var slidesToShow = $this.attr('data-slidestoshow') ? $this.attr('data-slidestoshow') : 1;
      var slideInfniteScroll = $this.attr('data-infinite') ? true : false;
      var slideDotNav = ( $this.attr('data-dotnav') === "true") ? true : false;
      var slideCenterMode = $this.attr('data-centermode') ? true : false;
      var slideCenterPadding = $this.attr('data-centermode') ? '3%' : '';
      var slidesToScroll = $this.attr('data-slidestoscroll') ? $this.attr('data-slidestoscroll') : 1;
      var sliderControl = $this.attr('data-controls') ? $this.attr('data-controls') : false;
      var prevArrow = $('[data-jsclickevent="slick-prev"]');
      var nextArrow = $('[data-jsclickevent="slick-next"]');
      var mouseScroll = $this.attr('data-mousescroll') ? $this.attr('data-mousescroll') : false;
      var slideSpeed = $this.attr('data-slidespeed') ? parseInt ($this.attr('data-slidespeed')) : 1000;
      var sliderTransition = $this.attr('data-fade') ? true : false;
      var easeValue = sliderTransition ? 'linear' : '';
      var autoPlay = $this.attr('data-autoplay') ? $this.attr('data-autoplay') : false;
      var touchThreshold = 1000;
      var getMobileSlides = $this.attr('data-slidestoshowinmobile') ? $this.attr('data-slidestoshowinmobile') : 1;
      var getTabletSlides = $this.attr('data-slidestoshowintablet') ? $this.attr('data-slidestoshowintablet') : 1;


      var currentSlideSelector = $('.c-banner__counter-current');
      var currentSlideCount = '';

      var responsiveINIT = '';

      if( slidesToShow > 1 ) {

        responsiveINIT = [
         {
           breakpoint: 767,
           settings: {
             slidesToShow: getMobileSlides,
           },

         },
         {
           breakpoint: 1024,
           settings: {
             slidesToShow: getTabletSlides,
           },
         },

       ];

      }


      if($this.children().length > 1) {
        

        if($this.find('.c-banner__counter')) {

          $this.on('init afterChange beforeChange', function(event, slick, currentSlide, nextSlide){
              //currentSlide is undefined on init -- set it to 0 in this case (currentSlide is 0 based)
              var i = (currentSlide ? currentSlide : 0) + 1;

              if (i.toString().length === 1) {
                currentSlideCount = "0" + i;
              } else {
                currentSlideCount = i;
              }

              $this.find(currentSlideSelector).text(currentSlideCount);

          });
        }


        $this.slick({
          slide: slideTarget,
          infinite:slideInfniteScroll,
          slidesToShow: slidesToShow,
          slidesToScroll: slidesToScroll,
          fade: sliderTransition,
          autoplay: autoPlay,
          autoplaySpeed: slideSpeed,
          dots: slideDotNav,
          arrows: false,
          centerMode: slideCenterMode,
          centerPadding: slideCenterPadding,
          touchThreshold: touchThreshold,
          responsive: responsiveINIT,
          cssEase: easeValue 
        });

        prevArrow.click(function(){
          $(this).parent().parent().find('.slick-slider').slick('slickPrev');
        });

        nextArrow.click(function(){
          $(this).parent().parent().find('.slick-slider').slick('slickNext');
        });

    }

  });

  };

  $(document).ready(function(){

    $('.c-slider').initSlider();

  });

})(jQuery);
