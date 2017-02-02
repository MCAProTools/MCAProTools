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
            <div id="post-187" class="post-187 page type-page status-publish hentry">
                <span class="entry-title" style="display: none;">MCA Testimonials</span><span class="vcard" style="display: none;"><span class="fn"><a href="http://mcaprotools.com/author/ptadmin/" title="Posts by MCAPT Admin" rel="author">MCAPT Admin</a></span></span><span class="updated" style="display:none;">2016-03-08T18:37:58+00:00</span>																		<div class="post-content">
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
                                        description : 'Has not paid for MCA and is viewing the testimonials!',
                                        context     : '',
                                        reference   : '',
                                        campaign    : '',
                                        md5         : '607a3d8e4f070ada067575e64eb93259'
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
                    <div id="lp">
                        <center><p></p>
                            <h1><strong>GREG MADE OVER 100K+</strong> IN 6 SHORT MONTHS in 2012 WHEN HE STARTED WITH MCA!</h1>
                            <p>(He ended up making over 230k in a year’s time between June 2012/June 2013 &amp; it only took him $40 to start! THOUSANDS OF PEOPLE HAVE MADE MONEY WITH MCA. THIS IS NOT SLOWING DOWN!</p>
                            <div class="videoWrapper">
                                <div class="wistia_responsive_padding" style="padding:56.25% 0 0 0;position:relative;"><div class="wistia_responsive_wrapper" style="height:100%;left:0;position:absolute;top:0;width:100%;"><div class="wistia_video_foam_dummy" data-source-container-id="" style="border: 0px; display: block; height: 0px; margin: 0px; padding: 0px; position: static; visibility: hidden; width: auto;"></div><iframe src="//fast.wistia.net/embed/iframe/iyfttahsx5?seo=false&amp;videoFoam=true" allowtransparency="true" frameborder="0" scrolling="no" class="wistia_embed" name="wistia_embed" allowfullscreen="allowfullscreen" mozallowfullscreen="mozallowfullscreen" webkitallowfullscreen="webkitallowfullscreen" oallowfullscreen="oallowfullscreen" msallowfullscreen="msallowfullscreen" width="1100" height="619" style="width: 1100px; height: 619px;"></iframe></div></div>
                                <script src="//fast.wistia.net/assets/external/E-v1.js" async=""></script>
                            </div>
                            <p class="lp-prepaid"><strong>DO NOT SIGN UP OR GO FURTHER IF YOU DO NOT HAVE A BANK CARD OR CREDIT CARD.</strong> THIS IS FOR SERIOUS PEOPLE, NOT TEMPORARY PRE PAID PEOPLE. IF YOU HAVE PREPAID, THE SIGNUP OR BUSINESS WONT WORK FOR YOU!</p>
                            <div class="su-button-center"><a href="#" class="su-button su-button-style-default btn-mca-complete btn-mca-start myBtn pum-trigger" style="color: rgb(255, 255, 255); background-color: rgb(222, 43, 32); border-color: rgb(178, 34, 26); border-radius: 5px; cursor: pointer;" target="_self"><span style="color:#FFFFFF;padding:0px 34px;font-size:25px;line-height:50px;border-color:#e86b63;border-radius:5px;-moz-border-radius:5px;-webkit-border-radius:5px;text-shadow:none;-moz-text-shadow:none;-webkit-text-shadow:none"> GET MCA TOTAL SECURITY</span></a></div>
                            <p class="lp-prepaid"><strong>NO PREPAID DEBIT CARDS</strong> THAT YOU BUY &amp; LOAD FROM 7 ELEVEN, WALMART OR ANYTHING LIKE THAT. DO NOT PAY BY EBT TRANSFER BANK DRAFT. THAT WILL TAKE TOO LONG! If you don’t have a bank account, GO GET ONE.</p>
                            <h1>HERE IS SOME MORE TESTIMONIALS!<p></p>
                            </h1><h1>
                                <div class="su-row">
                                    <div class="su-column su-column-size-1-2"><div class="su-column-inner su-clearfix">
                                            <div class="videoWrapper">
                                                <div class="wistia_responsive_padding" style="padding:56.25% 0 0 0;position:relative;"><div class="wistia_responsive_wrapper" style="height:100%;left:0;position:absolute;top:0;width:100%;"><div class="wistia_video_foam_dummy" data-source-container-id="" style="border: 0px; display: block; height: 0px; margin: 0px; padding: 0px; position: static; visibility: hidden; width: auto;"></div><iframe src="//fast.wistia.net/embed/iframe/i5h63mozlg?seo=false&amp;videoFoam=true" allowtransparency="true" frameborder="0" scrolling="no" class="wistia_embed" name="wistia_embed" allowfullscreen="allowfullscreen" mozallowfullscreen="mozallowfullscreen" webkitallowfullscreen="webkitallowfullscreen" oallowfullscreen="oallowfullscreen" msallowfullscreen="msallowfullscreen" width="528" height="297" style="width: 528px; height: 297px;"></iframe></div></div>
                                                <script src="//fast.wistia.net/assets/external/E-v1.js" async=""></script>
                                            </div>
                                            <p> </p></div></div>
                                    <div class="su-column su-column-size-1-2"><div class="su-column-inner su-clearfix"> <p></p>
                                            <div class="videoWrapper">
                                                <div class="wistia_responsive_padding" style="padding:56.25% 0 0 0;position:relative;"><div class="wistia_responsive_wrapper" style="height:100%;left:0;position:absolute;top:0;width:100%;"><div class="wistia_video_foam_dummy" data-source-container-id="" style="border: 0px; display: block; height: 0px; margin: 0px; padding: 0px; position: static; visibility: hidden; width: auto;"></div><iframe src="//fast.wistia.net/embed/iframe/xfnt5gt5g6?seo=false&amp;videoFoam=true" allowtransparency="true" frameborder="0" scrolling="no" class="wistia_embed" name="wistia_embed" allowfullscreen="allowfullscreen" mozallowfullscreen="mozallowfullscreen" webkitallowfullscreen="webkitallowfullscreen" oallowfullscreen="oallowfullscreen" msallowfullscreen="msallowfullscreen" width="528" height="297" style="width: 528px; height: 297px;"></iframe></div></div>
                                                <script src="//fast.wistia.net/assets/external/E-v1.js" async=""></script> </div></div>
                                    </div>
                                </div>
                                <p><h style="font-size:60px; line-height:55px;">ARE YOU READY TO MAKE SOME MONEY? IT IS YOUR TURN!</h></p></h1>
                            <div class="su-row">
                                <p>  </p><div class="su-column su-column-size-1-3"><div class="su-column-inner su-clearfix">
                                        <div class="videoWrapper">
                                            <div class="wistia_responsive_padding" style="padding:56.25% 0 0 0;position:relative;"><div class="wistia_responsive_wrapper" style="height:100%;left:0;position:absolute;top:0;width:100%;"><div class="wistia_video_foam_dummy" data-source-container-id="" style="border: 0px; display: block; height: 0px; margin: 0px; padding: 0px; position: static; visibility: hidden; width: auto;"></div><iframe src="//fast.wistia.net/embed/iframe/zf6xsm1xd4?seo=false&amp;videoFoam=true" allowtransparency="true" frameborder="0" scrolling="no" class="wistia_embed" name="wistia_embed" allowfullscreen="allowfullscreen" mozallowfullscreen="mozallowfullscreen" webkitallowfullscreen="webkitallowfullscreen" oallowfullscreen="oallowfullscreen" msallowfullscreen="msallowfullscreen" width="319" height="179" style="width: 319px; height: 179px;"></iframe></div></div>
                                            <script src="//fast.wistia.net/assets/external/E-v1.js" async=""></script>
                                        </div>
                                    </div></div>
                                <div class="su-column su-column-size-1-3"><div class="su-column-inner su-clearfix">
                                        <div class="videoWrapper"><div class="wistia_responsive_padding" style="padding:56.25% 0 0 0;position:relative;"><div class="wistia_responsive_wrapper" style="height:100%;left:0;position:absolute;top:0;width:100%;"><div class="wistia_video_foam_dummy" data-source-container-id="" style="border: 0px; display: block; height: 0px; margin: 0px; padding: 0px; position: static; visibility: hidden; width: auto;"></div><iframe src="//fast.wistia.net/embed/iframe/prtfu6829o?seo=false&amp;videoFoam=true" allowtransparency="true" frameborder="0" scrolling="no" class="wistia_embed" name="wistia_embed" allowfullscreen="allowfullscreen" mozallowfullscreen="mozallowfullscreen" webkitallowfullscreen="webkitallowfullscreen" oallowfullscreen="oallowfullscreen" msallowfullscreen="msallowfullscreen" width="319" height="179" style="width: 319px; height: 179px;"></iframe></div></div>
                                            <script src="//fast.wistia.net/assets/external/E-v1.js" async=""></script>
                                        </div>
                                    </div></div>
                                <div class="su-column su-column-size-1-3"><div class="su-column-inner su-clearfix">
                                        <div class="videoWrapper"><div class="wistia_responsive_padding" style="padding:56.25% 0 0 0;position:relative;"><div class="wistia_responsive_wrapper" style="height:100%;left:0;position:absolute;top:0;width:100%;"><div class="wistia_video_foam_dummy" data-source-container-id="" style="border: 0px; display: block; height: 0px; margin: 0px; padding: 0px; position: static; visibility: hidden; width: auto;"></div><iframe src="//fast.wistia.net/embed/iframe/k5pu51p75t?seo=false&amp;videoFoam=true" allowtransparency="true" frameborder="0" scrolling="no" class="wistia_embed" name="wistia_embed" allowfullscreen="allowfullscreen" mozallowfullscreen="mozallowfullscreen" webkitallowfullscreen="webkitallowfullscreen" oallowfullscreen="oallowfullscreen" msallowfullscreen="msallowfullscreen" width="319" height="179" style="width: 319px; height: 179px;"></iframe></div></div>
                                            <script src="//fast.wistia.net/assets/external/E-v1.js" async=""></script>
                                        </div>
                                    </div></div>
                            </div>
                            <h2>HOW IT CAN GO FOR YOU IF YOU’RE PAYING ATTENTION!</h2>
                            <p>WE CAN AND WILL TEACH YOU HOW YOU CAN TURN $40 INTO VALUABLE KNOWLEDGE THAT WILL SHOW YOU HOW TO EARN AN EXTRA FEW HUNDRED TO FEW THOUSAND WEEKLY. <strong>IF YOU PAY CLOSE ATTENTION.</strong></p>
                            <p></p><center><p></p>
                                <p class="lp-prepaid"><strong>DO NOT SIGN UP OR GO FURTHER IF YOU DO NOT HAVE A BANK CARD OR CREDIT CARD.</strong> THIS IS FOR SERIOUS PEOPLE, NOT TEMPORARY PRE PAID PEOPLE. IF YOU HAVE PREPAID, THE SIGNUP OR BUSINESS WONT WORK FOR YOU!</p>
                                <div class="su-button-center"><a href="#" class="su-button su-button-style-default btn-mca-complete btn-mca-start myBtn pum-trigger" style="color: rgb(255, 255, 255); background-color: rgb(222, 43, 32); border-color: rgb(178, 34, 26); border-radius: 5px; cursor: pointer;" target="_self"><span style="color:#FFFFFF;padding:0px 34px;font-size:25px;line-height:50px;border-color:#e86b63;border-radius:5px;-moz-border-radius:5px;-webkit-border-radius:5px;text-shadow:none;-moz-text-shadow:none;-webkit-text-shadow:none"> GET MCA TOTAL SECURITY</span></a></div>
                                <p class="lp-prepaid"><strong>NO PREPAID DEBIT CARDS</strong> THAT YOU BUY &amp; LOAD FROM 7 ELEVEN, WALMART OR ANYTHING LIKE THAT. DO NOT PAY BY EBT TRANSFER BANK DRAFT. THAT WILL TAKE TOO LONG! If you dont have a bank account, GO GET ONE.</p>
                                <p></p></center><br>

                            <p></p></center>
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
    <!-- The Modal -->
    <div id="myModal" class="mca-modal email-optin">

        <!-- Modal content -->
        <div class="modal-content">
            <span class="close">Close</span>

            <h3 style="text-align: center; font-size: 35px !important;">GET! "MCA Total Security" TODAY!</h3>

            <center>
                <div><div class="wistia_responsive_padding" style="padding:56.25% 0 0 0;position:relative;"><div class="wistia_responsive_wrapper" style="height:100%;left:0;position:absolute;top:0;width:100%;"><iframe src="//fast.wistia.net/embed/iframe/n7oh47e7hr?seo=false&videoFoam=true" allowtransparency="true" frameborder="0" scrolling="no" class="wistia_embed" name="wistia_embed" allowfullscreen mozallowfullscreen webkitallowfullscreen oallowfullscreen msallowfullscreen width="100%" height="100%"></iframe></div></div>
                    <script src="//fast.wistia.net/assets/external/E-v1.js" async></script>
                    <div></div>
                </div>
            </center>
            <div class="buy-content">

                ONLY <strong>$20.00 / PER MONTH!</strong>

                <a class="buy-mca-button" href="https://www.tvcmatrix.com/secure/cart/addItem.aspx?qty=1&amp;itID=9135&amp;PromoID=83&amp;uid=[protool_mca_user meta_key='mca_member' referrer_data='yes' referrer_key='ref' display_type='single_line']" target="_blank"><img src="http://mcaprotools.s3-us-west-2.amazonaws.com/wp-content/uploads/2015/03/buy_now_button1.png" alt="buy_now_button" width="592" height="123" /></a>

                GET A SPECIAL WELCOME CALL WHEN YOU ORDER TODAY!

            </div>
        </div>

        <div class="modal-content-active-membership">
            <span class="close">Close</span>
            <h3>Do You Have An Active Motor Club of America Account?</h3>
            <div class="buttons-row">
                <div class="left-col">
                    <a href="https://www.tvcmatrix.com/secure/cart/addItem.aspx?qty=1&itID=9135&PromoID=83&uid=felontofortune" class="btn">No…I DO NOT!</a>
                    <p>
                        If you do not have an "Active" Motor Club of America account, select this option.
                    </p>
                </div>
                <div class="right-col">
                    <a href="#" class="btn yesido">YES... I DO!</a>
                    <p>
                        Selecting this options means you already have an "Active" Motor Club of America account.
                    </p>
                </div>
            </div>
        </div>

    </div>
<?php get_footer(); ?>