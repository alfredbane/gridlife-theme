<?php
/** 
 * Config values for schema org
 * 
 * @source https://schema.org
 * @since Snow 1.0.0
 * 
 */


	
function get_schema() {

	$schema=array(

		'excerpt' => array(

			'itemtype' => "http://schema.org/Newspaper",
			'itemproptitle' => "name",
			'itempropurl' => "url"
			
		),
		'article' => array(
			'itemtype' => "http://schema.org/Newspaper",
		),


	);

	return  apply_filters('snow_schema_builder_config', $schema);

}