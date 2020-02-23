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

if(!function_exists('snow_set_sidebar_layout')):

	function snow_set_sidebar_label ( $section_category ) {

		if(!$section_category){
			return;
		}

		$category = $section_category;

		$heading = '';
		$description = '';
		$color = '';

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
			
			$section_heading = snow_split_string( $heading, 'समाचार' );



		return wp_sprintf('
			<div class="c-section-label %1$s">
				<header class="c-aside-header">
					<h1>%2$s</h1>
				</header>
				<p class="c-aside-caption">%3$s</p>
			</div>', $bg_color, $section_heading, $description);

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

		return wp_sprintf('<article itemscope itemtype="%1$s" 
			style="background-image:url(%2$s)" 
			class="post-%3$s c-article %8$s has-Background-img">

			<div data-link="%6$s" class="c-excerpt">
				%4$s
				<h6 itemprop="%5$s" class="c-article-title">
					<a href="%6$s" alt="link to news">
						%7$s
					</a>
				</h6>
				%9$s
			</div>

		</article>', 
			set_schema_type('excerpt'),
			esc_url(get_the_post_thumbnail_url()),
			$post_id,
			$post_meta,
			set_schema_title_prop('excerpt'),
			esc_url(get_the_permalink($post_id)),
			esc_html__(get_the_title()),
			$class,
			$custom_excerpt

		);

	}
endif; 