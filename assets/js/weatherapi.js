(function($) {

    "use strict";
    
    $.fn.weatherForecast = function(options) {

        var defaults = {
            apiKey: "9e176dfbe24feda8d7112ed23e4f533a",
            apiUrl : "http://api.openweathermap.org/data/2.5/forecast"
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

        this.generateHTML = function (listItem) {

          var options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric', hour: 'numeric', hour12: true };
          var locale = "hi-IN";
          var date = new Date(listItem.dt*1000).toLocaleDateString(locale, options);

          $.map( listItem.weather, function( item, val ) {

              var element = '<li class="item"><span class="date">'+date+'</span><br/><span class="temp">'+Math.floor(key.main.temp - 273.15)+' &#8451;</span></li>';
              $("#demo").append(element);

          });

        }

        this.getWeatherForcast = function(position) {

            if ("geolocation" in navigator){


              var data = {
                lat: position.coords.latitude,
                lon: position.coords.longitude,
                appid: settings.apiKey,
                cnt: 10
              };

              $.ajax({
                url: settings.apiUrl,
                data: data,
                success: function(result){

                  console.log(result);

                    $("#header").text(result.city.name);

                      // Now it can be used reliably with $.map()
                      $.map( result.list, function( key, val ) {

                          this.generateHTML(key);


                      });

                  },
              });

            }
        }

        return this.showResults();
    }

})(jQuery);
