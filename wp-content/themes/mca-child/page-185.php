<?php get_header(); ?>
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
            <div id="post-185" class="post-185 page type-page status-publish hentry">
                <span class="entry-title" style="display: none;">What Is MCA?</span><span class="vcard" style="display: none;"><span class="fn"><a href="http://mcaprotools.com/author/ptadmin/" title="Posts by MCAPT Admin" rel="author">MCAPT Admin</a></span></span><span class="updated" style="display:none;">2015-07-07T14:59:45+00:00</span>																		<div class="post-content">
                    <script type="text/javascript">
                        jQuery(document).ready(function($) {

                            var ref   = $.cookie( 'affwp_ref' );
                            var visit = $.cookie( 'affwp_ref_visit_id' );

                            // If a referral var is present and a referral cookie is not already set
                            if( ref && visit ) {

                                // Fire an ajax request to log the hit
                                $.ajax({
                                    type: "POST",
                                    data: {
                                        action      : 'affwp_track_conversion',
                                        affiliate   : ref,
                                        amount      : '$0.00',
                                        status      : 'pending',
                                        description : 'User has made it to the business opportunity page and has not purchased anything yet',
                                        context     : '',
                                        reference   : '',
                                        campaign    : '',
                                        md5         : 'afa8ff96032de20eafab3a2a86e83ce0'
                                    },
                                    url: affwp_scripts.ajaxurl,
                                    success: function (response) {
                                        if ( window.console && window.console.log ) {
                                            console.log( response );
                                        }
                                    }

                                }).fail(function (response) {
                                    if ( window.console && window.console.log ) {
                                        console.log( response );
                                    }
                                }).done(function (response) {
                                });

                            }

                        });
                    </script>
                    <div id="landing-box">
                        <center><p></p>
                            <h1><b>Watch The Video Below</b> To See What MCA Is Doing For Their <br>7+ Million Members!</h1>
                            <p class="salespagep">MCA is a unique motor club serving the United States, Canada &amp; Puerto Rico offering 24/7 emergency roadside assistance, discounts and the most reliable service in the auto club industry.</p>
                            <p><iframe width="720" height="480" src="https://www.youtube.com/embed/DlpIgk_uQr0?rel=0" frameborder="0" allowfullscreen=""></iframe></p>
                            <p class="salespagep">With over 86+ years of professional experience, MCA knows how to provide the best in customer care while offering a variety of options that best suit your individual needs.</p>
                            <div class="su-button-center"><a href="#" class="su-button su-button-style-default btn-mca-complete" style="color:#FFFFFF;background-color:#de2b20;border-color:#b2221a;border-radius:5px;-moz-border-radius:5px;-webkit-border-radius:5px" target="_self"><span style="color:#FFFFFF;padding:0px 34px;font-size:25px;line-height:50px;border-color:#e86b63;border-radius:5px;-moz-border-radius:5px;-webkit-border-radius:5px;text-shadow:none;-moz-text-shadow:none;-webkit-text-shadow:none"> GET MCA TOTAL SECURITY!</span></a></div>
                            <h1 style="margin-top: 75px; margin-bottom: 25px;">History of Motor Club Of America</h1>
                            <p style="margin-top:25px;">Motor Club Of America will continues to set the standard for quality in the Motor Club Industry. Their winning culture defines the attitudes and behaviors that will be required of us to make our 2020 vision a reality. By constantly listening to their members, they learn and quickly adapt to changes in the market in order to constantly improve our portfolio of useful services that can be used 24 Hours A Day / 7 Days A Week / 365 Days A Year!</p>
                            <p><img src="http://mcaprotools.s3-us-west-2.amazonaws.com/wp-content/uploads/2015/02/MCA_Timeline.png" alt="MCA_Timeline" width="1080" class="alignnone size-full wp-image-664" srcset="http://mcaprotools.com/wp-content/uploads/2015/02/MCA_Timeline.png 2892w, http://mcaprotools.com/wp-content/uploads/2015/02/MCA_Timeline-208x300.png 208w, http://mcaprotools.com/wp-content/uploads/2015/02/MCA_Timeline-710x1024.png 710w, http://mcaprotools.com/wp-content/uploads/2015/02/MCA_Timeline-69x100.png 69w, http://mcaprotools.com/wp-content/uploads/2015/02/MCA_Timeline-120x173.png 120w, http://mcaprotools.com/wp-content/uploads/2015/02/MCA_Timeline-500x721.png 500w" sizes="(max-width: 2892px) 100vw, 2892px"></p>
                            <h1 style="margin-top:50px;">Everything Makes Sense So Far?</h1>
                            <p class="salespagep">The next step is for you to decide to join now so we can speak after – as I will be following up with you!</p>
                            <div class="su-button-center"><a href="#" class="su-button su-button-style-default btn-mca-complete" style="color:#FFFFFF;background-color:#de2b20;border-color:#b2221a;border-radius:5px;-moz-border-radius:5px;-webkit-border-radius:5px" target="_self"><span style="color:#FFFFFF;padding:0px 34px;font-size:25px;line-height:50px;border-color:#e86b63;border-radius:5px;-moz-border-radius:5px;-webkit-border-radius:5px;text-shadow:none;-moz-text-shadow:none;-webkit-text-shadow:none"> GET MCA TOTAL SECURITY!</span></a></div>
                            <p style="margin-top:25px;">When you get started today you will get a special invite to the #1 training &amp; marketing system for MCA to go along  with your fabulous benefits and help you jumpstart your new business opportunity.</p>
                            <h2>As Seen On:</h2>
                            <p><img src="http://mcaprotools.s3-us-west-2.amazonaws.com/wp-content/uploads/2015/02/asseenon.png" alt="asseenon" width="916" height="180" class="aligncenter size-full wp-image-859" srcset="http://mcaprotools.com/wp-content/uploads/2015/02/asseenon.png 916w, http://mcaprotools.com/wp-content/uploads/2015/02/asseenon-300x59.png 300w, http://mcaprotools.com/wp-content/uploads/2015/02/asseenon-100x20.png 100w, http://mcaprotools.com/wp-content/uploads/2015/02/asseenon-120x24.png 120w, http://mcaprotools.com/wp-content/uploads/2015/02/asseenon-500x98.png 500w" sizes="(max-width: 916px) 100vw, 916px"></p>
                            <p class="salespagep" style="margin-top: 25px;">Still Undecided? Call MCA with any of your inquiries 1-800-796-7710</p>

                        </center>
                    </div>
                </div>
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