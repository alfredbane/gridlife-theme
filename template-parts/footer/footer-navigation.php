<?php
/**
 * Displays site footer quick links
 * and other links.
 *
 * @package WordPress
 * @subpackage Autumn
 * @since 1.0.0
 */
global $autumn_settings;

?>


<?php get_template_part('template-parts/footer/components/footer','newsletter'); ?>

<div class="c-footer__col">
   <div class="row">
     <div class="col-md-6 col-xl-3">
        <h4 class="c-footer__col-title"><?php echo __("Useful Links") ?></h4>

        <?php if ( has_nav_menu( 'useful_links' ) ) : ?>
            <?php
              wp_nav_menu(
                array(
                  'theme_location' => 'useful_links',
                  'menu_class'  => 'c-column__list',
                  'container' => '',
                  'walker' => new Autumn_Footer_Menu_Walker(),
                  'depth'       => 1,
                )
              );
            ?>
        <?php endif; ?>

     </div>
      <div class="col-md-6 col-xl-3">
         <h4 class="c-footer__col-title"><?php echo __("Need Help") ?></h4>
         <?php if ( has_nav_menu( 'help_links' ) ) : ?>
             <?php
               wp_nav_menu(
                 array(
                   'theme_location' => 'help_links',
                   'menu_class'  => 'c-column__list',
                   'container' => '',
                   'walker' => new Autumn_Footer_Menu_Walker(),
                   'depth'       => 1,
                 )
               );
             ?>
         <?php endif; ?>
      </div>

      <div class="col-md-6 col-xl-3" itemscope itemtype="http://schema.org/LocalBusiness">
          <?php get_template_part('template-parts/footer/components/footer','contact'); ?>
      </div>

      <div class="col-md-6 col-xl-3">

         <h4 class="c-footer__col-title"><?php echo __('Follow Us') ?></h4>
         <div class="c-footer__col-social-media">
           <!--- Social media links -->
           <?php get_template_part( 'template-parts/socialmedia' ); ?>
         </div>

      </div>
   </div>
</div>
