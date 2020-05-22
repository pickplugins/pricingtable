<?php

/*
* @Author 		pickplugins
* Copyright: 	2015 pickplugins
*/

if ( ! defined('ABSPATH')) exit;  // if direct access	

if(empty($pricingtable_cell[$i.$j])){
	$pricingtable_cell[$i.$j] = '<span class="pt-cell-blank normal">&nbsp;</span>';
}

if($i%2 == 0){

    $odd_even_class = 'even';
}
else{
	$odd_even_class = 'odd';
}


?>
<div class="column-item-data <?php echo $odd_even_class; ?>"><?php echo $pricingtable_cell[$i.$j]; ?></div>
<?php


