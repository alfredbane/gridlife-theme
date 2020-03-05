/**
 * Snow theme SmoothState Init Js
 *
 * Includes method to add smooth state 
 * transition using javascript
 *
 * @version 1.0.0
 * @author Memorres digital pvt. ltd.
 *
 */

(function ($) {

    'use strict';

    $(document).ready(function () {

        // Init here.
        // var $body = $('body'),
        //     $main = $('#main'),
        //     $site = $('html, body'),
        //     transition = 'slide',
        //     smoothState;

        // smoothState = $main.smoothState({

        //     onBefore: function($anchor, $container) {
        //         var current = $('[data-viewport]').first().data('viewport'),
        //             target = $anchor.data('target');
        //         current = current ? current : 0;
        //         target = target ? target : 0;
        //         if (current === target) {
        //             transition = 'fade';
        //         } else if (current < target) {
        //             transition = 'moveright';
        //         } else {
        //             transition = 'moveleft';
        //         }
        //     },

        //     onStart: {
        //         duration: 400,
        //         render: function (url, $container) {
        //             $main.attr('data-transition', transition);
        //             $main.addClass('is-exiting');
        //             $site.animate({scrollTop: 0});
        //         }
        //     },

        //     onReady: {
        //         duration: 0,
        //         render: function ($container, $newContent) {
        //             $container.html($newContent);
        //             $container.removeClass('is-exiting');
        //         }
        //     },

        //     prefetch:true,

        // }).data('smoothState');

    });

}(jQuery));