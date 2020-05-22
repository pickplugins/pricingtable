<?php

/*
* @Author 		pickplugins
* Copyright: 	2015 pickplugins
*/

if ( ! defined('ABSPATH')) exit;  // if direct access 

class class_post_types_pricingtable{
	
	public function __construct(){
		
		add_action( 'init', array( $this, '_posttype_pricingtable' ), 0 );


    }
	
	public function _posttype_pricingtable(){
		if ( post_type_exists( "pricingtable" ) )
		return;

		$singular  = __( 'Pricing Table', 'pricingtable' );
		$plural    = __( 'Pricing Tables', 'pricingtable' );
	 
	 
		register_post_type( "pricingtable",
			apply_filters( "_post_type_pricingtable", array(
				'labels' => array(
					'name' 					=> $plural,
					'singular_name' 		=> $singular,
					'menu_name'             => $singular,
					'all_items'             => sprintf( __( 'All %s', 'pricingtable' ), $plural ),
					'add_new' 				=> sprintf( __( 'Add %s', 'pricingtable' ), $singular ),
					'add_new_item' 			=> sprintf( __( 'Add %s', 'pricingtable' ), $singular ),
					'edit' 					=> __( 'Edit', 'pricingtable' ),
					'edit_item' 			=> sprintf( __( 'Edit %s', 'pricingtable' ), $singular ),
					'new_item' 				=> sprintf( __( 'New %s', 'pricingtable' ), $singular ),
					'view' 					=> sprintf( __( 'View %s', 'pricingtable' ), $singular ),
					'view_item' 			=> sprintf( __( 'View %s', 'pricingtable' ), $singular ),
					'search_items' 			=> sprintf( __( 'Search %s', 'pricingtable' ), $plural ),
					'not_found' 			=> sprintf( __( 'No %s found', 'pricingtable' ), $plural ),
					'not_found_in_trash' 	=> sprintf( __( 'No %s found in trash', 'pricingtable' ), $plural ),
					'parent' 				=> sprintf( __( 'Parent %s', 'pricingtable' ), $singular )
				),
				'description' => sprintf( __( 'This is where you can create and manage %s.', 'pricingtable' ), $plural ),
				'public' 				=> true,
				'show_ui' 				=> true,
				'capability_type' 		=> 'post',
				'map_meta_cap'          => true,
				'publicly_queryable' 	=> true,
				'exclude_from_search' 	=> false,
				'hierarchical' 			=> false,
				'rewrite' 				=> true,
				'query_var' 			=> true,
				'supports' 				=> array('title','author'),
				'show_in_nav_menus' 	=> false,
				'menu_icon' => 'dashicons-editor-table',
			) )
		); 
	 
	 
		}



}
	

new class_post_types_pricingtable();