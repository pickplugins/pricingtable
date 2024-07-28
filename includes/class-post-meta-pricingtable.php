<?php
if ( ! defined('ABSPATH')) exit;  // if direct access

class class_post_meta_pricingtable{
	
	public function __construct(){

		add_action('add_meta_boxes', array($this, '_post_meta_pricingtable'));
		add_action('save_post', array($this, 'meta_boxes_pricingtable_save'));



		}

	

	
	
	
	public function _post_meta_pricingtable($post_type){

            add_meta_box('metabox-pricingtable',__('Pricing Table data', 'pricingtable'), array($this, 'meta_box_pricingtable_data'), 'pricingtable', 'normal', 'high');

		}






	public function meta_box_pricingtable_data($post) {
 
        // Add an nonce field so we can check for it later.
        wp_nonce_field('pricingtable_nonce_check', 'pricingtable_nonce_check_value');
        $post_id = $post->ID;


        $pickp_settings_tabs_field = new pickp_settings_tabs_field();

        $_settings_tabs = array();

        $_settings_tabs[] = array(
            'id' => 'shortcode',
            'title' => sprintf(__('%s Shortcode','pricingtable'),'<i class="fas fa-laptop-code"></i>'),
            'priority' => 1,
            'active' => false,
        );

        $_settings_tabs[] = array(
            'id' => 'table_data',
            'title' => sprintf(__('%s Table Data','pricingtable'),'<i class="fas fa-border-all"></i>'),
            'priority' => 2,
            'active' => true,
        );


        $_settings_tabs[] = array(
            'id' => 'style',
            'title' => sprintf(__('%s Style','pricingtable'),'<i class="fa fa-magic"></i>'),
            'priority' => 3,
            'active' => false,
        );




        $_settings_tabs = apply_filters('pricingtable_metabox_navs', $_settings_tabs);

        $tabs_sorted = array();
        foreach ($_settings_tabs as $page_key => $tab) $tabs_sorted[$page_key] = isset( $tab['priority'] ) ? $tab['priority'] : 0;
        array_multisort($tabs_sorted, SORT_ASC, $_settings_tabs);



        ?>


        <div class="settings-tabs vertical">
            <ul class="tab-navs">
                <?php
                foreach ($_settings_tabs as $tab){
                    $id = $tab['id'];
                    $title = $tab['title'];
                    $active = $tab['active'];
                    $data_visible = isset($tab['data_visible']) ? $tab['data_visible'] : '';
                    $hidden = isset($tab['hidden']) ? $tab['hidden'] : false;
                    ?>
                    <li <?php if(!empty($data_visible)):  ?> data_visible="<?php echo $data_visible; ?>" <?php endif; ?> class="tab-nav <?php if($hidden) echo 'hidden';?> <?php if($active) echo 'active';?>" data-id="<?php echo $id; ?>"><?php echo $title; ?></li>
                    <?php
                }
                ?>
            </ul>
            <?php
            foreach ($_settings_tabs as $tab){
                $id = $tab['id'];
                $title = $tab['title'];
                $active = $tab['active'];
                ?>

                <div class="tab-content <?php if($active) echo 'active';?>" id="<?php echo $id; ?>">
                    <?php
                    do_action('pricingtable_metabox_content_'.$id, $post_id);
                    ?>
                </div>
                <?php
            }
            ?>
        </div>
        <div class="clear clearfix"></div>

        <div class="pricingtable-preview">

            <h3>Pricing Table - Preview</h3>

            <?php echo do_shortcode("[pricingtable_pickplugins id='".$post_id."']"); ?>
        </div>

        <?php






        //do_action('pricingtable_metabox__data', $post);


   		}




	public function meta_boxes_pricingtable_save($post_id){

        /*
         * We need to verify this came from the our screen and with
         * proper authorization,
         * because save_post can be triggered at other times.
         */

        // Check if our nonce is set.
        if (!isset($_POST['pricingtable_nonce_check_value']))
            return $post_id;

        $nonce = sanitize_text_field($_POST['pricingtable_nonce_check_value']);

        // Verify that the nonce is valid.
        if (!wp_verify_nonce($nonce, 'pricingtable_nonce_check'))
            return $post_id;

        // If this is an autosave, our form has not been submitted,
        //     so we don't want to do anything.
        if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
            return $post_id;

        // Check the user's permissions.
        if ('page' == $_POST['post_type']) {

            if (!current_user_can('edit_page', $post_id))
                return $post_id;

        } else {

            if (!current_user_can('edit_post', $post_id))
                return $post_id;
        }

        /* OK, its safe for us to save the data now. */

        // Sanitize the user input.


        // Update the meta field.

        do_action('post_meta_save_pricingtable', $post_id);


					
		}
	
	}


new class_post_meta_pricingtable();