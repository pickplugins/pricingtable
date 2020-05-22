<?php

/*
* @Author 		pickplugins
* Copyright: 	2015 pickplugins
*/

if ( ! defined('ABSPATH')) exit;  // if direct access	

if(!empty($pricingtable_cell_header_image[$j])){
?><div  class="column-item column-item-media">


    <?php


    $video_ddomain = pricingtable_get_domain($pricingtable_cell_header_image[$j]);

    if($video_ddomain=="youtube.com"){

        $vid = pricingtable_get_youtube_id($pricingtable_cell_header_image[$j]);
        ?>
        <iframe src="//www.youtube.com/embed/<?php echo $vid; ?>?autoplay=0&showinfo=0&controls=0" frameborder="0" allowfullscreen></iframe>
        <?php


    }
    elseif($video_ddomain=="vimeo.com"){

        $vid = pricingtable_get_vimeo_id($pricingtable_cell_header_image[$j]);
        ?>
        <iframe src="//player.vimeo.com/video/<?php echo $vid; ?>?title=0&amp;byline=0" width="" height="" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
        <?php


    }

    else{

        ?>
        <img src="<?php echo $pricingtable_cell_header_image[$j]; ?>" class="pricingtable-header-image" />
        <?php



    }

    ?></div>
<?php

}


