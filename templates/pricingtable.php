<?php
if ( ! defined('ABSPATH')) exit;  // if direct access




$class_pricingtable_functions = new class_pricingtable_functions();
$column_item_position_list = $class_pricingtable_functions->column_item_position();

include pricingtable_plugin_dir.'/templates/variables.php';
include pricingtable_plugin_dir.'/templates/scripts.php';


//var_dump($pricingtable_column_ribbon);

if(empty($pricingtable_themes)){
	$pricingtable_themes = 'flat';
}

wp_enqueue_style('pricingtable_themes', pricingtable_plugin_url.'templates/themes/'.$pricingtable_themes.'/style.css');

?>
	<style type="text/css">
        .pricingtable-<?php echo $post_id; ?> .column-item-data.odd{
        <?php if(!empty($pricingtable_row_bg_odd)): ?>
            background: <?php echo $pricingtable_row_bg_odd; ?>;
        <?php endif; ?>
        }
        .pricingtable-<?php echo $post_id; ?> .column-item-data.even{
        <?php if(!empty($pricingtable_row_bg_even)): ?>
            background: <?php echo $pricingtable_row_bg_even; ?>;
        <?php endif; ?>
        }
	</style>

	<div class="pricingtable   pricingtable-<?php echo $post_id; ?> <?php echo $pricingtable_themes; ?>" style="background:url(<?php echo $pricingtable_bg_img; ?>) repeat scroll 0 0 rgba(0, 0, 0, 0);" >

			<?php

			$j = 1;

			while($j<=$pricingtable_total_column){

				if(!empty($pricingtable_column_featured[$j])) {
					$pricingtable_featured = "featured";
				}
				else {
					$pricingtable_featured = "";
				}

				if(empty($pricingtable_column_width[$j])){
					$pricingtable_column_width[$j] = "";
				}

				if(empty($pricingtable_cell_header_bg_color[$j])){
					$pricingtable_cell_header_bg_color[$j] = "";
				}
				if(empty($pricingtable_cell_header_image[$j])) {
					$pricingtable_cell_header_image[$j] = "";
				}

				if(empty($pricingtable_cell_price_bg_color[$j])){
					$pricingtable_cell_price_bg_color[$j] = "";
				}

				if(empty($pricingtable_cell_signup_bg_color[$j])) {
					$pricingtable_cell_signup_bg_color[$j] = "";
				}

				if(empty($column_ribbon_position[$j])) {
					$column_ribbon_position[$j] = "";
				}

				if(empty($pricingtable_column_margin[$j])) {
					$pricingtable_column_margin[$j] = "";
				}


				if(empty($pricingtable_cell_signup_name[$j])){
					$pricingtable_cell_signup_name[$j] = '<span class="pt-cell-blank normal">&nbsp;</span>';
				}



				?><div style="width:<?php echo $pricingtable_column_width[$j]; ?>;margin:<?php echo $pricingtable_column_margin[$j]; ?> " class="column column-<?php echo $j; ?> <?php echo $pricingtable_featured; ?>">


					<?php

					if(!empty($pricingtable_column_ribbon[$j])) {
						?>
                        <span class="pricingtable-ribbon <?php echo $column_ribbon_position[$j]; ?> ribbon-<?php echo $pricingtable_column_ribbon[$j]; ?>"></span>
						<?php
					}

					if(empty($column_item_position)){
						$column_item_position = $column_item_position_list;
                    }

                    //var_dump($column_item_position);



                    if(!empty($column_item_position)){

	                    foreach ($column_item_position as $item_index=>$item){

		                    $is_hide = $item['is_hide'];

		                    if($item_index=='body'){
			                    ?>
                                <div class="column-item column-item-body">
			                    <?php

			                    $i = 1;
			                    while($i<=$pricingtable_total_row){

				                    if($i == 1 || $i == 2 || $i == $pricingtable_total_row){

				                    }
				                    else{
					                    if($is_hide!='yes'){
					                    include pricingtable_plugin_dir.'/templates/col-body.php';

					                    }
				                    }

				                    $i++;

			                    }
			                    ?>
                                </div>
			                    <?php

		                    }
		                    else{
			                    if($is_hide!='yes'){
				                    include pricingtable_plugin_dir.'/templates/col-'.$item_index.'.php';
			                    }


		                    }
	                    }
                    }

                    ?>


				</div><?php



				$j++;
			}



			?>

	</div>


<?php


//include pricingtable_plugin_dir.'/templates/themes/'.$pricingtable_themes.'/index.php';