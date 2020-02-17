/**
 * Snow theme helper Js
 *
 * Includes functions for altering theme
 * behaviour using javascript
 *
 * @version 1.0.0
 * @author Memorres digital pvt. ltd.
 *
 */

// Search form validation

(function($){
  "use strict";

  $.fn.searchFormSubmit = function( options ) {

        // This is the easiest way to have default options.
        var settings = $.extend({}, $.fn.searchFormSubmit.defaults, options );

        function validateForm(e)
        {

          if ( $.trim(settings.inputTarget.val()) === "" ) {
                e.preventDefault();
              settings.inputTarget.attr("placeholder", settings.validationText);
              return false;
          } else {
            return true;
          }
        }
        // Validate on form submission.
        return this.submit(function(e) {
          validateForm(e);
        });

  };

    // Plugin defaults – added as a property on our plugin function.
  $.fn.searchFormSubmit.defaults = {

    inputTarget: $(".form-group"),
    validationText: "Try adding some text here!"

  };


$(document).ready(function(){


  $('#site-content').pagepiling({
      menu: null,
      direction: 'vertical',
      verticalCentered: false,
      scrollingSpeed: 700,
      easing: 'swing',
      loopBottom: false,
      loopTop: false,
      css3: false,
      normalScrollElements: null,
      normalScrollElementTouchThreshold: 5,
      touchSensitivity: 5,
      keyboardScrolling: true,
      sectionSelector: '.section',
      animateAnchor: false,
      //events
      onLeave: function(index, nextIndex, direction){},
      afterLoad: function(anchorLink, index){},
      afterRender: function(){},
  });

  // This needs only be called once and does not
  // have to be called from within a "ready" block
  $.fn.searchFormSubmit.defaults.inputTarget = $('input.c-search-bar__form-control');
  $.fn.searchFormSubmit.defaults.validationText = "Add some text !";

  $('.c-header__search-bar-form').searchFormSubmit();

  /**
   * Mobile navigation toggle
   */

  const app = (() => {

    let body;
    let menu;
    let menuItems;
    let buttonSelector;

    const init = () => {
      body = document.querySelector('html');
      buttonSelector = document.querySelector('.c-hamburger');
      menuItems = document.querySelectorAll('.full-screen-nav__list-item');

      applyListeners();
    };

    const applyListeners = () => {
      if( buttonSelector ) {

        buttonSelector.addEventListener('click', (event) => {
          toggleClass(body, 'nav-active');
          toggleClass(buttonSelector, 'c-hamburger--active');
        });

      }
    };

    const toggleClass = (element, stringClass) => {
      if (element.classList.contains(stringClass))
        element.classList.remove(stringClass);
      else

        element.classList.add(stringClass);
    };

    init();
  })();


    // Header scroll animation

      $(window).on('scroll', function(){

        var scroll = $(window).scrollTop();

         //>=, not <=
        if (scroll >= 20) {
            //clearHeader, not clearheader - caps H
            $(".c-header").addClass("c-header--fixed");

        } else {

          $(".c-header").removeClass("c-header--fixed");

        }

      });
  });

})(jQuery);