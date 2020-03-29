<?php
/**
 * Template sub-part for displaying Weather reports on front page
 *
 * @package WordPress
 * @subpackage Snow
 * @since 1.0
 * @version 1.0
 */

$theme_settings = snow_settings();
$apiUrl = $theme_settings['opt-weatherapiurl'];
$apiKey = $theme_settings['opt-weatherapikey'];
$resultcount = $theme_settings['opt-weatherapicount'];
$defaultLong = $theme_settings['opt-longitude'];
$defaultLat = $theme_settings['opt-latitude'];
$defaultParams = '/?lat='.$defaultLat.'&lon='.$defaultLong.'&cnt=8&appid='.$apiKey;

$get_data = callAPI('GET', $apiUrl.$defaultParams, false);

$response = json_decode($get_data, true);
$errors = $response['response']['errors'];


// echo"<pre>"; print_r($response['city']); echo "</pre>" ;
?>

<?php foreach ( $response as $item ):
endforeach; ?>

<div class="weather-forecast-display">

    <aside class="c-section-item c-section-aside">
      <?php
          $icon = '<i class="fas fa-cloud"></i>';
          $label = esc_html__("अधिकतम तापमान", "snow");
        	echo snow_set_sidebar_label($label, "", $custom=true, $icon, $response['city']['name']);
      ?>
    </aside>

    <?php foreach($response['list'] as $forecast): ?>
      <section class="c-temp-display c-display-item has-background-blue-base">
            <?php echo get_weather_icon($forecast['weather'][0]['id']); ?>
            <div class="c-time">
              <time class="c-time-date">
                <?php
                  setlocale(LC_ALL, 'hi_IN');
                  echo date('l, d F Y', $forecast['dt']) ;
                 ?>
              </time>
              <time class="c-time-hours">
                <?php
                  setlocale(LC_ALL, 'hi_IN');
                  echo date('h:i A', $forecast['dt']) ;
                 ?>
              </time>
            </div>
            <span class="c-temp">
               <?php echo floor($forecast['main']['temp']-273.15).'&#8451;'; ?>
            </span>
      </section>
    <?php endforeach;?>

  </div>
