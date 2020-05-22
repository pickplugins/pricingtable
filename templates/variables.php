<?php

/*
* @Author 		pickplugins
* Copyright: 	2015 pickplugins
*/

if ( ! defined('ABSPATH')) exit;  // if direct access	

$pricingtable_ribbons = get_option( 'pricingtable_ribbons' );
$pricingtable_hide_empty_row = get_post_meta( $post_id, 'pricingtable_hide_empty_row', true );
//$pricingtable_hover_effect = get_post_meta( $post_id, 'pricingtable_hover_effect', true );
$pricingtable_bg_img = get_post_meta( $post_id, 'pricingtable_bg_img', true );
$pricingtable_themes = get_post_meta( $post_id, 'pricingtable_themes', true );

if(empty($pricingtable_themes)) $pricingtable_themes = 'flat';

$column_item_position = get_post_meta( $post_id, 'column_item_position', true );


$pricingtable_total_column = get_post_meta( $post_id, 'pricingtable_total_column', true );
$pricingtable_total_row = get_post_meta( $post_id, 'pricingtable_total_row', true );

$pricingtable_cell = get_post_meta( $post_id, 'pricingtable_cell', true );
$pricingtable_column_width = get_post_meta( $post_id, 'pricingtable_column_width', true );
$pricingtable_column_margin = get_post_meta( $post_id, 'pricingtable_column_margin', true );

$pricingtable_column_featured = get_post_meta( $post_id, 'pricingtable_column_featured', true );
$pricingtable_column_ribbon = get_post_meta( $post_id, 'pricingtable_column_ribbon', true );
$column_ribbon_position = get_post_meta( $post_id, 'column_ribbon_position', true );


$pricingtable_cell_header_description = get_post_meta( $post_id, 'pricingtable_cell_header_description', true );
$pricingtable_cell_header_image = get_post_meta( $post_id, 'pricingtable_cell_header_image', true );
$pricingtable_cell_header_bg_color = get_post_meta( $post_id, 'pricingtable_cell_header_bg_color', true );
$pricingtable_cell_header_text = get_post_meta( $post_id, 'pricingtable_cell_header_text', true );
$pricingtable_cell_header_text_font_size = get_post_meta( $post_id, 'pricingtable_cell_header_text_font_size', true );
$pricingtable_cell_header_font_color = get_post_meta( $post_id, 'pricingtable_cell_header_font_color', true );


$pricingtable_cell_price_duration = get_post_meta( $post_id, 'pricingtable_cell_price_duration', true );
$pricingtable_cell_price = get_post_meta( $post_id, 'pricingtable_cell_price', true );
$pricingtable_cell_price_bg_color = get_post_meta( $post_id, 'pricingtable_cell_price_bg_color', true );
$pricingtable_cell_price_font_color = get_post_meta( $post_id, 'pricingtable_cell_price_font_color', true );
$pricingtable_cell_price_font_size = get_post_meta( $post_id, 'pricingtable_cell_price_font_size', true );

$pricingtable_cell_signup_bg_color = get_post_meta( $post_id, 'pricingtable_cell_signup_bg_color', true );
$pricingtable_cell_signup_button_bg_color = get_post_meta( $post_id, 'pricingtable_cell_signup_button_bg_color', true );
$signup_button_font_color = get_post_meta( $post_id, 'signup_button_font_color', true );

$signup_button_style = get_post_meta( $post_id, 'signup_button_style', true );
$pricingtable_cell_signup_name = get_post_meta( $post_id, 'pricingtable_cell_signup_name', true );
$pricingtable_cell_signup_url = get_post_meta( $post_id, 'pricingtable_cell_signup_url', true );

$pricingtable_row_bg_odd = get_post_meta( $post_id, 'pricingtable_row_bg_odd', true );
$pricingtable_row_bg_even = get_post_meta( $post_id, 'pricingtable_row_bg_even', true );

$column_animation = get_post_meta( $post_id, 'column_animation', true );
$column_animation_duration = get_post_meta( $post_id, 'column_animation_duration', true );
$mobile_enable_slider = get_post_meta( $post_id, 'mobile_enable_slider', true );


$class_pricingtable_functions = new class_pricingtable_functions();
$column_item_position_list = $class_pricingtable_functions->column_item_position();


