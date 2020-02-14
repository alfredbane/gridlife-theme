<?php

/**
* The template for displaying the desktop header
*
* Displays all of the head element and everything up until the "site-content" div.
*
* @package WordPress
* @subpackage Twenty_Sixteen
* @since Twenty Sixteen 1.0
*/

?>

  
<div class="container-fluid">
  <div class="row between-xs">
    <div itemprop class="c-header__logo c-header__logo--has-background col-xs-2">
      <?php get_template_part( 'template-parts/header/site', 'branding' ); ?>
    </div>

    <!--
      SEARCH FORM
      Html stored in ./searchform.php
    
    <div class="c-header__search-bar">
      <?php //get_template_part('searchform'); ?>
    </div>-->

    <nav class="c-header__navbar navbar navbar-expand-lg col-xs-10">

      <!--
        SITE NAVIGATION DESKTOP
        Html stored in ./template-parts/header/site-navigation.php
      -->
      <div class="c-header__nav collapse navbar-collapse" id="navbarSupportedContent" role="navigation" aria-label="<?php esc_attr_e('Main Menu', 'snow'); ?>">
        <?php get_template_part('template-parts/header/site', 'navigation'); ?>
      </div>
      
    </nav>  
  </div>
</div>