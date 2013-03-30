<?php
//
// Include all custom post types here (one custom post type per file)
//
$cpt_files = apply_filters('load_custom_post_type_files', array(
	'functions/post_types/page',
	'functions/post_types/product',
	'functions/post_types/slider',
	'functions/post_types/testimonial'
));
foreach($cpt_files as $cpt_file) get_template_part($cpt_file);


add_action( 'init', 'ci_tax_create_taxonomies');
if( !function_exists('ci_tax_create_taxonomies') ):
function ci_tax_create_taxonomies() {
	//
	// Create all taxonomies here.
	//
	$labels = array(
		'name' => _x( 'Product Categories', 'taxonomy general name', 'ci_theme' ),
		'singular_name' => _x( 'Product Category', 'taxonomy singular name', 'ci_theme' ),
		'search_items' =>  __( 'Search Product Categories', 'ci_theme' ),
		'all_items' => __( 'All Product Categories', 'ci_theme' ),
		'parent_item' => __( 'Parent Product Category', 'ci_theme' ),
		'parent_item_colon' => __( 'Parent Product Category:', 'ci_theme' ),
		'edit_item' => __( 'Edit Product Category', 'ci_theme' ), 
		'update_item' => __( 'Update Product Category', 'ci_theme' ),
		'add_new_item' => __( 'Add New Product Category', 'ci_theme' ),
		'new_item_name' => __( 'New Product Category Name', 'ci_theme' ),
	); 	
	register_taxonomy(
		"product_category", 
		"product", 
		array(
			"hierarchical" => true, 
			"labels" => $labels,
			"rewrite" => true
		)
	);

}
endif;

add_action('admin_enqueue_scripts', 'ci_load_post_scripts');
if( !function_exists('ci_load_post_scripts') ):
function ci_load_post_scripts($hook)
{
	//
	// Add here all scripts and styles, to load on all admin pages.
	//	

	
	if('post.php' == $hook or 'post-new.php' == $hook)
	{
		//
		// Add here all scripts and styles, specific to post edit screens.
		//
		global $wp_version;
		if(version_compare($wp_version, '3.5', '<'))
		{
			wp_enqueue_script('ci-post-edit-scripts', get_child_or_parent_file_uri('/js/post-edit-screens-3.3.js'), array('jquery'), CI_THEME_VERSION, true);
		}
		if(version_compare($wp_version, '3.5', '>='))
		{
			wp_enqueue_script('ci-post-edit-scripts', get_child_or_parent_file_uri('/js/post-edit-screens-3.5.js'), array('jquery'), CI_THEME_VERSION, true);
		}

	}
}
endif;

add_filter('request', 'ci_feed_request');
if( !function_exists('ci_feed_request') ):
function ci_feed_request($qv) {
	if (isset($qv['feed']) && !isset($qv['post_type'])){

		$qv['post_type'] = array();
		$qv['post_type'] = get_post_types($args = array(
	  		'public'   => true,
	  		'_builtin' => false
		));
		$qv['post_type'][] = 'post';
	}
	return $qv;
}
endif;
?>
