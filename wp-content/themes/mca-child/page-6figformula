<?php
/* Template Name: 6 Figure Formula */
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
            <div id="post-259" class="post-259 page type-page status-publish hentry">
               
 <span class="entry-title" style="display: none; padding: 20px;">This Push Button Marketing System</span><span class="vcard" style="display: none;"><span class="fn"><a href="http://mcaprotools.com/author/ptadmin/" title="Posts by MCAPT Admin" rel="author">MCAPT Admin</a></span></span><span class="updated" style="display:none;">2015-07-07T14:59:42+00:00</span>																		<div class="post-content">
                    <div id="landing-box">
                        <center><p></p>
                            <h2><span style="color: red !important;">This “Push Button” System</span> Is Showing Regular People Like You How To Generate $80 - $2000 In Commissions – Every Week!</h2>
                            
                            
                            
                            <div id="videowrapper">
                            <div class="wistia_responsive_padding" style="padding:56.25% 0 0 0;position:relative;"><div class="wistia_responsive_wrapper" style="height:100%;left:0;position:absolute;top:0;width:100%;"><iframe src="https://fast.wistia.net/embed/iframe/t5fuwpu0ou?seo=false&videoFoam=true" title="Wistia video player" allowtransparency="true" frameborder="0" scrolling="no" class="wistia_embed" name="wistia_embed" allowfullscreen mozallowfullscreen webkitallowfullscreen oallowfullscreen msallowfullscreen width="100%" height="100%"></iframe></div></div>
                            </div>
                            
                            
                            
<h2 style="padding: 30px;">This Is How We Choose To Live Life... Come Live It With Us!</h2>



<h3 style="color: red !important; font-size: 23px !important;">Take Action Today! Limited Number Of Spaces Available!</h3>

              <p><a href="#" target="_blank" class='custom_pop_up'>
              <img src="https://mcaprotools.com/wp-content/uploads/2017/04/sign-me-up.png" alt="let-me-in" width="640" height="158" class="popmake-993 alignnone size-full wp-image-260" srcset="http://mcaprotools.com/wp-content/uploads/2017/04/sign-me-up.png 640w, http://mcaprotools.com/wp-content/uploads/2017/04/sign-me-up.png 300w, http://mcaprotools.com/wp-content/uploads/2017/04/sign-me-up-100x25.png 100w, http://mcaprotools.com/wp-content/uploads/2017/04/sign-me-up-120x30.png 120w, http://mcaprotools.com/wp-content/uploads/2017/04/sign-me-up-500x123.png 500w" sizes="(max-width: 640px) 100vw, 640px"><br>
              </a></p>
</center>
                    </div>
                </div>
            </div>s
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
	
	<div class="modal-content-active-membership" style="z-index:99999;">
        <span class="custom_close">Close</span>

        <h3>Do You Have An Active Motor Club of America Account?</h3>

        <div class="buttons-row">
            <div class="left-col">
                <a href="https://www.tvcmatrix.com/secure/cart/addItem.aspx?qty=1&amp;itID=9135&amp;PromoID=83&amp;uid=<?php if (isset($_GET['ref'])) echo $_GET['ref']; ?>"
                   class="btn">No…I DO
                    NOT!</a>

                <p>
                    If you do not have an "Active" Motor Club of America account, select this option.
                </p>
            </div>
            <div class="right-col">
                <a href="/invite" class="btn yesido">YES... I DO!</a>

                <p>
                    Selecting this options means you already have an "Active" Motor Club of America account.
                </p>
            </div>
        </div>
    </div>
	
<?php get_footer(); ?>
