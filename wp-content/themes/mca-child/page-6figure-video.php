<?php

/* Template Name: 6 Figure Video */

get_header(); ?>

	<?php

	$content_css = '';

	$sidebar_css = '';

	$sidebar_exists = true;

	$sidebar_left = '';

	$double_sidebars = false;



	$sidebar_1 = get_post_meta( $post->ID, 'sbg_selected_sidebar_replacement', true );

	$sidebar_2 = get_post_meta( $post->ID, 'sbg_selected_sidebar_2_replacement', true );



	if( $smof_data['pages_global_sidebar']  || ( class_exists( 'TribeEvents' ) &&  is_events_archive() ) ) {

		if( $smof_data['pages_sidebar'] != 'None' ) {

			$sidebar_1 = array( $smof_data['pages_sidebar'] );

		} else {

			$sidebar_1 = '';

		}



		if( $smof_data['pages_sidebar_2'] != 'None' ) {

			$sidebar_2 = array( $smof_data['pages_sidebar_2'] );

		} else {

			$sidebar_2 = '';

		}

	}



	if( ( is_array( $sidebar_1 ) && ( $sidebar_1[0] || $sidebar_1[0] === '0' ) ) && ( is_array( $sidebar_2 ) && ( $sidebar_2[0] || $sidebar_2[0] === '0' ) ) ) {

		$double_sidebars = true;

	}



	if( is_array( $sidebar_1 ) &&

		( $sidebar_1[0] || $sidebar_1[0] === '0' ) 

	) {

		$sidebar_exists = true;

	} else {

		$sidebar_exists = false;

	}



	if( ! $sidebar_exists ) {

		$content_css = 'width:100%';

		$sidebar_css = 'display:none';

		$sidebar_exists = false;

	} elseif(get_post_meta($post->ID, 'pyre_sidebar_position', true) == 'left') {

		$content_css = 'float:right;';

		$sidebar_css = 'float:left;';

		$sidebar_left = 1;

	} elseif(get_post_meta($post->ID, 'pyre_sidebar_position', true) == 'right') {

		$content_css = 'float:left;';

		$sidebar_css = 'float:right;';

	} elseif(get_post_meta($post->ID, 'pyre_sidebar_position', true) == 'default' || ! metadata_exists( 'post', $post->ID, 'pyre_sidebar_position' )) {

		if($smof_data['default_sidebar_pos'] == 'Left') {

			$content_css = 'float:right;';

			$sidebar_css = 'float:left;';

			$sidebar_left = 1;

		} elseif($smof_data['default_sidebar_pos'] == 'Right') {

			$content_css = 'float:left;';

			$sidebar_css = 'float:right;';

			$sidebar_left = 2;

		}

	}



	if(get_post_meta($post->ID, 'pyre_sidebar_position', true) == 'right') {

		$sidebar_left = 2;

	}

	

	if( $smof_data['pages_global_sidebar']  || ( class_exists( 'TribeEvents' ) &&  is_events_archive() ) ) {

		if( $smof_data['pages_sidebar'] != 'None' ) {

			$sidebar_1 = $smof_data['pages_sidebar'];

			

			if( $smof_data['default_sidebar_pos'] == 'Right' ) {

				$content_css = 'float:left;';

				$sidebar_css = 'float:right;';	

				$sidebar_left = 2;

			} else {

				$content_css = 'float:right;';

				$sidebar_css = 'float:left;';

				$sidebar_left = 1;

			}			

		}



		if( $smof_data['pages_sidebar_2'] != 'None' ) {

			$sidebar_2 = $smof_data['pages_sidebar_2'];

		}

		

		if( $smof_data['pages_sidebar'] != 'None' && $smof_data['pages_sidebar_2'] != 'None' ) {

			$double_sidebars = true;

		}

	} else {

		$sidebar_1 = '0';

		$sidebar_2 = '0';

	}

	

	if($double_sidebars == true) {

		$content_css = 'float:left;';

		$sidebar_css = 'float:left;';

		$sidebar_2_css = 'float:left;';

	} else {

		$sidebar_left = 1;

	}	



	if(class_exists('Woocommerce')) {

		if(is_cart() || is_checkout() || is_account_page() || (get_option('woocommerce_thanks_page_id') && is_page(get_option('woocommerce_thanks_page_id')))) {

			$content_css = 'width:100%';

			$sidebar_css = 'display:none';

			$sidebar_exists = false;

		}

	}

	?>

	<div id="content" style="<?php echo $content_css; ?>">

		<?php

		if(have_posts()): the_post();

		?>

                    <div id="landing-box-salesvideo" style="width: 840px; padding: 50px; background-color: #fff; margin: 0 auto;" class="6fig-box">


                            <p class="6fig-title" style="margin: 0 auto; width: 80%; line-height: 100%; font-size: 36px; font-weight: 700; padding-bottom: 15px;">It's Unbeliebable How Easy It Is To Earn <span class="red-tag" style="color: crimson;">$2000+ (Or More) Per Week</span></p>
                            <p class="6fig-subtitle" style="margin: 0 auto; margin-bottom: 25px; text-align: center; width: 85%; font-size: 24px;"><u style="background: yellow; padding: 5px; padding-left: 15px; padding-right: 15px;">Watch My Video Below To Discover How You Can Too...</u></p>
                            
                            <div class="wistia_responsive_padding" style="padding:56.25% 0 0 0;position:relative;"><div class="wistia_responsive_wrapper" style="height:100%;left:0;position:absolute;top:0;width:100%;"><iframe src="https://fast.wistia.net/embed/iframe/qjwkaimadj?seo=false&videoFoam=true" title="Wistia video player" allowtransparency="true" frameborder="0" scrolling="no" class="wistia_embed" name="wistia_embed" allowfullscreen mozallowfullscreen webkitallowfullscreen oallowfullscreen msallowfullscreen width="100%" height="100%"></iframe></div></div>
