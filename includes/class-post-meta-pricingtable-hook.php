<?php
if ( ! defined('ABSPATH')) exit;  // if direct access





add_action('pricingtable_metabox_content_shortcode', 'pricingtable_metabox_content_shortcode',10, 2);

function pricingtable_metabox_content_shortcode($post_id){

    $pickp_settings_tabs_field = new pickp_settings_tabs_field();


    ?>
    <div class="section">
        <div class="section-title">Shortcodes</div>
        <p class="description section-description">Simply copy these shortcode and user under content</p>


        <?php


        ob_start();

        ?>

        <div class="copy-to-clipboard">
            <input type="text" value="[pricingtable id='<?php echo $post_id;  ?>']"> <span class="copied">Copied</span>
            <p class="description">You can use this shortcode under post content</p>
        </div>

        <div class="copy-to-clipboard">
            To avoid conflict:<br>
            <input type="text" value="[pricingtable_pickplugins id='<?php echo $post_id;  ?>']"> <span class="copied">Copied</span>
            <p class="description">To avoid conflict with 3rd party shortcode also used same <code>[pricingtable]</code>You can use this shortcode under post content</p>
        </div>

        <div class="copy-to-clipboard">
            <textarea cols="50" rows="1" onClick="this.select();" ><?php echo '<?php echo do_shortcode("[pricingtable id='; echo "'".$post_id."']"; echo '"); ?>'; ?></textarea> <span class="copied">Copied</span>
            <p class="description">PHP Code, you can use under theme .php files.</p>
        </div>

        <div class="copy-to-clipboard">
            <textarea cols="50" rows="1" onClick="this.select();" ><?php echo '<?php echo do_shortcode("[pricingtable_pickplugins id='; echo "'".$post_id."']"; echo '"); ?>'; ?></textarea> <span class="copied">Copied</span>
            <p class="description">To avoid conflict, PHP code you can use under theme .php files.</p>
        </div>

        <style type="text/css">
            .copy-to-clipboard{}
            .copy-to-clipboard .copied{
                display: none;
                background: #e5e5e5;
                padding: 4px 10px;
                line-height: normal;
            }
        </style>

        <script>
            jQuery(document).ready(function($){
                $(document).on('click', '.copy-to-clipboard input, .copy-to-clipboard textarea', function () {
                    $(this).focus();
                    $(this).select();
                    document.execCommand('copy');
                    $(this).parent().children('.copied').fadeIn().fadeOut(2000);
                })
            })
        </script>
        <?php
        $html = ob_get_clean();
        $args = array(
            'id'		=> 'pricingtable_shortcodes',
            'title'		=> __('Pricing Table Shortcode','pricingtable'),
            'details'	=> '',
            'type'		=> 'custom_html',
            'html'		=> $html,
        );
        $pickp_settings_tabs_field->generate_field($args, $post_id);


        ?>
    </div>
    <?php
}




add_action('pricingtable_metabox_content_table_data', 'pricingtable_metabox_content_table_data',10, 2);

