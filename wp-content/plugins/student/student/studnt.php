<?php
function area1_register_post_type() {
	
	$singular = 'Area1 Article';
	$plural = 'Area1 Articles';
	$slug = str_replace( ' ', '_', strtolower( $singular ) );
	$labels = array(
		'name' 					=> 'Area I',
		'singular_name' 		=> $singular,
		'add_new' 				=> 'Add New',
		'add_new_item'  		=> 'Add New ' . $singular,
		'edit'		      	    => 'Edit',
		'edit_item'	      	  	=> 'Edit ' . $singular,
		'new_item'	      	 	=> 'New ' . $singular,
		'view' 					=> 'View ' . $singular,
		'view_item' 			=> 'View ' . $singular,
		'search_term'   		=> 'Search ' . $plural,
		'parent' 				=> 'Parent ' . $singular,
		'not_found' 			=> 'No ' . $plural .' found',
		'not_found_in_trash' 	=> 'No ' . $plural .' in Trash'
		);
	$args = array(
		'labels'              => $labels,
	        'public'              => true,
	        'publicly_queryable'  => true,
	        'exclude_from_search' => false,
	        'show_in_nav_menus'   => true,
	        'show_ui'             => true,
	        'show_in_menu'        => true,
	        'show_in_admin_bar'   => true,
	        'menu_position'       => 26,
	        'menu_icon'           => 'dashicons-media-document',
	        'can_export'          => true,
	        'delete_with_user'    => false,
	        'hierarchical'        => false,
	        'has_archive'         => true,
	        'query_var'           => true,
	        'capability_type'     => 'post',
	        'map_meta_cap'        => true,
	        // 'capabilities' => array(),
	        'rewrite'             => array( 
	        	'slug' => $slug,
	        	'with_front' => true,
	        	'pages' => true,
	        	'feeds' => true,
	        ),
	        'supports'            => array( 
	        	'title',
	        	'editor',
	        	// 'thumbnail'
	        	//'author', 
	        	//'custom-fields',
	        //	'comments' 

	        )
	);
	register_post_type( $slug, $args );

}

add_action( 'init', 'area1_register_post_type' );

 
function set_columns_head($defaults) {
	$defaults = array();
	$defaults['cb'] = 'cb';
	$defaults['title'] = 'Article Title';
	$defaults['content'] = 'Article Content';
	$defaults['date'] = 'Date';
	$defaults['url'] = 'Permalink';
	$defaults['pdf'] = 'PDF';
	$defaults['qr'] = 'QR code';
	

   
    return $defaults;
}
 
// SHOW THE FEATURED IMAGE
function set_columns_content($column, $post_ID) {
	switch ($column) {
		case 'content':
			echo get_the_excerpt();
			break;
		case 'qr':
			echo '<a target="_blank" href="'.get_post_meta(get_the_ID(),'qr_image_url',true).'"> <img width="50%" height="auto" src="' . get_post_meta(get_the_ID(),'qr_image_url',true) . '" /></a>';
			break;
		case 'url':
			echo '<a href="get_the_permalink()">'.get_the_permalink().'</a>';
			break;
		// case 'pdf':
		// 	echo '<a href="get_the_permalink('.'wp_custom_attachment'.')">'.basename(get_attachedget_post_meta(get_the_ID(),'wp_custom_attachment',true)).'</a>';
		// 	break;		
	 
	}
    
}
add_filter('manage_area1_article_posts_columns', 'set_columns_head');
add_action('manage_area1_article_posts_custom_column', 'set_columns_content', 10, 2);

// function D_register_taxonomy() {
// 		$singular = 'Location';
// 		$plural = 'Locations';
// 		$slug = str_replace( ' ', '_', strtolower( $singular ) );
		
// 		$labels = array(
// 			'name' => $plural,
// 			'singular_name' => $singular,
// 			'search_items' => 'Search ' . $plural,
// 			'popular_items' => 'Popular ' . $plural,
// 			'all_items' => 'All ' . $plural,
// 			'parent_item' => null,
// 			'parent_item_colon' => null,
// 			'edit_item' => 'Edit ' . $singular,
// 			'update_item' => 'Update ' . $singular,
// 			'add_new_item' => 'Add New ' . $singular,
// 			'new_item_name' => 'New ' . $singular . ' Name',
// 			'separate_items_with_commas' => 'Separate ' . $plural . ' with commas',
// 			'add_or_remove_items' => 'Add or remove ' . $plural,
// 			'choose_from_most_used' => 'Choose from the most used ' . $plural,
// 			'not_found' => 'No ' . $plural . ' found.',
// 			'menu_name' => $plural,

// 			);
// 		$args = array(
// 			'hierarchical' => false,
// 			'labels' => $labels,
// 			'show_ui' => true,
// 			'show_admin_column' => true,
// 			'update_count_callback' => '_update_post_term_count',
// 			'query_var' => true,
// 			'rewrite' => array( 'slug' => $slug ),
// 			);
// 		register_taxonomy( $slug, 'area1article', $args );
// }
// add_action( 'init', 'D_register_taxonomy' );

 

// function D_load_template( $orignal_template ){
// 	if( get_query_var( 'post_type' )!== 'article'){

// 		return;

// 	}
// 	if( is_archive() || is_search() ){

// 		if( file_exists(get_stylesheet_directory() . '/archive-job.php') ){

// 			return get_stylesheet_directory() . '/archive-job.php';

// 		}else{

// 			return plugin_dir_path(__FILE__) . 'templates/archive-job.php';

// 		}

// 	}
// 	elseif( is_singular('article') ){

// 		if( file_exists(get_stylesheet_directory() . '/single-job.php') ){

// 			return get_stylesheet_directory() . '/single-job.php';

// 		}else{

// 			return plugin_dir_path(__FILE__) . 'templates/single-job.php';

// 		}

// 	}

// 	return $orignal_template;

// }
// add_action('template_include', 'D_load_template');

 