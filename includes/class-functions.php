<?php

if ( ! defined('ABSPATH')) exit;  // if direct access 

class class_pricingtable_functions{
	
	public function __construct(){
		
		
	}





	public function ribbons($themes = array()){

		$themes = array(
			''=>'None',
			'free'=>'Free',
			'save'=>'Save',
			'hot'=>'Hot',
			'pro'=>'Pro',
			'best'=>'Best',
			'gift'=>'Gift',
			'sale'=>'Sale',
			'new'=>'New',
			'top'=>'Top',
			'fresh'=>'Fresh',
			'dis_10'=>'-10%',
			'dis_20'=>'-20%',
			'dis_30'=>'-30%',
			'dis_40'=>'-40%',
			'dis_50'=>'-50%',
			'dis_60'=>'-60%',
			'dis_70'=>'-70%',
			'dis_80'=>'-80%',
			'dis_90'=>'-90%',
			'dis_100'=>'-100%',

		);

		$themes  = apply_filters('pricingtable_ribbons', $themes);



		return $themes;

	}


	public function column_animation($themes = array()){

		$themes = array(
			''=>'None',
			'bounce'=>'Bounce',
			'flash'=>'Flash',
			'pulse'=>'Pulse',
			'shake'=>'Shake',
			'swing'=>'Swing',
			'tada'=>'Tada',
			'wobble'=>'Wobble',
			'flip'=>'Flip',
			'flipInX'=>'FlipInX',
			'flipInY'=>'FlipInY',
			'fadeIn'=>'FadeIn',
			'fadeInDown'=>'FadeInDown',
			'fadeInUp'=>'FadeInUp',
			'bounceIn'=>'BounceIn',
			'bounceInDown'=>'BounceInDown',
			'bounceInUp'=>'BounceInUp',


		);

		$themes  = apply_filters('pricingtable_animation', $themes);



		return $themes;

	}
















	public function signup_button_style($themes = array()){

		$themes = array(
			''=>'None',
			'flat'=>'Flat',
			'rounded'=>'Rounded',
			'semi-round'=>'Semi Round',
			'semi-rounded-top'=>'Rounded Top',
			'semi-rounded-bottom'=>'Rounded Bottom',
			'border-left'=>'Border Left',
			'border-right'=>'Border Right',
			'border-bottom'=>'Border Bottom',
			'border-top'=>'Border Top',
			'ripple'=>'Ripple',


		);

		$themes  = apply_filters('pricingtable_signup_button_style', $themes);



		return $themes;

	}



	
	public function pricingtable_themes($themes = array()){

			$themes = array(

				'flat'=>array('name'=>__('Flat','pricingtable'), 'is_pro'=>'no'),
				'rounded'=>array('name'=>__('Rounded','pricingtable'), 'is_pro'=>'no'),
				'semi-rounded'=>array('name'=>__('Semi rounded','pricingtable'), 'is_pro'=>'no'),

				'horizontal'=>array('name'=>__('Horizontal','pricingtable'), 'is_pro'=>'yes'),

				'skewtopright'=>array('name'=>__('Skew top right','pricingtable'), 'is_pro'=>'yes'),
				'skewtopleft'=>array('name'=>__('Skew top left','pricingtable'), 'is_pro'=>'yes'),
				'skewbottomright'=>array('name'=>__('Skew bottom right','pricingtable'), 'is_pro'=>'yes'),
				'skewbottomleft'=>array('name'=>__('Skew bottom left','pricingtable'), 'is_pro'=>'yes'),

				'shadow-bottomright'=>array('name'=>__('Shadow bottom right','pricingtable'), 'is_pro'=>'yes'),
				'shadow-bottomleft'=>array('name'=>__('Shadow bottom left','pricingtable'), 'is_pro'=>'yes'),
				'shadow-topleft'=>array('name'=>__('Shadow top left','pricingtable'), 'is_pro'=>'yes'),
				'shadow-topright'=>array('name'=>__('Shadow top right','pricingtable'), 'is_pro'=>'yes'),


				'media-topright'=>array('name'=>__('Media on top-right','pricingtable'), 'is_pro'=>'yes'),
				'media-topleft'=>array('name'=>__('Media on top-left','pricingtable'), 'is_pro'=>'yes'),
				'media-topcenter'=>array('name'=>__('Media on top-center','pricingtable'), 'is_pro'=>'yes'),

				'rounded-price'=>array('name'=>__('Rounded price','pricingtable'), 'is_pro'=>'yes'),

				'price-topleft'=>array('name'=>__('Price top left','pricingtable'), 'is_pro'=>'yes'),
				'price-topright'=>array('name'=>__('Price top right','pricingtable'), 'is_pro'=>'yes'),
				'price-topcenter'=>array('name'=>__('Price top center','pricingtable'), 'is_pro'=>'yes'),

				'header-topcenter'=>array('name'=>__('Header top center','pricingtable'), 'is_pro'=>'yes'),
				'header-bottomcenter'=>array('name'=>__('Header bottom center','pricingtable'), 'is_pro'=>'yes'),

				'footer-topcenter'=>array('name'=>__('Footer top center','pricingtable'), 'is_pro'=>'yes'),
				'footer-bottomcenter'=>array('name'=>__('Footer Bottom center','pricingtable'), 'is_pro'=>'yes'),
				'footer-bottomhover'=>array('name'=>__('Footer bottom hover','pricingtable'), 'is_pro'=>'yes'),
				'footer-tophover'=>array('name'=>__('Footer top hover','pricingtable'), 'is_pro'=>'yes'),


				);

			$themes  = apply_filters('pricingtable_themes', $themes);

			return $themes;

	}

	public function column_item_position($themes = array()){

		$themes = array(
			'header'=>array('name'=>'Header','is_hide'=>'no'),
			'media'=>array('name'=>'Media','is_hide'=>'no'),
			'price'=>array('name'=>'Price','is_hide'=>'no'),
			'body'=>array('name'=>'Body','is_hide'=>'no'),
			'footer'=>array('name'=>'Footer','is_hide'=>'no'),
		);

		$themes  = apply_filters('pricingtable_column_items', $themes);

		return $themes;

	}
	
	
	
	
}

//new class_accordions_functions();