function pricingtable_metabox_content_table_data($post_id){

    $pickp_settings_tabs_field = new pickp_settings_tabs_field();






    //$pricingtable_hover_effect = get_post_meta( $post_id, 'pricingtable_hover_effect', true );
    $pricingtable_bg_img = get_post_meta( $post_id, 'pricingtable_bg_img', true );
    $pricingtable_themes = get_post_meta( $post_id, 'pricingtable_themes', true );

    if(empty($pricingtable_themes)) $pricingtable_themes = 'flat';

    $column_item_position = get_post_meta( $post_id, 'column_item_position', true );

    $pricingtable_total_row = get_post_meta( $post_id, 'pricingtable_total_row', true );
    $pricingtable_total_column = get_post_meta( $post_id, 'pricingtable_total_column', true );

    if(empty($pricingtable_total_row))
    {
        $pricingtable_total_row = 7;
    }

    if(empty($pricingtable_total_column))
    {
        $pricingtable_total_column = 3;
    }

    $pricingtable_cell = get_post_meta( $post_id, 'pricingtable_cell', true );
    $pricingtable_cell = !empty($pricingtable_cell) ? $pricingtable_cell : array();

    $pricingtable_column_width = get_post_meta( $post_id, 'pricingtable_column_width', true );
    $pricingtable_column_width = !empty($pricingtable_column_width) ? $pricingtable_column_width : array();


    $pricingtable_column_margin = get_post_meta( $post_id, 'pricingtable_column_margin', true );
    $pricingtable_column_margin = !empty($pricingtable_column_margin) ? $pricingtable_column_margin : array();


    $pricingtable_column_featured = get_post_meta( $post_id, 'pricingtable_column_featured', true );
    $pricingtable_column_ribbon = get_post_meta( $post_id, 'pricingtable_column_ribbon', true );
    $pricingtable_column_ribbon = !empty($pricingtable_column_ribbon) ? $pricingtable_column_ribbon : array();


    $column_ribbon_position = get_post_meta( $post_id, 'column_ribbon_position', true );
    $column_ribbon_position = !empty($column_ribbon_position) ? $column_ribbon_position : array();


    $pricingtable_cell_price_duration = get_post_meta( $post_id, 'pricingtable_cell_price_duration', true );
    $pricingtable_cell_price = get_post_meta( $post_id, 'pricingtable_cell_price', true );
    $pricingtable_cell_price_bg_color = get_post_meta( $post_id, 'pricingtable_cell_price_bg_color', true );
    $pricingtable_cell_price_font_color = get_post_meta( $post_id, 'pricingtable_cell_price_font_color', true );
    $pricingtable_cell_price_font_size = get_post_meta( $post_id, 'pricingtable_cell_price_font_size', true );

    $pricingtable_cell_signup_bg_color = get_post_meta( $post_id, 'pricingtable_cell_signup_bg_color', true );
    $pricingtable_cell_signup_button_bg_color = get_post_meta( $post_id, 'pricingtable_cell_signup_button_bg_color', true );
    $pricingtable_cell_signup_button_bg_color = !empty($pricingtable_cell_signup_button_bg_color) ? $pricingtable_cell_signup_button_bg_color : array();


    $signup_button_font_color = get_post_meta( $post_id, 'signup_button_font_color', true );
    $signup_button_font_color = !empty($signup_button_font_color) ? $signup_button_font_color : array();


    $signup_button_style = get_post_meta( $post_id, 'signup_button_style', true );
    $signup_button_style = !empty($signup_button_style) ? $signup_button_style : array();


    $pricingtable_cell_signup_name = get_post_meta( $post_id, 'pricingtable_cell_signup_name', true );
    $pricingtable_cell_signup_url = get_post_meta( $post_id, 'pricingtable_cell_signup_url', true );


    $pricingtable_cell_header_description = get_post_meta( $post_id, 'pricingtable_cell_header_description', true );
    $pricingtable_cell_header_description = !empty($pricingtable_cell_header_description) ? $pricingtable_cell_header_description : array();


    $pricingtable_cell_header_image = get_post_meta( $post_id, 'pricingtable_cell_header_image', true );
    $pricingtable_cell_header_bg_color = get_post_meta( $post_id, 'pricingtable_cell_header_bg_color', true );
    $pricingtable_cell_header_font_color = get_post_meta( $post_id, 'pricingtable_cell_header_font_color', true );
    $pricingtable_cell_header_text = get_post_meta( $post_id, 'pricingtable_cell_header_text', true );

    $pricingtable_cell_header_text = !empty($pricingtable_cell_header_text) ? $pricingtable_cell_header_text : array();

    $pricingtable_cell_header_text_font_size = get_post_meta( $post_id, 'pricingtable_cell_header_text_font_size', true );
    $column_animation = get_post_meta( $post_id, 'column_animation', true );
    $column_animation = !empty($column_animation) ? $column_animation : array();


    $column_animation_duration = get_post_meta( $post_id, 'column_animation_duration', true );



    $class_pricingtable_functions = new class_pricingtable_functions();

    $signup_button_style_list = $class_pricingtable_functions->signup_button_style();
    $pricingtable_themes_list = $class_pricingtable_functions->pricingtable_themes();
    $column_item_position_list = $class_pricingtable_functions->column_item_position();
    $ribbons_list = $class_pricingtable_functions->ribbons();
    $column_animation_list = $class_pricingtable_functions->column_animation();





    ?>
    <div class="section">
        <div class="section-title">Table data</div>
        <p class="description section-description">Customize table data here.</p>

    </div>
    <?php


    $args = array(
        'id'		=> 'pricingtable_total_row',
        'title'		=> __('Total Row','pricingtable'),
        'details'	=> __('Set custom number of row','pricingtable'),
        'type'		=> 'text',
        'value'		=> $pricingtable_total_row,
        'default'		=> '',
        'placeholder'		=> '3',
    );

    $pickp_settings_tabs_field->generate_field($args, $post_id);

    $args = array(
        'id'		=> 'pricingtable_total_column',
        'title'		=> __('Total Column','pricingtable'),
        'details'	=> __('set custom number of column','pricingtable'),
        'type'		=> 'text',
        'value'		=> $pricingtable_total_column,
        'default'		=> '',
        'placeholder'		=> '3',
    );

    $pickp_settings_tabs_field->generate_field($args, $post_id);




    ?>
    <div class="pricingtable_admin_cell">
        <table id="pricingtable_admin" border="0" post_id="<?php echo $post_id; ?>">
            <?php
            for($j=1; $j<=$pricingtable_total_row; $j++){
                if($j==1){
                    ?>
                    <tr class='row-header pricingtable_admin_tr_<?php echo $j; ?>' row_id='<?php echo $j; ?>' >
                    <?php
                }

                elseif($j==2){
                    ?>
                    <tr class='row-price pricingtable_admin_tr_<?php echo $j; ?>' row_id='<?php echo $j; ?>' >
                    <?php
                }

                elseif($j==$pricingtable_total_row){
                    ?>
                    <tr class='row-signup pricingtable_admin_tr_<?php echo $j; ?>' row_id='<?php echo $j; ?>' >
                    <?php
                }


                else{
                    ?>
                    <tr  class='row-data pricingtable_admin_tr_<?php echo $j; ?>' row_id='<?php echo $j; ?>' >

                    <?php

                }

            $pricingtable_cell_header_bg_color = !empty($pricingtable_cell_header_bg_color) ? $pricingtable_cell_header_bg_color : array();
                $pricingtable_cell_header_bg_color = !empty($pricingtable_cell_header_bg_color) ? $pricingtable_cell_header_bg_color : array();
                $pricingtable_cell_header_font_color = !empty($pricingtable_cell_header_font_color) ? $pricingtable_cell_header_font_color : array();
                $pricingtable_cell_header_image = !empty($pricingtable_cell_header_image) ? $pricingtable_cell_header_image : array();
                $pricingtable_cell_header_image = !empty($pricingtable_cell_header_image) ? $pricingtable_cell_header_image : array();
                $pricingtable_column_width = !empty($pricingtable_column_width) ? $pricingtable_column_width : array();
                $pricingtable_column_margin = !empty($pricingtable_column_margin) ? $pricingtable_column_margin : array();
                $pricingtable_cell_price_bg_color = !empty($pricingtable_cell_price_bg_color) ? $pricingtable_cell_price_bg_color : array();
                $pricingtable_cell_price_font_color = !empty($pricingtable_cell_price_font_color) ? $pricingtable_cell_price_font_color : array();
                $pricingtable_cell_price = !empty($pricingtable_cell_price) ? $pricingtable_cell_price : array();
                $pricingtable_cell_signup_bg_color = !empty($pricingtable_cell_signup_bg_color) ? $pricingtable_cell_signup_bg_color : array();
                $pricingtable_cell_signup_name = !empty($pricingtable_cell_signup_name) ? $pricingtable_cell_signup_name : array();
                $pricingtable_cell_signup_url = !empty($pricingtable_cell_signup_url) ? $pricingtable_cell_signup_url : array();
                $pricingtable_cell_price_duration = !empty($pricingtable_cell_price_duration) ? $pricingtable_cell_price_duration : array();
                $pricingtable_cell_header_text_font_size = !empty($pricingtable_cell_header_text_font_size) ? $pricingtable_cell_header_text_font_size : array();
                $pricingtable_cell_price_font_size = !empty($pricingtable_cell_price_font_size) ? $pricingtable_cell_price_font_size : array();
                $column_animation_duration = !empty($column_animation_duration) ? $column_animation_duration : array();




                for($i=1; $i<=$pricingtable_total_column; $i++){


                    $pricingtable_cell_header_text[$i] = isset($pricingtable_cell_header_text[$i])? $pricingtable_cell_header_text[$i] :'';
                    $pricingtable_cell_header_description[$i] = isset($pricingtable_cell_header_description[$i])? $pricingtable_cell_header_description[$i] :'';
                    $pricingtable_cell_header_bg_color[$i] = isset($pricingtable_cell_header_bg_color[$i])? $pricingtable_cell_header_bg_color[$i] :'';
                    $pricingtable_cell_header_font_color[$i] = isset($pricingtable_cell_header_font_color[$i])? $pricingtable_cell_header_font_color[$i] :'';
                    $pricingtable_cell_header_image[$i] = isset($pricingtable_cell_header_image[$i])? $pricingtable_cell_header_image[$i] :'';
                    $pricingtable_column_width[$i] = isset($pricingtable_column_width[$i])? $pricingtable_column_width[$i] :'';
                    $pricingtable_column_margin[$i] = isset($pricingtable_column_margin[$i])? $pricingtable_column_margin[$i] :'';
                    $pricingtable_cell_price_bg_color[$i] = isset($pricingtable_cell_price_bg_color[$i])? $pricingtable_cell_price_bg_color[$i] :'';
                    $pricingtable_cell_price_font_color[$i] = isset($pricingtable_cell_price_font_color[$i])? $pricingtable_cell_price_font_color[$i] :'';
                    $pricingtable_cell_price[$i] = isset($pricingtable_cell_price[$i])? $pricingtable_cell_price[$i] :'';
                    $pricingtable_cell_signup_bg_color[$i] = isset($pricingtable_cell_signup_bg_color[$i])? $pricingtable_cell_signup_bg_color[$i] :'';
                    $pricingtable_cell_signup_name[$i] = isset($pricingtable_cell_signup_name[$i])? $pricingtable_cell_signup_name[$i] :'';
                    $pricingtable_cell_signup_url[$i] = isset($pricingtable_cell_signup_url[$i])? $pricingtable_cell_signup_url[$i] :'';
                    $pricingtable_cell_price_duration[$i] = isset($pricingtable_cell_price_duration[$i])? $pricingtable_cell_price_duration[$i] :'';
                    $pricingtable_cell_header_text_font_size[$i] = isset($pricingtable_cell_header_text_font_size[$i])? $pricingtable_cell_header_text_font_size[$i] :'';
                    $pricingtable_cell_price_font_size[$i] = isset($pricingtable_cell_price_font_size[$i])? $pricingtable_cell_price_font_size[$i] :'';
                    $column_animation_duration[$i] = isset($column_animation_duration[$i])? $column_animation_duration[$i] :'';




                    if($i==1 && $j==1){

                        ?>
                        <td class='nosort pricingtable_admin_td_<?php echo $i; ?>' column_id='<?php echo $j; ?>-<?php echo $i; ?>'>
                        <div title='' class='more-options'>
                            <div class="toggle"><i class="fa fa-cog" aria-hidden="true"></i></div>
                            <div class="options">
                                <div class="option-field">
                                    <div class="field-title">Featured Column</div>

                                    <?php

                                    if(!empty($pricingtable_column_featured[$i])){
                                        ?>
                                        <input class='pricingtable_column_featured' id='pricingtable_column_featured[<?php echo $i; ?>]' name='pricingtable_column_featured[<?php echo $i; ?>]'  size='20' type='checkbox' value='1' checked='checked'/><label title='Click to remove featured column.' for='pricingtable_column_featured[".$i."]'>Remove Featured</label>
                                        <?php
                                    }
                                    else{
                                        ?>
                                        <input class='pricingtable_column_featured' id='pricingtable_column_featured[<?php echo $i; ?>]' name='pricingtable_column_featured[<?php echo $i; ?>]'  size='20' type='checkbox' value='1'/><label title='Select to make featured column.' for='pricingtable_column_featured[<?php echo $i; ?>]'>Make Featured</label>
                                        <?php
                                    }
                                    ?>
                                </div>

                                <div class="option-field">
                                    <div class="field-title">Column Ribbons</div>


                                    <select name="pricingtable_column_ribbon[<?php echo $i; ?>]" >
                                        <?php

                                        if(empty($pricingtable_column_ribbon[$i]))
                                        {
                                            $pricingtable_column_ribbon[$i] = "";
                                        }


                                        foreach ($ribbons_list as $ribbon_index=>$ribbon){
                                            ?>
                                            <option value="<?php echo $ribbon_index; ?>" <?php selected($pricingtable_column_ribbon[$i], $ribbon_index ) ?> ><?php echo $ribbon; ?></option>
                                            <?php
                                        }


                                        ?>



                                    </select>
                                </div>


                                <?php
                                if(empty($column_ribbon_position[$i]))
                                {
                                    $column_ribbon_position[$i] = "";
                                }
                                ?>

                                <div class="option-field">
                                    <div class="field-title">Ribbon position</div>
                                    <select name="column_ribbon_position[<?php echo $i; ?>]" >
                                        <option <?php selected($column_ribbon_position[$i], 'topright' ) ?> value="topright">Top right</option>
                                        <option <?php selected($column_ribbon_position[$i], 'topleft' ) ?> value="topleft">Top left</option>
                                        <option <?php selected($column_ribbon_position[$i], 'bottomright' ) ?> value="bottomright">Bottom right</option>
                                        <option <?php selected($column_ribbon_position[$i], 'bottomleft' ) ?> value="bottomleft">Bottom left</option>

                                    </select>
                                </div>

                                <div class="option-field">
                                    <div class="field-title">Header Background Color</div>
                                    <input class='pricingtable_cell_header_bg_color pricingtable-color' name='pricingtable_cell_header_bg_color[<?php echo $i; ?>]'  size='20' type='text' value='<?php echo $pricingtable_cell_header_bg_color[$i]; ?>' />
                                </div>
                                <div class="option-field">
                                    <div class="field-title">Header text color</div>
                                    <input class='pricingtable_cell_header_font_color pricingtable-color' name='pricingtable_cell_header_font_color[<?php echo $i; ?>]'  size='20' type='text' value='<?php echo $pricingtable_cell_header_font_color[$i]; ?>' />
                                </div>


                                <div class="option-field">
                                    <div class="field-title">Header Image or Video(url)</div>
                                    <input class='pricingtable_cell_header_image' name='pricingtable_cell_header_image[<?php echo $i; ?>]'  size='20' type='text' value='<?php echo $pricingtable_cell_header_image[$i]; ?>' />
                                </div>

                                <div class="option-field">
                                    <div class="field-title">Header Description Text</div>
                                    <input class='pricingtable_cell_header_description' name='pricingtable_cell_header_description[<?php echo $i; ?>]'  size='20' type='text' value='<?php echo $pricingtable_cell_header_description[$i]; ?>' />
                                </div>

                                <div class="option-field">
                                    <div class="field-title">Column Width</div>
                                    <input  placeholder='250px' class='pricingtable_column_width' name='pricingtable_column_width[<?php echo $i; ?>]'  size='20' type='text' value='<?php echo $pricingtable_column_width[$i]; ?>' />
                                </div>

                                <div class="option-field">
                                    <div class="field-title">Column margin</div>
                                    <input  placeholder='20px' class='pricingtable_column_margin' name='pricingtable_column_margin[<?php echo $i; ?>]'  size='20' type='text' value='<?php echo $pricingtable_column_margin[$i]; ?>' />
                                </div>



                                <div class="option-field">
                                    <div class="field-title">Header Font Size</div>
                                    <input placeholder='35px'  class='pricingtable_cell_header_text_font_size' name='pricingtable_cell_header_text_font_size[<?php echo $i; ?>]'  size='20' type='text' value='<?php echo $pricingtable_cell_header_text_font_size[$i]; ?>' />
                                </div>


                                <div class="option-field">
                                    <div class="field-title">Column Animation <br><span class="pro-feature">Pro only</span></div>


                                    <select name="column_animation[<?php echo $i; ?>]" >
                                        <?php

                                        if(empty($column_animation[$i]))
                                        {
                                            $column_animation[$i] = "";
                                        }


                                        foreach ($column_animation_list as $index=>$animation){
                                            ?>
                                            <option value="" <?php selected($column_animation[$i], $index ) ?> ><?php echo $animation; ?></option>
                                            <?php
                                        }


                                        ?>



                                    </select>

                                    <div class="field-title">Animation duration</div>
                                    <input  placeholder='1000' class='column_animation_duration' name='column_animation_duration[<?php echo $i; ?>]'  size='20' type='text' value='' />

                                </div>



                            </div>
                        </div>

                        <?php

                    }
                    elseif($j==1){

                        ?>
                        <td class='pricingtable_admin_td_<?php echo $i; ?>' column_id='<?php echo $j; ?>-<?php echo $i; ?>' >
                        <div title='' class='more-options'>
                            <div class="toggle"><i class="fa fa-cog" aria-hidden="true"></i></div>
                            <div class="options">
                                <div class="option-field">
                                    <div class="field-title">Featured Column</div>
                                    <?php
                                    if(!empty($pricingtable_column_featured[$i])){
                                        ?>
                                        <input class='pricingtable_column_featured' id='pricingtable_column_featured[<?php echo $i; ?>]' name='pricingtable_column_featured[<?php echo $i; ?>]'  size='20' type='checkbox' value='1' checked='checked'/><label title='Click to remove featured column.' for='pricingtable_column_featured[<?php echo $i; ?>]'>Remove Featured</label>
                                        <?php
                                    }
                                    else{
                                        ?>
                                        <input class='pricingtable_column_featured' id='pricingtable_column_featured[<?php echo $i; ?>]' name='pricingtable_column_featured[<?php echo $i; ?>]'  size='20' type='checkbox' value='1'/><label title='Select to make featured column.' for='pricingtable_column_featured[<?php echo $i; ?>]'>Make Featured</label>
                                        <?php

                                    }
                                    ?>
                                </div>

                                <div class="option-field">
                                    <div class="field-title">Column Ribbons</div>

                                    <select name="pricingtable_column_ribbon[<?php echo $i; ?>]" >


                                        <?php

                                        if(empty($pricingtable_column_ribbon[$i]))
                                        {
                                            $pricingtable_column_ribbon[$i] = "";
                                        }


                                        foreach ($ribbons_list as $ribbon_index=>$ribbon){
                                            ?>
                                            <option value="<?php echo $ribbon_index; ?>" <?php selected($pricingtable_column_ribbon[$i], $ribbon_index ) ?> ><?php echo $ribbon; ?></option>
                                            <?php
                                        }


                                        ?>



                                    </select>
                                </div>
                                <?php
                                if(empty($column_ribbon_position[$i]))
                                {
                                    $column_ribbon_position[$i] = "";
                                }
                                ?>

                                <div class="option-field">
                                    <div class="field-title">Ribbon position</div>
                                    <select name="column_ribbon_position[<?php echo $i; ?>]" >
                                        <option <?php selected($column_ribbon_position[$i], 'topright' ) ?> value="topright">Top right</option>
                                        <option <?php selected($column_ribbon_position[$i], 'topleft' ) ?> value="topleft">Top left</option>
                                        <option <?php selected($column_ribbon_position[$i], 'bottomright' ) ?> value="bottomright">Bottom right</option>
                                        <option <?php selected($column_ribbon_position[$i], 'bottomleft' ) ?> value="bottomleft">Bottom left</option>

                                    </select>
                                </div>
                                <div class="option-field">
                                    <div class="field-title">Header Background Color</div>
                                    <input class='pricingtable_cell_header_bg_color pricingtable-color' name='pricingtable_cell_header_bg_color[<?php echo $i; ?>]'  size='20' type='text' value='<?php echo $pricingtable_cell_header_bg_color[$i]; ?>' />
                                </div>

                                <div class="option-field">
                                    <div class="field-title">Header text Color</div>
                                    <input class='pricingtable_cell_header_font_color pricingtable-color' name='pricingtable_cell_header_font_color[<?php echo $i; ?>]'  size='20' type='text' value='<?php echo $pricingtable_cell_header_font_color[$i]; ?>' />
                                </div>


                                <div class="option-field">
                                    <div class="field-title">Header Image or Video(url)</div>
                                    <input class='pricingtable_cell_header_image' name='pricingtable_cell_header_image[<?php echo $i; ?>]'  size='20' type='text' value='<?php echo $pricingtable_cell_header_image[$i]; ?>' />
                                </div>
                                <div class="option-field">
                                    <div class="field-title">Header Description Text</div>
                                    <input class='pricingtable_cell_header_description' name='pricingtable_cell_header_description[<?php echo $i; ?>]'  size='20' type='text' value='<?php echo $pricingtable_cell_header_description[$i]; ?>' />
                                </div>
                                <div class="option-field">
                                    <div class="field-title">Column Width</div>
                                    <input  placeholder='250px' class='pricingtable_column_width' name='pricingtable_column_width[<?php echo $i; ?>]'  size='20' type='text' value='<?php echo $pricingtable_column_width[$i]; ?>' />
                                </div>

                                <div class="option-field">
                                    <div class="field-title">Column Margin</div>
                                    <input  placeholder='20px' class='pricingtable_column_margin' name='pricingtable_column_margin[<?php echo $i; ?>]'  size='20' type='text' value='<?php echo $pricingtable_column_margin[$i]; ?>' />
                                </div>





                                <div class="option-field">
                                    <div class="field-title">Header Font Size</div>
                                    <input placeholder='35px' class='pricingtable_cell_header_text_font_size' name='pricingtable_cell_header_text_font_size[<?php echo $i; ?>]'  size='20' type='text' value='<?php echo $pricingtable_cell_header_text_font_size[$i]; ?>' />
                                </div>

                                <div class="option-field">
                                    <div class="field-title">Column Animation <br><span class="pro-feature">Pro only</span></div>


                                    <select name="column_animation[<?php echo $i; ?>]" >
                                        <?php

                                        if(empty($column_animation[$i]))
                                        {
                                            $column_animation[$i] = "";
                                        }


                                        foreach ($column_animation_list as $index=>$animation){
                                            ?>
                                            <option value="" <?php selected($column_animation[$i], $index ) ?> ><?php echo $animation; ?></option>
                                            <?php
                                        }


                                        ?>



                                    </select>
                                    <div class="field-title">Animation duration</div>
                                    <input  placeholder='1000' class='column_animation_duration' name='column_animation_duration[<?php echo $i; ?>]'  size='20' type='text' value='' />
                                </div>



                            </div>
                        </div>
                        <?php


                    }
                    else{

                        ?>
                        <td class='pricingtable_admin_td_<?php echo $i; ?>' >



                        <?php


                    }


                    if($i==1 && $j!=1)
                    {

                        ?>
                        <span data_row='<?php echo $j; ?>' class='pricingtable_admin_tr_remove' title='Remove this Row' ></span>
                        <span class="pricingtable_admin_tr_gripper" title="Drag to reorder"></span>
                        <?php

                    }

                    if($j==1 && $i!=1 )
                    {

                        ?>
                        <span data-column='<?php echo $i; ?>' class='pricingtable_admin_td_remove' title='Remove this Column' ></span>
                        <span class="pricingtable_admin_td_gripper" title="Drag to reorder"></span>
                        <?php

                    }

                    if(empty($pricingtable_cell[$j.$i]))
                    {
                        $pricingtable_cell[$j.$i] = "";
                    }


                    if($j==1)
                    {
                        ?>

                        <div class="option-field">
                            <div class="field-title">Table Header Text</div>
                            <input name='pricingtable_cell_header_text[<?php echo $i; ?>]' size='20' type='text' value='<?php echo $pricingtable_cell_header_text[$i]; ?>' />
                        </div>



                        <?php




                    }


                    elseif($j==2)
                    {

                        ?>
                        <div title='' class='more-options'>

                            <div class="toggle"><i class="fa fa-cog" aria-hidden="true"></i></div>
                            <div class="options">

                                <div class="option-field">
                                    <div class="field-title">Price Background Color</div>
                                    <input class='pricingtable_cell_price_bg_color pricingtable-color' name='pricingtable_cell_price_bg_color[<?php echo $i; ?>]'  size='20' type='text' value='<?php echo $pricingtable_cell_price_bg_color[$i]; ?>' />
                                </div>

                                <div class="option-field">
                                    <div class="field-title">Price Text Color</div>
                                    <input class='pricingtable_cell_price_font_color pricingtable-color' name='pricingtable_cell_price_font_color[<?php echo $i; ?>]'  size='20' type='text' value='<?php echo $pricingtable_cell_price_font_color[$i]; ?>' />
                                </div>



                                <div class="option-field">
                                    <div class="field-title">Price Duration Text</div>
                                    <input placeholder='Pre Month' class='pricingtable_cell_price_duration' name='pricingtable_cell_price_duration[<?php echo $i; ?>]'  size='20' type='text' value='<?php echo $pricingtable_cell_price_duration[$i]; ?>' />
                                </div>




                                <div class="option-field">
                                    <div class="field-title">Price Font Size</div>
                                    <input placeholder='35px' class='pricingtable_cell_price_font_size' name='pricingtable_cell_price_font_size[<?php echo $i; ?>]'  size='20' type='text' value='<?php echo $pricingtable_cell_price_font_size[$i]; ?>' />
                                </div>

                            </div>
                        </div>



                        <div class="option-field">
                            <div class="field-title">Column Price</div>
                            <input placeholder='$20' name='pricingtable_cell_price[<?php echo $i; ?>]' data_cell='"<?php echo $j.$i; ?>' size='20' type='text' value='<?php echo $pricingtable_cell_price[$i]; ?>' />
                        </div>





                        <?php


                    }

                    elseif($j==$pricingtable_total_row)
                    {

                        ?>
                        <div title='' class='more-options'>

                            <div class="toggle"><i class="fa fa-cog" aria-hidden="true"></i></div>
                            <div class="options">

                                <div class="option-field">
                                    <div class="field-title">Signup Background Color</div>
                                    <input class='pricingtable_cell_signup_bg_color pricingtable-color' name='pricingtable_cell_signup_bg_color[<?php echo $i; ?>]'  size='20' type='text' value='<?php echo $pricingtable_cell_signup_bg_color[$i]; ?>' />
                                </div>

                                <?php

                                if(empty($pricingtable_cell_signup_button_bg_color[$i]))
                                {
                                    $pricingtable_cell_signup_button_bg_color[$i] = "";
                                }


                                ?>
                                <div class="option-field">
                                    <div class="field-title">Signup Button Background Color</div>
                                    <input class='pricingtable_cell_signup_button_bg_color pricingtable-color' name='pricingtable_cell_signup_button_bg_color[<?php echo $i; ?>]'  size='20' type='text' value='<?php echo $pricingtable_cell_signup_button_bg_color[$i]; ?>' />
                                </div>



                                <?php

                                if(empty($signup_button_font_color[$i]))
                                {
                                    $signup_button_font_color[$i] = "";
                                }


                                ?>


                                <div class="option-field">
                                    <div class="field-title">Signup Button font Color</div>
                                    <input class='signup_button_font_color pricingtable-color' name='signup_button_font_color[<?php echo $i; ?>]'  size='20' type='text' value='<?php echo $signup_button_font_color[$i]; ?>' />
                                </div>



                                <?php

                                if(empty($signup_button_style[$i]))
                                {
                                    $signup_button_style[$i] = "";
                                }



                                ?>

                                <div class="option-field">
                                    <div class="field-title">Signup Button Style</div>

                                    <select name="signup_button_style[<?php echo $i; ?>]">
                                        <?php
                                        foreach ($signup_button_style_list as $style_index=>$style){
                                            ?>
                                            <option <?php if(isset($signup_button_style[$i]) && $signup_button_style[$i]==$style_index) echo 'selected'; ?>  value="<?php echo $style_index; ?>"><?php echo $style; ?></option>
                                            <?php
                                        }
                                        ?>

                                    </select>


                                </div>





                            </div>
                        </div>

                        <div class="option-field">
                            <div class="field-title">Signup Text</div>
                            <input placeholder='SignUp' name='pricingtable_cell_signup_name[<?php echo $i; ?>]' data_cell='<?php echo $j.$i; ?>' size='20' type='text' value='<?php echo $pricingtable_cell_signup_name[$i]; ?>' />
                        </div>

                        <div class="option-field">
                            <div class="field-title">SignUp URL</div>
                            <input placeholder='http://example.com' name='pricingtable_cell_signup_url[<?php echo $i; ?>]' data_cell='<?php echo $j.$i; ?>' size='20' type='text' value='<?php echo $pricingtable_cell_signup_url[$i]; ?>' />
                        </div>


                        <?php




                    }
                    else
                    {

                        ?>

                        <div class="option-field">
                            <div class="field-title">Table Data</div>
                            <input name='pricingtable_cell[<?php echo $j.$i; ?>]' data_cell='<?php echo $j.$i; ?>' size='20' type='text' value='<?php echo $pricingtable_cell[$j.$i]; ?>' />
                        </div>

                        <?php



                    }


                    ?>
                    </td>
                    <?php
                }
                ?>
                </tr>
                <?php


            }

            ?>
        </table>


    </div>
    <?php

}


