<?php
/* Template Name: benefits */
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
            <div id="post-26" class="post-26 page type-page status-publish hentry">
                <span class="entry-title" style="display: none;">Benefits of MCA Membership</span><span class="vcard" style="display: none;"><span class="fn"><a href="http://mcaprotools.com/author/ptadmin/" title="Posts by MCAPT Admin" rel="author">MCAPT Admin</a></span></span><span class="updated" style="display:none;">2015-07-07T14:59:34+00:00</span>																		<div class="post-content">
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
                                        description : 'The user will decide if they want to purchase MCA here.',
                                        context     : '',
                                        reference   : '',
                                        campaign    : '',
                                        md5         : '48f5b0b6f0d112f0eceb3e02eb40762a'
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
                    <div id="landing-box"><center><p></p>
                            <h1 style="font-size: 65px; line-height: 100%;">Motor Club Of America Has You Protected!</h1>
                            <div class="videoWrapper">
                                <div class="wistia_responsive_padding" style="padding:56.25% 0 0 0;position:relative;"><div class="wistia_responsive_wrapper" style="height:100%;left:0;position:absolute;top:0;width:100%;"><div class="wistia_video_foam_dummy" data-source-container-id="" style="border: 0px; display: block; height: 0px; margin: 0px; padding: 0px; position: static; visibility: hidden; width: auto;"></div><iframe src="//fast.wistia.net/embed/iframe/u2e9a1kesz?seo=false&amp;videoFoam=true" allowtransparency="true" frameborder="0" scrolling="no" class="wistia_embed" name="wistia_embed" allowfullscreen="allowfullscreen" mozallowfullscreen="mozallowfullscreen" webkitallowfullscreen="webkitallowfullscreen" oallowfullscreen="oallowfullscreen" msallowfullscreen="msallowfullscreen" width="750" height="422" style="width: 750px; height: 422px;"></iframe></div></div>
                                <script src="//fast.wistia.net/assets/external/E-v1.js" async=""></script>
                            </div>
                            <p></p></center><strong>We all know how life happens. </strong>Cars run out of gas, batteries die, and even the safest of drivers get into both major and minor car accidents. <em>When the unexpected happens, our members can be rest assured knowing that <strong>MCA has them covered</strong>.</em><p></p>
                        <blockquote><p><span class="regardless-text" style="line-height: 1.5;">Regardless of what the case is, rely on MCA to deliver peace of mind when you need it the most.&nbsp;</span></p></blockquote>
                        <p></p>
                        <h1>The MCA Coverage Plans</h1>
                        <p>The membership coverage plans from Motor Club of America provide the service you deserve and the peace of mind you most desperately want when the unexpected occurs at home, on the road or at the job. <strong>Your coverage is not only limited</strong> to roadside assistance, but<strong> you also have the added assurance</strong> of <em>personal accidental coverage, emergency room benefits, discounts on prescription drugs, dental care and vision care.</em> Help is literally a phone call away.</p>
                        <p><strong>MCA provides top notch customer service</strong> and a variety of packages to best suit your needs and budget. When you join MCA, you are in good company…</p>
                        <blockquote><p class="we-have">We have over 7,000,000 motorists that rely on MCA’s 86 years of experience to protect them.</p></blockquote>
                        <p>When you purchase a Security Plan from MCA, <strong><em>your coverage begins 24 hours after your payment has been processed</em></strong>. As a member, you’re never locked into a contract.&nbsp;Members are welcome to cancel their accounts at anytime, without any hidden or cancellation fees. Full refunds are granted within 72 hours, and half refunds are granted within 30 days of activating your membership.</p>
                        <p></p>
                        <h1 style="text-align: center;">COVERAGE FEATURES</h1>
                        <p>&nbsp;</p>
                        <h2 class="unlimited-security"><strong>UNLIMITED&nbsp;Security Roadside Assistance</strong></h2>
                        <p>As a member of our Security plan, you will receive <strong>unlimited roadside assistance</strong>, unlike our competitors which will only provide you 2-4 service calls per year. <span style="text-decoration: underline;"><em>Unlimited roadside assistance means 1 service call per day throughout the entire year</em></span>.</p>
                        <p>If we’re unable to get your 4 wheel passenger vehicle back on the road safely, it will be towed to the nearest service facility. You will also receive <strong>unlimited lockout service, unlimited fuel delivery, unlimited tire changing, and unlimited battery boosting.</strong></p>
                        <p><strong>&nbsp;</strong></p>
                        <hr>
                        <p>&nbsp;</p>
                        <h2 class="travel-assistance"><strong>Travel Assistance Reimbursement</strong></h2>
                        <p>When a members vehicle is disabled in an auto accident,<strong> Motor Club of America will reimburse up to $500.00</strong> for a rental car, lodging, or meals if the incident happened more than 50 miles away from the registered home address on your account.</p>
                        <p>To be reimbursed, simply give us a call to receive your claim form, and submit the required information to us within 90 days.</p>
                        <p>&nbsp;</p>
                        <hr>
                        <p>&nbsp;</p>
                        <h2 class="planning-travel"><strong>Planning and Travel Reservations</strong></h2>
                        <p>MCA offers free and easy to read, step by step computerized mapping services free of charge to our members. Simply fill out a Travel information card or give us a call. This includes places of interest, resort, motel and hotel information found along your route. <strong>You also have a one-stop reservation service for airline travel, car rental, and hotel discounts.</strong></p>
                        <p>&nbsp;</p>
                        <p class="lp-prepaid"><strong>DO NOT SIGN UP OR GO FURTHER IF YOU DO NOT HAVE A BANK CARD OR CREDIT CARD.</strong> THIS IS FOR SERIOUS PEOPLE, NOT TEMPORARY PRE PAID PEOPLE. IF YOU HAVE PREPAID, THE SIGNUP OR BUSINESS WONT WORK FOR YOU!</p>
                        <div class="su-button-center"><a href="#" class="su-button su-button-style-default btn-mca-complete btn-mca-start myBtn pum-trigger" style="color: rgb(255, 255, 255); background-color: rgb(222, 43, 32); border-color: rgb(178, 34, 26); border-radius: 5px; cursor: pointer;" target="_self"><span style="color:#FFFFFF;padding:0px 34px;font-size:25px;line-height:50px;border-color:#e86b63;border-radius:5px;-moz-border-radius:5px;-webkit-border-radius:5px;text-shadow:none;-moz-text-shadow:none;-webkit-text-shadow:none"> GET MCA TOTAL SECURITY</span></a></div>
                        <p>&nbsp;</p>
                        <p class="lp-prepaid"><strong>NO PREPAID DEBIT CARDS</strong> THAT YOU BUY &amp; LOAD FROM 7 ELEVEN, WALMART OR ANYTHING LIKE THAT. DO NOT PAY BY EBT TRANSFER BANK DRAFT. THAT WILL TAKE TOO LONG! If you dont have a bank account, GO GET ONE.</p>
                        <p>&nbsp;</p>
                        <hr>
                        <p>&nbsp;</p>
                        <h2 class="arrest-bonds"><strong>Arrest Bonds</strong></h2>
                        <p><strong>Your Motor Club Membership card may be used in lieu of cash bail up to $500.00</strong> when involved in a traffic violation. Although this certificate will be accepted in many states, in some states arrest bond certificates are not acceptable.</p>
                        <p><em>In Maryland the certificate is acceptable for $1,000.00</em>, and in other states they are accepted for lesser amounts than $500.00. Simply give us a call at the toll free number located on the back of your membership card to receive the assistance you need.</p>
                        <p>&nbsp;</p>
                        <hr>
                        <p>&nbsp;</p>
                        <h2 class="bail-bonds"><strong>Bail Bonds</strong></h2>
                        <p><span style="line-height: 1.5;"><strong>MCA will arrange up to a $25,000.00 bond to release you</strong> from incarceration if you’re driving a vehicle and charged with a moving traffic law violation such as vehicular manslaughter or auto related negligent homicide.</span></p>
                        <p><span style="line-height: 1.5;"> Simply call the toll-free number on the back of your membership card to receive assistance. <em>Our legal department will provide the best assistance possible to <strong>release you from incarceration</strong>.</em></span></p>
                        <p>&nbsp;</p>
                        <hr>
                        <p>&nbsp;</p>
                        <h2 class="attorney-fees"><strong>Attorney Fees</strong></h2>
                        <p><strong>Motor Club of America will pay up to $2,000.00</strong> for your attorney to defend you against police charges resulting from driving your covered auto:</p>
                        <ul>
                            <li>Up to $200.00 for covered moving violations (non-criminal)</li>
                            <li>Up to $500.00 covered auto related personal injury matters</li>
                            <li>Up to $500.00 covered vehicle damage issues</li>
                            <li>Up to $2,000.00 covered negligent homicide / vehicular manslaughter</li>
                        </ul>
                        <p>&nbsp;</p>
                        <p class="lp-prepaid"><strong>DO NOT SIGN UP OR GO FURTHER IF YOU DO NOT HAVE A BANK CARD OR CREDIT CARD.</strong> THIS IS FOR SERIOUS PEOPLE, NOT TEMPORARY PRE PAID PEOPLE. IF YOU HAVE PREPAID, THE SIGNUP OR BUSINESS WONT WORK FOR YOU!</p>
                        <div class="su-button-center"><a href="#" class="su-button su-button-style-default btn-mca-complete btn-mca-start myBtn pum-trigger" style="color: rgb(255, 255, 255); background-color: rgb(222, 43, 32); border-color: rgb(178, 34, 26); border-radius: 5px; cursor: pointer;" target="_self"><span style="color:#FFFFFF;padding:0px 34px;font-size:25px;line-height:50px;border-color:#e86b63;border-radius:5px;-moz-border-radius:5px;-webkit-border-radius:5px;text-shadow:none;-moz-text-shadow:none;-webkit-text-shadow:none"> GET MCA TOTAL SECURITY</span></a></div>
                        <p>&nbsp;</p>
                        <p class="lp-prepaid"><strong>NO PREPAID DEBIT CARDS</strong> THAT YOU BUY &amp; LOAD FROM 7 ELEVEN, WALMART OR ANYTHING LIKE THAT. DO NOT PAY BY EBT TRANSFER BANK DRAFT. THAT WILL TAKE TOO LONG! If you dont have a bank account, GO GET ONE.</p>
                        <hr>
                        <p>&nbsp;</p>
                        <h2 class="stolen-vehicle"><strong>Stolen Vehicle Reward</strong></h2>
                        <p><strong>MCA will pay a $5,000.00 reward</strong> to the law enforcement agency or individual responsible for providing the accurate information leading to the arrest and conviction of the person(s) responsible for the crime. <em>The reward is not payable to you, your family, or other members on your MCA membership account.</em></p>
                        <p>&nbsp;</p>
                        <hr>
                        <p>&nbsp;</p>
                        <h2 class="cc-protection"><strong>Credit Card Protection</strong></h2>
                        <p>Identity theft has become more prevalent. <strong>If you ever become a victim, MCA will cover financial losses of up to $1000.00</strong> plus work with you to help you recover from the act.</p>
                        <p>&nbsp;</p>
                        <hr>
                        <p>&nbsp;</p>
                        <h2 class="hotel-car"><strong>Hotel | Rental Car | RX | Vision | Dental</strong></h2>
                        <p><strong>Our discount card is an easy way to help you and your family</strong> receive discounts on all of your Prescription, Vision, Dental needs, Hotel, and Rental Car needs. <em>You received a unique membership card allowing you to receive up to:</em></p>
                        <ul>
                            <li>65% discount on prescriptions at the most popular pharmacies</li>
                            <li>50% off dental procedures</li>
                            <li>50% off eye wear and eye exams</li>
                            <li>50% off rental cars at all of the most popular rental car agencies</li>
                            <li>15% off major hotel and motel chains</li>
                        </ul>
                        <p>&nbsp;</p>
                        <p class="lp-prepaid"><strong>DO NOT SIGN UP OR GO FURTHER IF YOU DO NOT HAVE A BANK CARD OR CREDIT CARD.</strong> THIS IS FOR SERIOUS PEOPLE, NOT TEMPORARY PRE PAID PEOPLE. IF YOU HAVE PREPAID, THE SIGNUP OR BUSINESS WONT WORK FOR YOU!</p>
                        <div class="su-button-center"><a href="#" class="su-button su-button-style-default btn-mca-complete btn-mca-start myBtn pum-trigger" style="color: rgb(255, 255, 255); background-color: rgb(222, 43, 32); border-color: rgb(178, 34, 26); border-radius: 5px; cursor: pointer;" target="_self"><span style="color:#FFFFFF;padding:0px 34px;font-size:25px;line-height:50px;border-color:#e86b63;border-radius:5px;-moz-border-radius:5px;-webkit-border-radius:5px;text-shadow:none;-moz-text-shadow:none;-webkit-text-shadow:none"> GET MCA TOTAL SECURITY</span></a></div>
                        <p>&nbsp;</p>
                        <p class="lp-prepaid"><strong>NO PREPAID DEBIT CARDS</strong> THAT YOU BUY &amp; LOAD FROM 7 ELEVEN, WALMART OR ANYTHING LIKE THAT. DO NOT PAY BY EBT TRANSFER BANK DRAFT. THAT WILL TAKE TOO LONG! If you dont have a bank account, GO GET ONE.</p>
                        <p>&nbsp;</p>
                        <hr>
                        <p>&nbsp;</p>
                        <h2 class="emergency-benefits"><strong>Emergency Reimbursement Benefits</strong></h2>
                        <p><strong>Members receive up to $500.00 in emergency cash</strong> for Emergency Room or Trauma Center treatment. This benefit will only be covered due to injury in a covered accident. Includes up to $100.00 in cost for each of the following:</p>
                        <ul>
                            <li>Cast or Splints</li>
                            <li>Ambulance Service</li>
                            <li>Anesthetics</li>
                            <li>X-Rays</li>
                            <li>ER Facility</li>
                        </ul>
                        <p>&nbsp;</p>
                        <hr>
                        <h2 class="daily-hospital"><strong><br>
                                Daily Hospital Benefit</strong></h2>
                        <p><strong>Receive up to $54,750.00 in hospital cash benefits.</strong> That means as a member, you will receive $150.00 per day beginning the first day you are hospitalized as a result of a covered accident. <strong>MCA will cover your hospital stay up to 365 consecutive days</strong>. Once discharged, you have up to 90 days to file a claim.</p>
                        <p>&nbsp;</p>
                        <hr>
                        <p>&nbsp;</p>
                        <h2 class="accidental-death"><strong>Accidental Death Benefit</strong></h2>
                        <p>As a member, you may enroll, free of charge, in&nbsp;our <strong>$10,000 Accidental Death Coverage</strong>. You may upgrade to our Total Security package to receive <em>additional coverage up to $50,000.</em></p>
                        <p>&nbsp;</p>
                        <p class="lp-prepaid"><strong>DO NOT SIGN UP OR GO FURTHER IF YOU DO NOT HAVE A BANK CARD OR CREDIT CARD.</strong> THIS IS FOR SERIOUS PEOPLE, NOT TEMPORARY PRE PAID PEOPLE. IF YOU HAVE PREPAID, THE SIGNUP OR BUSINESS WONT WORK FOR YOU!</p>
                        <div class="su-button-center"><a href="#" class="su-button su-button-style-default btn-mca-complete btn-mca-start myBtn pum-trigger" style="color: rgb(255, 255, 255); background-color: rgb(222, 43, 32); border-color: rgb(178, 34, 26); border-radius: 5px; cursor: pointer;" target="_self"><span style="color:#FFFFFF;padding:0px 34px;font-size:25px;line-height:50px;border-color:#e86b63;border-radius:5px;-moz-border-radius:5px;-webkit-border-radius:5px;text-shadow:none;-moz-text-shadow:none;-webkit-text-shadow:none"> GET MCA TOTAL SECURITY</span></a></div>
                        <p>&nbsp;</p>
                        <p class="lp-prepaid"><strong>NO PREPAID DEBIT CARDS</strong> THAT YOU BUY &amp; LOAD FROM 7 ELEVEN, WALMART OR ANYTHING LIKE THAT. DO NOT PAY BY EBT TRANSFER BANK DRAFT. THAT WILL TAKE TOO LONG! If you dont have a bank account, GO GET ONE.</p>

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

                <a class="buy-mca-button" href="https://www.tvcmatrix.com/secure/cart/addItem.aspx?qty=1&amp;itID=9135&amp;PromoID=83&amp;uid=<?php if (isset($_GET['ref'])) echo $_GET['ref']; ?>" target="_blank"><img src="http://mcaprotools.s3-us-west-2.amazonaws.com/wp-content/uploads/2015/03/buy_now_button1.png" alt="buy_now_button" width="592" height="123" /></a>

                GET A SPECIAL WELCOME CALL WHEN YOU ORDER TODAY!

            </div>
        </div>

        <div class="modal-content-active-membership">
            <span class="close">Close</span>
            <h3>Do You Have An Active Motor Club of America Account?</h3>
            <div class="buttons-row">
                <div class="left-col">
                    <a href="https://www.tvcmatrix.com/secure/cart/addItem.aspx?qty=1&itID=9135&PromoID=83&uid=<?php if (isset($_GET['ref'])) echo $_GET['ref']; ?>" class="btn">No…I DO NOT!</a>
                    <p>
                        If you do not have an "Active" Motor Club of America account, select this option.
                    </p>
                </div>
                <div class="right-col">
                    <a href="/mcaprotools-invite" class="btn yesido">YES... I DO!</a>
                    <p>
                        Selecting this options means you already have an "Active" Motor Club of America account.
                    </p>
                </div>
            </div>
        </div>

    </div>
<?php get_footer(); ?>
