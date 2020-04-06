<?php
/** 
 * Config values for schema org
 * 
 * @source https://schema.org
 * @since Gridlife 1.0.0
 * 
 */


	
function get_schema() {

	$schema=array(

		'excerpt' => array(

			'itemtype' => "http://schema.org/NewsArticle",
			'itemproptitle' => "name",
			'itempropurl' => "url",
			
		),
		'article' => array(
			'itemtype' => "http://schema.org/NewsArticle",
		),


	);

	return  apply_filters('gridlife_schema_builder_config', $schema);

}