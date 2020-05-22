<?php

/*
* @Author 		pickplugins
* Copyright: 	2015 pickplugins
*/

if ( ! defined('ABSPATH')) exit;  // if direct access	


if($mobile_enable_slider=='yes'):
?>

<script>

jQuery(document).ready(function($){

    <?php


    wp_enqueue_style( 'owl.carousel' );
    wp_enqueue_script( 'owl.carousel' );


        ?>
        if(window.innerWidth < 576) {

            $('.pricingtable-<?php echo $post_id; ?>').addClass('owl-carousel');



            $(".pricingtable-<?php echo $post_id; ?>").owlCarousel({

                items : 1,
                navText : ["",""],
                autoplay: false,
                loop: false,
                autoHeight : true,
                nav : true,
                dots : true,
            })

        }
        <?php


    ?>



})

    </script>


<style type="text/css">
    @media (max-width: 576px){
        .pricingtable .column{
            width: 90% !important;
        }

    }

</style>


<?php
endif;
?>
