<?php

/*
* @Author 		pickplugins
* Copyright: 	2015 pickplugins
*/

if ( ! defined('ABSPATH')) exit;  // if direct access	

?><div  style=" background-color:<?php if(isset($pricingtable_cell_price_bg_color[$j])) echo $pricingtable_cell_price_bg_color[$j];  ?>; color:<?php if(isset($pricingtable_cell_price_font_color[$j])) echo $pricingtable_cell_price_font_color[$j];  ?>" class="column-item column-item-price">
	<span style='font-size:<?php if(isset($pricingtable_cell_price_font_size[$j])) echo $pricingtable_cell_price_font_size[$j];  ?>;line-height:<?php if(isset($pricingtable_cell_price_font_size[$j])) echo $pricingtable_cell_price_font_size[$j];  ?>;color:<?php if(isset($pricingtable_cell_price_font_color[$j])) echo $pricingtable_cell_price_font_color[$j];  ?>' class='price-value'><?php if(isset($pricingtable_cell_price[$j])) echo $pricingtable_cell_price[$j];  ?></span>
	<?php
	if(!empty($pricingtable_cell_price_duration[$j])) {
		?>
		<span class='pt-pd'><?php if(isset($pricingtable_cell_price_duration[$j])) echo $pricingtable_cell_price_duration[$j];  ?></span>
		<?php

	}

	?></div>