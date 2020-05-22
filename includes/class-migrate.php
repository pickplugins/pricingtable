<?php

if ( ! defined('ABSPATH')) exit;  // if direct access 

class class_pricingtable_migrate{
	
	public function __construct(){
		//add_action('admin_notices', array($this,'admin_menu'));

	}


	function admin_menu(){

		$pricingtable_data_migrate = get_option('pricingtable_data_migrate');

		if(empty($pricingtable_data_migrate)):
			$admin_url = get_admin_url();

			?>
			<div class="update-nag">
				Data update required for PricingTable <a href="<?php echo $admin_url; ?>edit.php?post_type=pricingtable&page=pricingtable_migrate"><b>Click here</b></a>
			</div>
			<?php


		endif;



	}



	
	
}

new class_pricingtable_migrate();