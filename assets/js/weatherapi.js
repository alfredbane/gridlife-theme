(function($) {

    "use strict";

    $.fn.weatherForecast = function(options) {

        var defaults = {
            apiKey: '',
            apiUrl : ''
        };

        var settings = $.extend({}, defaults, options);

        if (this.length > 1) {
            this.each(function() { $(this).weatherForecast(options) });
            return this;
        }

        // private methods
        this.showResults = function() {

          if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(this.getWeatherForcast);
          } else {
            x.innerHTML = "Geolocation is not supported by this browser.";
          }

        }

        this.getWeatherForcast = function(position) {

            if ("geolocation" in navigator){

              var data = {
                action: "gridlife_get_the_weather",
                lat: position.coords.latitude,
                lon: position.coords.longitude,
                cnt: 7,
              };

              $.ajax({
                type : "get",
                url : weatherapi.ajaxurl,
                data : data,
                success: function(result){

                  var data = $.parseJSON(result);

                  var location = data.city+", India";

                    $(".weather-forecast-display .c-aside-caption span").text(location);
                    $(".weather-forecast-display section").remove();

                      $.map( data.main, function( key, val ) {

                          var generateDiv = '<section class="c-temp-display c-display-item has-background-blue-base">'+
                          '<span>'+key.icon+'</span>'+'<div class="c-time"><time class="c-time-date">'+key.date+'</time>'+
                          '<time class="c-time-hours">'+key.time+'</time></div>'+
                          '<span class="c-temp">'+key.temperature+'</span><section>';

                          $(".weather-forecast-display").append(generateDiv);

                      });

                  },
              });

            }
        }

        return this.showResults();
    }

})(jQuery);
