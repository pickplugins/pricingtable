<?php	
/*
* @Author 		pickplugins
* Copyright: 	2015 pickplugins
*/

if ( ! defined('ABSPATH')) exit;  // if direct access	



	if(empty($_POST['pricingtable_hidden']))
		{
			$pricingtable_ribbons = get_option( 'pricingtable_ribbons' );
			
			
		}
	else
		{
					
				
		if($_POST['pricingtable_hidden'] == 'Y') {
			//Form data sent

			$pricingtable_ribbons = pricingtable_recursive_sanitize_arr($_POST['pricingtable_ribbons']);
			update_option('pricingtable_ribbons', $pricingtable_ribbons);


			?>
			<div class="updated"><p><strong><?php _e('Changes Saved.' ); ?></strong></p></div>

			<?php
		} 
	}
	

	
	
	
	
	
?>





<div class="wrap">

	<div id="icon-tools" class="icon32"><br></div><?php echo "<h2>".__(pricingtable_plugin_name.' Settings')."</h2>";?>
		<form  method="post" action="<?php echo str_replace( '%7E', '~', esc_url_raw($_SERVER['REQUEST_URI'])); ?>">
	<input type="hidden" name="pricingtable_hidden" value="Y">
        <?php settings_fields( 'pricingtable_plugin_options' );
				do_settings_sections( 'pricingtable_plugin_options' );
			
		?>
        
        
	<div class="para-settings">
        <ul class="tab-nav"> 
            <li nav="1" class="nav1 active">Help</li>

        </ul> <!-- tab-nav end -->
    
		<ul class="box">
            <li style="display: block;" class="box1 tab-box active">







                <div class="option-box">
                    <p class="option-title"></p>
                    <p class="option-info"></p>
                 
                </div>

            </li>
            <li style="display: none;" class="box2 tab-box"></li>

        </ul>
    
    
    
    </div>    





		</form>


</div>
