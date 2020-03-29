<?php
/**
 * Category section layout setup
 * @param $section_category  Category term for which label is needed
 *
 * @package WordPress
 * @subpackage Snow
 * @since 1.0
 * @version 1.0
 */

if(!function_exists('snow_set_sidebar_label')):

	function snow_set_sidebar_label ( $section_category, $custom_text='', $custom=false, $icon="", $place="" ) {

		if(!$section_category){
			return;
		}


		$heading = '';
		$section_heading = '';
		$description = '';
		$color = '';
		$bg_color = 'has-background-blue-base';

		if( !$custom ) {

			$category = $section_category;

			if($category == 'recent_posts'):

				$theme_settings = snow_settings();
				$heading = $theme_settings['section-heading'];
				$description = $theme_settings['section-description'];
				$bg_color = 'has-background-blue-base';

			else:

				$term = get_term_by('id', $category, 'category');
				$heading = $term ? $term->name : '';
				$description = $term ? $term->description : '';
				$color = $term ? find_and_get_field(get_field('category_color_code', $term)) : '';
				$bg_color = 'has-background-'.$color.'-base';

			endif;


			/**
			 * Create label using text and category
			 * @method snow_split_string
			 * @source /core/theme-helper.php
			 */
			$section_heading = snow_split_string( $heading, $custom_text );

		} else {

			$bg_color = "has-background-blue-dark";
			$description = '<span class="custom-text">'.$place.', India</span>';
			$section_heading = snow_split_string( $section_category, $custom_text );

		}

		return wp_sprintf('
			<div class="c-section-label %1$s">
				<header class="c-aside-header">
					%4$s
					<h1>%2$s</h1>
				</header>
				<p class="c-aside-caption">%3$s</p>
			</div>', $bg_color, $section_heading, $description, $icon);

	}

endif;



/**
 * Get category list for post categories with ACF labels.
 *
 */

function snow_get_post_categories(int $post_ID, boolean $list=null) {

    $getCategoryTerms = get_the_terms( $post_ID, 'category' ); //as it's returning an array

    $html = '';

    foreach ( $getCategoryTerms as $category_term ) {

        $html .= wp_sprintf('<label class="c-classification color-%1$s" for="article-%2$s"><a href="%3$s" alt="%4$s">%4$s</a></label>',
          find_and_get_field(get_field('category_color_code', $category_term)),
          $post_ID,
          esc_url(get_category_link($category_term->term_id)),
          esc_html__($category_term->name)
        );

    }

    return $html;

}

/**
 * Method for setting layout for the articles
 *
 * @package WordPress
 * @subpackage Snow
 * @since 1.0
 * @version 1.0
 */

if(!function_exists('snow_article_layout')):

	function snow_article_layout ($withExcerpt=false) {

		$post_id = get_the_ID();
		$post_meta = snow_get_post_categories($post_id);
		$class = 'c-article-short';
		$custom_excerpt = '';

		$content = get_the_content();
		$filtered_text = wp_filter_nohtml_kses( $content );

		if($withExcerpt) {

			$class = 'c-article-withExcerpt col-md-4 col-lg-4';
			$post_meta = wp_sprintf('<label class="c-meta-date">%s</label>', get_the_date( 'M / d / Y' ));
			$custom_excerpt = wp_sprintf('<p>%s</p>',wp_trim_words( $filtered_text, $num_words=20, '...' ) );

		}

		return wp_sprintf('<article
			style="background-image:url(%1$s)"
			class="post-%2$s c-article %6$s has-Background-img">

			<div data-link="%4$s" class="c-excerpt">
				%3$s
				<h6 class="c-article-title">
					<a href="%4$s" alt="link to news">
						%5$s
					</a>
				</h6>
				%7$s
			</div>

		</article>',
			esc_url(get_the_post_thumbnail_url()),
			$post_id,
			$post_meta,
			esc_url(get_the_permalink($post_id)),
			esc_html__(get_the_title()),
			$class,
			$custom_excerpt

		);

	}
endif;

function snow_post_detail_banner() { ?>

	<div class="c-banner" style="background-image:url(<?php echo get_the_post_thumbnail_url(); ?>)">

		<div class="c-banner-content">

			<div class="c-banner-caption">

				<div class="o-post-title">
					<?php echo wp_sprintf("<h1>%s</h1>", esc_html__(get_the_title())) ?>
				</div>
				<div class="o-post-excerpt">

					<?php
						$my_content = apply_filters( 'the_content', get_the_content() );
						$my_content = wp_strip_all_tags($my_content);
						echo wp_trim_words( $my_content, 15, null);
					?>

				</div>

			</div>

		</div>

	</div>


<?php }

/**
 * 4.1). Create post navigation buttons from params
 *
 * @method snow_post_navigation_previous_button
 * @method snow_post_navigation_next_button
 * @param $link type:string , $text type:string
 * @since snow v1.0.0
 * @return HTML5
 *
 */

function snow_post_navigation_button($link, $class, $title, $text) {

  return wp_sprintf ('<a href="%1s" rel="prev" class="%2s c-button">
            <span class="c-button__text">%3s</span>
            <span class="c-button__text label">%4s</span>
        </a>', esc_url( $link ), $class, esc_html__($text, 'snow' ), esc_html__($title,'snow'));

}

/**
 * 4.2). Create post navigation from params
 *
 * @method snow_the_post_navigation
 * @param $previous type:string , $next type:string
 * @since snow v1.0.0
 * @return HTML5
 *
 */
function snow_the_post_navigation($previous='', $next='') {

    $prev_post = get_previous_post();

    $prev_id = ( $prev_post !== '' ) ? $prev_post->ID : '';

    $prev_permalink = ( $prev_id !== '' ) ? get_permalink($prev_id) : '';

    $prev_title = ( $prev_id !== '' ) ? get_the_title($prev_id) : '';

    $next_post = get_next_post();

    $next_id = ( $next_post !== '' ) ? $next_post->ID : '';;

    $next_permalink = ( $next_id !== '' ) ? get_permalink($next_id) : '';

    $next_title = ( $next_id !== '' ) ? get_the_title($next_id) : '';

    ob_start();
    ?>

      <div class="c-post-nav">
        <?php if( $prev_post ):
          echo snow_post_navigation_button($prev_permalink, 'btn-prev', $prev_title, 'Previous');
         endif; ?>
        <?php if( $next_post ):
          echo snow_post_navigation_button($next_permalink, 'btn-next', $next_title, 'Next');
        endif; ?>
      </div>

    <?php
    $output = ob_get_contents();
    ob_end_clean();

    return $output;
}


/**
 * Add advertisement banner on home page on desired position
 *
 * @param $break_count  index of post on which the content must be changed.
 * @param $index  current index of the post inside loop.
 * @since Snow v1.0.0
 */

add_action('snow_display_post',  'introduce_ad_banner_within_loop', 10, 3);

function introduce_ad_banner_within_loop($postindex, $break_count=null, $withExcerpt = false) {

    if( !is_null($break_count) && $postindex === $break_count ) {

      if( $withExcerpt ) {
        echo '<article class="c-article col-md-4 col-lg-4"><img class="ad-banner" src='.get_template_directory_uri().'/assets/image/dummy-ad.jpg alt="ad-image"></article>';
      } else {
        echo '<article class="c-article" ><img class="ad-banner" src='.get_template_directory_uri().'/assets/image/dummy-ad.jpg alt="ad-image"></article>';
      }

    } else {

      echo snow_article_layout($withExcerpt);

    }

}
