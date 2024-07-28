<?php	

/*
* @Author 		pickplugins
* Copyright: 	2015 pickplugins
*/

if ( ! defined('ABSPATH')) exit;  // if direct access	


if(current_user_can('manage_options')):



    if(empty($_POST['pricingtable_hidden']))
        {

	        $nonce = '';


        }
    else
        {

            $nonce = sanitize_text_field($_POST['_wpnonce']);
            //if($_POST['pricingtable_hidden'] == 'Y') {
            if(wp_verify_nonce( $nonce, 'pricingtable_license' ) && $_POST['pricingtable_hidden'] == 'Y') {

                ?>
                <div class="updated"><p><strong><?php _e('Changes Saved.', 'pricingtable' ); ?></strong></p></div>

                <?php
                }
        }



    ?>





    <div class="wrap">

        <div id="icon-tools" class="icon32"><br></div><?php echo "<h2>".__(pricingtable_plugin_name.' Migrate', 'pricingtable')."</h2>";?>
            <form  method="post" action="<?php echo str_replace( '%7E', '~', esc_url_raw($_SERVER['REQUEST_URI'])); ?>">
        <input type="hidden" name="pricingtable_hidden" value="Y">
            <?php //settings_fields( 'pricingtable_plugin_options' );
                    //do_settings_sections( 'pricingtable_plugin_options' );

            ?>

        <div class="para-settings pricingtable-settings">

            <ul class="tab-nav">
                <li nav="1" class="nav1 active">Migrate</li>

            </ul> <!-- tab-nav end -->
            <ul class="box">
                <li style="display: block;" class="box1 tab-box active">

                    <div class="option-box">
                        <p class="option-title">Migrating...</p>

                        <?php

                        $wp_query = new WP_Query(
	                        array (
		                        'post_type' => 'pricingtable',
		                        'post_status' => 'publish',
		                        //'s' => $keywords,
		                        'orderby' => 'Date',
		                        //'meta_query' => $meta_query,
		                        //'tax_query' => $tax_query,
		                        'order' => 'DESC',
		                        'posts_per_page' => -1,


	                        ) );

                        if ( $wp_query->have_posts() ) :
	                        while ( $wp_query->have_posts() ) : $wp_query->the_post();

                                $pricingtable_themes = get_post_meta(get_the_id(),'pricingtable_themes', true);
		                        $pricingtable_column_ribbon = get_post_meta(get_the_id(),'pricingtable_column_ribbon', true);
		                        $pricingtable_cell_signup_name = get_post_meta(get_the_id(),'pricingtable_cell_signup_name', true);
		                        $pricingtable_column_width = get_post_meta(get_the_id(),'pricingtable_column_width', true);



		                        if($pricingtable_themes=='sonnet'){
		                            update_post_meta(get_the_id(),'pricingtable_themes','semi-rounded');
                                }
		                        elseif($pricingtable_themes=='flat'){
			                        update_post_meta(get_the_id(),'pricingtable_themes','flat');
		                        }

                                elseif($pricingtable_themes=='rounded'){
			                        update_post_meta(get_the_id(),'pricingtable_themes','rounded');
		                        }

                                else{
	                                update_post_meta(get_the_id(),'pricingtable_themes','flat');
                                }


                                foreach ($pricingtable_cell_signup_name as $index=>$signup){

                                    $signup_button_style[$index] = 'rounded';

                                }

		                        update_post_meta(get_the_id(),'signup_button_style', $signup_button_style);


		                        foreach ($pricingtable_column_ribbon as $index=>$signup){

			                        $column_ribbon_position[$index] = 'topleft';

		                        }

		                        update_post_meta(get_the_id(),'column_ribbon_position', $column_ribbon_position);

		                        foreach ($pricingtable_column_width as $index=>$width){

		                            if(strpos($width, 'px')){
			                            $pricingtable_column_width_new[$index] = $width;
                                    }
                                    else{
	                                    $pricingtable_column_width_new[$index] = $width.'px';
                                    }

		                        }


		                        update_post_meta(get_the_id(),'pricingtable_column_width', $pricingtable_column_width_new);














                                //var_dump($signup_button_style);


                                ?>
                                <div class="">
                                    <?php
                                    echo '<i class="fa fa-check"></i> '.get_the_title();


                                    ?>
                                </div>
                                <?php





	                        endwhile;

                        endif;



                        update_option('pricingtable_data_migrate','done');
                        //delete_option('pricingtable_data_migrate');


                        ?>
                    </div>


                </li>

            </ul>





        </div>



            </form>


    </div>

<?php
endif;
    ?>