add_action('pricingtable_metabox_content_style', 'pricingtable_metabox_content_style',10, 2);

function pricingtable_metabox_content_style($post_id){

    $pickp_settings_tabs_field = new pickp_settings_tabs_field();

    $column_item_position = get_post_meta( $post_id, 'column_item_position', true );
    $pricingtable_hide_empty_row = get_post_meta( $post_id, 'pricingtable_hide_empty_row', true );
    $pricingtable_bg_img = get_post_meta( $post_id, 'pricingtable_bg_img', true );
    $pricingtable_row_bg_odd = get_post_meta( $post_id, 'pricingtable_row_bg_odd', true );
    $pricingtable_row_bg_even = get_post_meta( $post_id, 'pricingtable_row_bg_even', true );
    $mobile_enable_slider = get_post_meta( $post_id, 'mobile_enable_slider', true );

    $class_pricingtable_functions = new class_pricingtable_functions();

    $pricingtable_themes = get_post_meta( $post_id, 'pricingtable_themes', true );

    if(empty($pricingtable_themes)) $pricingtable_themes = 'flat';


    $signup_button_style_list = $class_pricingtable_functions->signup_button_style();
    $pricingtable_themes_list = $class_pricingtable_functions->pricingtable_themes();
    $column_item_position_list = $class_pricingtable_functions->column_item_position();
    $ribbons_list = $class_pricingtable_functions->ribbons();
    $column_animation_list = $class_pricingtable_functions->column_animation();

    ?>
    <div class="section">
        <div class="section-title">Style</div>
        <p class="description section-description">Customize the color and feel</p>

        <?php

        ob_start();

        ?>

        <div class="col-item-position sortable expandable">

            <?php

            //var_dump($column_item_position);


            if(!empty($column_item_position)){
                $column_item_position_list = $column_item_position;
            }

            foreach ($column_item_position_list as $item_index=>$item){

                $name = $item['name'];
                $is_hide = $item['is_hide'];

                ?>
                <div class="item">
                    <div class="header">
                        <span class="move sort ui-sortable-handle"><i class="fa fa-bars"></i></span>
                        <span class="move ui-sortable-handle expand"><i class="fas fa-expand-arrows-alt"></i></span>
                        <span class=""> <?php echo $name; ?></span>
                    </div>

                    <div class="options">

                        <input type="text" name="column_item_position[<?php echo $item_index; ?>][name]" value="<?php echo $name; ?>">
                        <p>Hide this item?</p>
                        <select name="column_item_position[<?php echo $item_index; ?>][is_hide]">
                            <option <?php if($is_hide=='yes') echo 'selected'; ?>  value="yes">Yes</option>
                            <option <?php if($is_hide=='no') echo 'selected'; ?> value="no">No</option>

                        </select>


                    </div>





                </div>
                <?php

            }

            ?>

        </div>

        <?php

        $html = ob_get_clean();
        $args = array(
            'id'		=> 'pricingtable_elements',
            'title'		=> __('Sort elements','pricingtable'),
            'details'	=> '',
            'type'		=> 'custom_html',
            'html'		=> $html,
        );

        $pickp_settings_tabs_field->generate_field($args, $post_id);



        ob_start();

        ?>
        <div class="themes-list">
            <?php
            foreach ($pricingtable_themes_list as $theme_index=>$theme_data){

                $is_pro = $theme_data['is_pro'];
                $name = $theme_data['name'];
                ?>
                <label>

                    <?php
                    if($theme_index=='flat' || $theme_index=='rounded' || $theme_index=='semi-rounded'){
                        ?>
                        <input type="radio" name="pricingtable_themes" <?php if($pricingtable_themes==$theme_index)echo "checked"; ?>  value="<?php echo $theme_index; ?>">
                        <?php

                    }
                    else{
                        ?>
                        <input disabled type="radio" name="pricingtable_themes"   value="">
                        <?php
                    }
                    ?>




                    <img style="width: 100px;height: auto" src="<?php echo pricingtable_plugin_url.'templates/themes/'.$theme_index.'/images/screenshot.png'; ?>">
                    <div class="screenshot">
                        <div>
                            <?php

                            echo $name;
                            if($is_pro=='yes'):
                                ?>
                                <span class="pro-feature">Pro only</span>
                            <?php
                            endif;
                            ?>

                        </div>
                        <img style="width: 100%;height: auto" src="<?php echo pricingtable_plugin_url.'templates/themes/'.$theme_index.'/images/screenshot.png'; ?>"></div>
                </label>
                <?php
            }
            ?>

        </div>
        <?php

        $html = ob_get_clean();
        $args = array(
            'id'		=> 'pricingtable_themes',
            'title'		=> __('Table themes','pricingtable'),
            'details'	=> '',
            'type'		=> 'custom_html',
            'html'		=> $html,
        );
        $pickp_settings_tabs_field->generate_field($args, $post_id);



        $args = array(
            'id'		=> 'pricingtable_hide_empty_row',
            'title'		=> __('Hide Empty Row','pricingtable'),
            'details'	=> __('You can hide table cell which has no value.','pricingtable'),
            'type'		=> 'select',
            'value'		=> $pricingtable_hide_empty_row,
            'default'		=> 'no',
            'args'		=> array(
                'no'=>__('No','pricingtable'),
                'yes'=>__('Yes','pricingtable'),
            ),
        );

        $pickp_settings_tabs_field->generate_field($args, $post_id);





        ob_start();

        ?>

        <?php



        $dir_path = pricingtable_plugin_dir."assets/front/css/background/";
        $filenames=glob($dir_path."*.png*");



        if(empty($pricingtable_bg_img))
        {
            $pricingtable_bg_img = "";
        }


        $count=count($filenames);


        $i=0;
        echo "<ul class='pricingtable_bg_img_list' >";

        while($i<$count)
        {
            $filelink= str_replace($dir_path,"",$filenames[$i]);

            $filelink= pricingtable_plugin_url."assets/front/css/background/".$filelink;


            if($pricingtable_bg_img==$filelink)
            {
                echo "<li class='bg-selected' data-url='".$filelink."'>";
            }
            else
            {
                echo "<li data-url='".$filelink."'>";
            }


            echo "<img  width='70px' height='50px' src='".$filelink."' />";
            echo "</li>";
            $i++;
        }

        echo "</ul>";

        echo "<input style='width:70%;' value='".$pricingtable_bg_img."'    placeholder='Please select image or left blank' id='pricingtable_bg_img' name='pricingtable_bg_img'  type='text' />";



        ?>
        <script>
            jQuery(document).ready(function(jQuery)
            {
                jQuery(".pricingtable_bg_img_list li").click(function()
                {
                    jQuery('.pricingtable_bg_img_list li.bg-selected').removeClass('bg-selected');
                    jQuery(this).addClass('bg-selected');

                    var pricingtable_bg_img = jQuery(this).attr('data-url');

                    jQuery('#pricingtable_bg_img').val(pricingtable_bg_img);

                })


            })

        </script>

        <?php

        $html = ob_get_clean();
        $args = array(
            'id'		=> 'pricingtable_bg_img',
            'title'		=> __('Background image','pricingtable'),
            'details'	=> '',
            'type'		=> 'custom_html',
            'html'		=> $html,
        );
        $pickp_settings_tabs_field->generate_field($args, $post_id);


        $args = array(
            'id'		=> 'pricingtable_row_bg_odd',
            'title'		=> __('Data cell row background color(Odd)','pricingtable'),
            'details'	=> '',
            'type'		=> 'colorpicker',
            'value'		=> $pricingtable_row_bg_odd,
        );
        $pickp_settings_tabs_field->generate_field($args, $post_id);


        $args = array(
            'id'		=> 'pricingtable_row_bg_even',
            'title'		=> __('Data cell row background color(Even)','pricingtable'),
            'details'	=> '',
            'type'		=> 'colorpicker',
            'value'		=> $pricingtable_row_bg_even,
        );
        $pickp_settings_tabs_field->generate_field($args, $post_id);


        $args = array(
            'id'		=> 'mobile_enable_slider',
            'title'		=> __('Enable slider on mobile','pricingtable'),
            'details'	=> __('','pricingtable'),
            'type'		=> 'select',
            'value'		=> $mobile_enable_slider,
            'default'		=> 'no',
            'args'		=> array(
                'no'=>__('No','pricingtable'),
                'yes'=>__('Yes','pricingtable'),
            ),
        );

        $pickp_settings_tabs_field->generate_field($args, $post_id);

        ?>


    </div>


    <?php

}


