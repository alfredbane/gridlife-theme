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

  function snowpPagePilingInit() {

    $('[data-pp-enable="true"]').pagepiling({
        menu: null,
        direction: 'vertical',
        verticalCentered: false,
        scrollingSpeed: 700,
        easing: 'swing',
        css3: true,
        normalScrollElements: null,
        normalScrollElementTouchThreshold: 5,
        touchSensitivity: 5,
        keyboardScrolling: true,
        sectionSelector: '.c-section',
        animateAnchor: false,
        //events
        onLeave: function(index, nextIndex, direction){},
        afterLoad: function(anchorLink, index){},
        afterRender: function(){},
    });

  }

  $(window).resize(function(){
    if($(window).width() > 767) {
      snowpPagePilingInit();
    }
  });

  if($(window).width() > 767) {
    snowpPagePilingInit();
  }

})(jQuery);
