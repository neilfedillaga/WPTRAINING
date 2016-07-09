<?php


if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

require_once ( plugin_dir_path(__FILE__) . 'area1.php' );

// require_once ( plugin_dir_path(__FILE__) . 'shortcode.php' );
// require_once ( plugin_dir_path(__FILE__) . 'settings.php' );
// require_once ( plugin_dir_path(__FILE__) . 'Qrcodemeta.php' );
// require_once ( plugin_dir_path(__FILE__) . '../Area2/Area2_article.php' );

// function D_enqueue_script(){
// 	global $pagenow, $typenow;
// 	if ( $typenow == 'article') {
// 		wp_enqueue_style( 'style', plugins_url( 'css/style.css', __FILE__ ) );
// 	}
// 	if ( ($pagenow == 'post.php' || $pagenow == 'post-new.php') && $typenow == 'article' ) {
		
// 		// wp_enqueue_script( 'dwwwp-job-js', plugins_url( 'js/admin-jobs.js', __FILE__ ), array( 'jquery', 'jquery-ui-datepicker' ), '20150204', true );
// 		wp_enqueue_script( 'second-image', plugins_url( 'js/SetQrcode.js', __FILE__ ), array(), '20160625', true );
// 		wp_enqueue_style( 'jquery-style', 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.2/themes/smoothness/jquery-ui.css' );
// 	}
// 	if ( $pagenow =='edit.php' && $typenow == 'article') {
// 		wp_enqueue_script( 'reorder-js', plugins_url( 'js/reupload.js', __FILE__ ), array( 'jquery', 'jquery-ui-sortable' ), '20160615', true );
// 		wp_localize_script( 'reorder-js', 'WP_UPLOAD_FILE', array(
// 			'security' => wp_create_nonce( 'wp-file-order' ),
// 			'success' => 'File sort order has been saved.' ,
// 			'failure' => 'There was an error saving the sort order, or you do not have proper permissions.' 
// 		) );
// 	}
// }
// add_action( 'admin_enqueue_scripts', 'D_enqueue_script' );