add_action('post_meta_save_pricingtable','post_meta_save_pricingtable');

function post_meta_save_pricingtable($post_id){

    $pricingtable_hide_empty_row = sanitize_text_field( $_POST['pricingtable_hide_empty_row'] );
    //$pricingtable_hover_effect = sanitize_text_field( $_POST['pricingtable_hover_effect'] );
    $pricingtable_bg_img = sanitize_text_field( $_POST['pricingtable_bg_img'] );
    $pricingtable_themes =  isset($_POST['pricingtable_themes']) ? sanitize_text_field( $_POST['pricingtable_themes'] ) : 'flat';
    $column_item_position = pricingtable_recursive_sanitize_arr( $_POST['column_item_position'] );

    $pricingtable_total_row = sanitize_text_field( $_POST['pricingtable_total_row'] );
    $pricingtable_total_column = sanitize_text_field( $_POST['pricingtable_total_column'] );
    $pricingtable_cell = pricingtable_recursive_sanitize_arr( $_POST['pricingtable_cell'] );

    $pricingtable_column_width = pricingtable_recursive_sanitize_arr( $_POST['pricingtable_column_width'] );
    $pricingtable_column_margin = pricingtable_recursive_sanitize_arr( $_POST['pricingtable_column_margin'] );


    $pricingtable_column_featured = isset($_POST['pricingtable_column_featured']) ? pricingtable_recursive_sanitize_arr( $_POST['pricingtable_column_featured'] ) : '';
    $pricingtable_column_ribbon = pricingtable_recursive_sanitize_arr( $_POST['pricingtable_column_ribbon'] );
    $column_ribbon_position = pricingtable_recursive_sanitize_arr( $_POST['column_ribbon_position'] );

    $pricingtable_cell_price_duration = pricingtable_recursive_sanitize_arr( $_POST['pricingtable_cell_price_duration'] );
    $pricingtable_cell_price = pricingtable_recursive_sanitize_arr( $_POST['pricingtable_cell_price'] );
    $pricingtable_cell_price_bg_color = pricingtable_recursive_sanitize_arr( $_POST['pricingtable_cell_price_bg_color'] );
    $pricingtable_cell_price_font_color = pricingtable_recursive_sanitize_arr( $_POST['pricingtable_cell_price_font_color'] );
    $pricingtable_cell_price_font_size = pricingtable_recursive_sanitize_arr( $_POST['pricingtable_cell_price_font_size'] );

    $pricingtable_cell_signup_bg_color = pricingtable_recursive_sanitize_arr( $_POST['pricingtable_cell_signup_bg_color'] );
    $pricingtable_cell_signup_button_bg_color = pricingtable_recursive_sanitize_arr( $_POST['pricingtable_cell_signup_button_bg_color'] );
    $signup_button_font_color = pricingtable_recursive_sanitize_arr( $_POST['signup_button_font_color'] );

    $signup_button_style = pricingtable_recursive_sanitize_arr( $_POST['signup_button_style'] );


    $pricingtable_cell_signup_name = pricingtable_recursive_sanitize_arr( $_POST['pricingtable_cell_signup_name'] );
    $pricingtable_cell_signup_url = pricingtable_recursive_sanitize_arr( $_POST['pricingtable_cell_signup_url'] );


    $pricingtable_cell_header_description = pricingtable_recursive_sanitize_arr( $_POST['pricingtable_cell_header_description'] );
    $pricingtable_cell_header_image = pricingtable_recursive_sanitize_arr( $_POST['pricingtable_cell_header_image'] );
    $pricingtable_cell_header_bg_color = pricingtable_recursive_sanitize_arr( $_POST['pricingtable_cell_header_bg_color'] );
    $pricingtable_cell_header_font_color = pricingtable_recursive_sanitize_arr( $_POST['pricingtable_cell_header_font_color'] );
    $pricingtable_cell_header_text = pricingtable_recursive_sanitize_arr( $_POST['pricingtable_cell_header_text'] );
    $pricingtable_cell_header_text_font_size = pricingtable_recursive_sanitize_arr( $_POST['pricingtable_cell_header_text_font_size'] );
    $column_animation = pricingtable_recursive_sanitize_arr( $_POST['column_animation'] );
    $column_animation_duration = pricingtable_recursive_sanitize_arr( $_POST['column_animation_duration'] );

    $pricingtable_row_bg_odd = pricingtable_recursive_sanitize_arr( $_POST['pricingtable_row_bg_odd'] );
    $pricingtable_row_bg_even = pricingtable_recursive_sanitize_arr( $_POST['pricingtable_row_bg_even'] );
    $mobile_enable_slider = sanitize_text_field( $_POST['mobile_enable_slider'] );


    // Update the meta field in the database.
    update_post_meta( $post_id, 'pricingtable_hide_empty_row', $pricingtable_hide_empty_row );
    //update_post_meta( $post_id, 'pricingtable_hover_effect', $pricingtable_hover_effect );
    update_post_meta( $post_id, 'pricingtable_bg_img', $pricingtable_bg_img );
    update_post_meta( $post_id, 'pricingtable_themes', $pricingtable_themes );
    update_post_meta( $post_id, 'column_item_position', $column_item_position );
    update_post_meta( $post_id, 'pricingtable_total_row', $pricingtable_total_row );
    update_post_meta( $post_id, 'pricingtable_total_column', $pricingtable_total_column );
    update_post_meta( $post_id, 'pricingtable_cell',$pricingtable_cell );

    update_post_meta( $post_id, 'pricingtable_column_width',$pricingtable_column_width );
    update_post_meta( $post_id, 'pricingtable_column_margin',$pricingtable_column_margin );


    update_post_meta( $post_id, 'pricingtable_column_featured',$pricingtable_column_featured );
    update_post_meta( $post_id, 'pricingtable_column_ribbon',$pricingtable_column_ribbon );
    update_post_meta( $post_id, 'column_ribbon_position',$column_ribbon_position );

    update_post_meta( $post_id, 'pricingtable_cell_price_duration',$pricingtable_cell_price_duration );
    update_post_meta( $post_id, 'pricingtable_cell_price',$pricingtable_cell_price );
    update_post_meta( $post_id, 'pricingtable_cell_price_bg_color',$pricingtable_cell_price_bg_color );
    update_post_meta( $post_id, 'pricingtable_cell_price_font_color',$pricingtable_cell_price_font_color );

    update_post_meta( $post_id, 'pricingtable_cell_price_font_size',$pricingtable_cell_price_font_size );


    update_post_meta( $post_id, 'pricingtable_cell_signup_bg_color',$pricingtable_cell_signup_bg_color );
    update_post_meta( $post_id, 'pricingtable_cell_signup_button_bg_color',$pricingtable_cell_signup_button_bg_color );
    update_post_meta( $post_id, 'signup_button_font_color',$signup_button_font_color );

    update_post_meta( $post_id, 'signup_button_style',$signup_button_style );

    update_post_meta( $post_id, 'pricingtable_cell_signup_name',$pricingtable_cell_signup_name );
    update_post_meta( $post_id, 'pricingtable_cell_signup_url',$pricingtable_cell_signup_url );


    update_post_meta( $post_id, 'pricingtable_cell_header_description',$pricingtable_cell_header_description );
    update_post_meta( $post_id, 'pricingtable_cell_header_image',$pricingtable_cell_header_image );
    update_post_meta( $post_id, 'pricingtable_cell_header_bg_color',$pricingtable_cell_header_bg_color );
    update_post_meta( $post_id, 'pricingtable_cell_header_font_color',$pricingtable_cell_header_font_color );
    update_post_meta( $post_id, 'pricingtable_cell_header_text',$pricingtable_cell_header_text );
    update_post_meta( $post_id, 'pricingtable_cell_header_text_font_size',$pricingtable_cell_header_text_font_size );
    update_post_meta( $post_id, 'column_animation',$column_animation );
    update_post_meta( $post_id, 'column_animation_duration',$column_animation_duration );

    update_post_meta( $post_id, 'pricingtable_row_bg_odd',$pricingtable_row_bg_odd );
    update_post_meta( $post_id, 'pricingtable_row_bg_even',$pricingtable_row_bg_even );
    update_post_meta( $post_id, 'mobile_enable_slider',$mobile_enable_slider );


}

