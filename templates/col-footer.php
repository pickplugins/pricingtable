<?php

/*
* @Author 		pickplugins
* Copyright: 	2015 pickplugins
*/

if ( ! defined('ABSPATH')) exit;  // if direct access	

if(!empty($pricingtable_cell_signup_button_bg_color[$j]))
{
	$pricingtable_cell_signup_button_bg_color[$j] =  $pricingtable_cell_signup_button_bg_color[$j];
}

?><div style=" background-color:<?php echo $pricingtable_cell_signup_bg_color[$j]; ?>" class="column-item column-item-footer">
	<a style="background-color:<?php if(isset($pricingtable_cell_signup_button_bg_color[$j])) echo $pricingtable_cell_signup_button_bg_color[$j]; ?>;color:<?php if(isset($signup_button_font_color[$j])) echo $signup_button_font_color[$j]; ?>" class="pricingtable-signup-name pricingtable-button <?php if(isset($signup_button_style[$j])) echo $signup_button_style[$j];  ?>" href="<?php if(isset($pricingtable_cell_signup_url[$j]) ) echo $pricingtable_cell_signup_url[$j];  ?>"><?php if(isset($pricingtable_cell_signup_name[$j])) echo $pricingtable_cell_signup_name[$j];  ?></a>
</div>