<?php
/**
 * The template part for displaying search form in popup
 *
 * @package WordPress
 * @subpackage Autumn_Theme
 * @since Autumn 1.0
 */
?>

<!-- The Modal -->
<div id="modal-7493" class="c-modal">

  <!-- Modal content -->
  <div class="c-modal-content">
    <span class="close" id="popup-close">&times;</span>
        <!--
          SEARCH FORM
          Html stored in ./searchform.php
        -->

        <div class="c-header__search-bar">
          <label class="search-label">
            <?php echo __("search any post or category.", "gridlife") ?>
          </label>
          <?php get_template_part('searchform'); ?>
        </div>

  </div>

</div>