<script src="https://fast.wistia.net/assets/external/E-v1.js" async></script>


                        
        
			    
			    <a href="<?php bloginfo('url') ?>/checkout/?add-to-cart=3287" target="_self">
			    <div style="text-align: center; color:#FFFFFF; background-color:#de2b20; font-size: 29px; padding: 25px; margin: 20px; border-color:#b2221a; border-radius:5px; -moz-border-radius:5px; -webkit-border-radius:5px" class="su-button-center">
         			YES! I WANT ACCESS TO THE TRAINING NOW! 
				
           			</div>
				    </a>
                        
                        
                        
				<a href="<?php bloginfo('url') ?>/invite/" target="_self">
					<p class="no-thanks-link" style="text-align: center; font-size: 14px;">No Thanks, I Don't Want This Right Now...It Wasn't Helpful Too Me!</p>
					
			   	 </a>



                   	<div>
                                    
  
					

                    </div>

                

            

		<?php endif; ?>

	</div>

	<?php if( $sidebar_exists == true ): ?>

	<?php wp_reset_query(); ?>

	<div id="sidebar" class="sidebar" style="<?php echo $sidebar_css; ?>">

		<?php

		if($sidebar_left == 1) {

			generated_dynamic_sidebar($sidebar_1);

		}

		if($sidebar_left == 2) {

			generated_dynamic_sidebar_2($sidebar_2);

		}

		?>

	</div>

	<?php if( $double_sidebars == true ): ?>

	<div id="sidebar-2" class="sidebar" style="<?php echo $sidebar_2_css; ?>">

		<?php

		if($sidebar_left == 1) {

			generated_dynamic_sidebar_2($sidebar_2);

		}

		if($sidebar_left == 2) {

			generated_dynamic_sidebar($sidebar_1);

		}

		?>

	</div>

	<?php endif; ?>

	<?php endif; ?>

<?php get_footer(); ?>
