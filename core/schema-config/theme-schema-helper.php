<?php
/**
 *  The file includes all the helper methods used
 *  in the theme to create schema support.
 *	
 *  @source https://schema.org
 *  @since gridlife v1.0.0
 */

// Get Config file for values 
	
function set_schema_type($typefor) {


	$schema = get_schema();

	return $schema[$typefor]["itemtype"];

}

function set_schema_title_prop($typefor) {

	$schema = get_schema();

	return $schema[$typefor]["itemproptitle"];

}

function set_schema_url_prop($typefor) {

	$schema = get_schema();

	return $schema[$typefor]["itempropurl"];

}