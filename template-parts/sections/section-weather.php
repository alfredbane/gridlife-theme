<?php
/**
 * Template sub-part for displaying Weather reports on front page
 *
 * @package WordPress
 * @subpackage Snow
 * @since 1.0
 * @version 1.0
 */


$get_weather_data = snow_get_the_weather();
$theme_settings = snow_settings();
$background_class = " has-background-blue-base";
?>

<div class="weather-forecast-display">

    <aside class="c-section-item c-section-aside">
      <?php
          $icon = '<i class="fas fa-cloud"></i>';
          $label = esc_html__("अधिकतम तापमान", "snow");
        	echo snow_set_sidebar_label($label, "", $custom=true, $icon, $get_weather_data['city']);
      ?>
    </aside>

    <?php foreach($get_weather_data['main'] as $key=>$value): ?>


        <section class="c-temp-display c-display-item<?php echo $background_class; ?>">
            <span><?php echo $value['icon'] ?></span>
              <div class="c-time">
                <time class="c-time-date">
                  <?php
                    echo $value['date'] ;
                   ?>
                </time>
                <time class="c-time-hours">
                  <?php
                    echo $value['time'] ;
                   ?>
                </time>
              </div>
              <span class="c-temp">
                 <?php echo $value['temperature'] ?>
              </span>
        </section>

    <?php endforeach;?>

  </div>
