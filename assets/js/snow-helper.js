/**
 * Autumn theme helper Js
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

  // Mobile navigation toggle ends

  // Select html ovverride by bootstrap selectpicker
  $('select').selectpicker();

  // ---------- WOOCOMMERCE -------------

  // 1). WooCommerce image hover on archive pages
  var $onPage = $('.post-type-archive-product');
  var $imageSelector = $onPage.find('li.product img');

  $.each($imageSelector, function(){
    var $targetSrc = $(this).attr('src');
    var $targetHoverSrc = $(this).attr('data-hover-src');
    var fadeOutSpeed = 0;
    var fadeInSpeed = 0;

    if( $targetHoverSrc ) {

      $(this).hover(function(){
        //this code will execute when mouse enters the html element
        $(this).fadeOut(fadeOutSpeed, function() {
            $(this).attr('src', $targetHoverSrc).fadeIn(fadeInSpeed);
            $(this).attr('data-hover-src', $targetSrc);
        });

      },
      function(){
        //this code will execute when mouse leaves the html element
        $(this).fadeOut(fadeOutSpeed, function() {
            $(this).attr('src', $targetSrc).fadeIn(fadeInSpeed);
            $(this).attr('data-hover-src', $targetHoverSrc);
        });
      });

    }

  });

  $('.woo-main-image-slider').slick({
    infinite: false,
    arrow: true,
    fade: true,
  });
  $('.woo-child-image-slider').slick({
    infinite: false,
    slidesToShow: 4,
    slidesToScroll: 1,
    asNavFor: '.woo-main-image-slider',
    focusOnSelect: true,
    vertical: true,
	  verticalSwiping: true,
  });

});


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

})(jQuery);
