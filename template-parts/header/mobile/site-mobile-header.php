<?php

/**
* The template for displaying the mobile header
*
* Displays all of the head element and everything up until the "site-content" div.
*
* @package WordPress
* @subpackage Twenty_Sixteen
* @since Twenty Sixteen 1.0
*/

?>

  <div class="c-header-mobile">

     <div class="c-header-mobile__logo">
       <?php get_template_part( 'template-parts/header/site', 'branding' ); ?>
     </div>

     <div class="c-header-mobile__right">

       <!--
         SEARCH FORM
         Html stored in ./searchform.php
       -->
       <div class="c-header-mobile__search-bar item-flex outline-block">

         <?php get_template_part('searchform'); ?>

       </div>

       <!--
         SITE WooCommerce NAVIGATION
         Html stored in ./template-parts/header/site-woonavigation.php
       -->
       <?php if (class_exists('WooCommerce')) : ?>

         <div class="c-header-mobile__cart">
           <?php get_template_part('template-parts/header/site', 'woonavigation'); ?>
         </div>

       <?php endif; ?>

      <div class="c-header-mobile__hamburger item-flex outline-block">
        <div class="c-hamburger">
           <span class="c-hamburger__line c-hamburger__line-left"></span>
           <span class="c-hamburger__line"></span>
           <span class="c-hamburger__line c-hamburger__line-right"></span>
        </div>
      </div>

    </div>
  </div>

  <div class="c-header-drawer">

    <!--
      SITE NAVIGATION MOBILE
      Html stored in ./template-parts/header/site-navigation-mobile.php
    -->

    <?php get_template_part('template-parts/header/mobile/site', 'navigation-mobile'); ?>

  </div>
