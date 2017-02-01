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
		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<?php echo avada_render_rich_snippets_for_pages(); ?>
			<?php if( ! post_password_required($post->ID) ): // 1 ?>
			<?php global $smof_data; if(!$smof_data['featured_images_pages'] ): // 2 ?>
			<?php
			if( avada_number_of_featured_images() > 0 || get_post_meta( $post->ID, 'pyre_video', true ) ): // 3
			?>
			<div class="fusion-flexslider flexslider post-slideshow">
				<ul class="slides">
					<?php if(get_post_meta($post->ID, 'pyre_video', true)): ?>
					<li>
						<div class="full-video">
							<?php echo get_post_meta($post->ID, 'pyre_video', true); ?>
						</div>
					</li>
					<?php endif; ?>
					<?php if( has_post_thumbnail() && get_post_meta( $post->ID, 'pyre_show_first_featured_image', true ) != 'yes' ): ?>
					<?php $attachment_image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full'); ?>
					<?php $full_image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full'); ?>
					<?php $attachment_data = wp_get_attachment_metadata(get_post_thumbnail_id()); ?>
					<li>
						<a href="<?php echo $full_image[0]; ?>" rel="prettyPhoto[gallery<?php the_ID(); ?>]" title="<?php echo get_post_field('post_excerpt', get_post_thumbnail_id()); ?>"><img src="<?php echo $attachment_image[0]; ?>" alt="<?php echo get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', true); ?>" /></a>
					</li>
					<?php endif; ?>
					<?php
					$i = 2;
					while($i <= $smof_data['posts_slideshow_number']):
					$attachment_new_id = kd_mfi_get_featured_image_id('featured-image-'.$i, 'page');
					if($attachment_new_id):
					?>
					<?php $attachment_image = wp_get_attachment_image_src($attachment_new_id, 'full'); ?>
					<?php $full_image = wp_get_attachment_image_src($attachment_new_id, 'full'); ?>
					<?php $attachment_data = wp_get_attachment_metadata($attachment_new_id); ?>
					<li>
						<a href="<?php echo $full_image[0]; ?>" rel="prettyPhoto[gallery<?php the_ID(); ?>]" title="<?php echo get_post_field('post_excerpt', $attachment_new_id); ?>"><img src="<?php echo $attachment_image[0]; ?>" alt="<?php echo get_post_meta($attachment_new_id, '_wp_attachment_image_alt', true); ?>" /></a>
					</li>
					<?php endif; $i++; endwhile; ?>
				</ul>
			</div>
			<?php endif; // 3 ?>
			<?php endif; // 2 ?>
			<?php endif; // 1 password check ?>
			<div class="post-content">
                <div id="landing-box"><center>
                        <h1 style="font-size: 65px !important; line-height: 100%;">Motor Club Of America Has You Protected!</h1>

                        <div class="videoWrapper">
                            <?php echo do_shortcode('[protool_mca_user meta_key="mcabenefits" referrer_data="yes" referrer_key="ref" display_type="single_line"]'); ?>

                        </div>

                    </center><strong>We all know how life happens. </strong>Cars run out of gas, batteries die, and even the safest of drivers get into both major and minor car accidents. <em>When the unexpected happens, our members can be rest assured knowing that <strong>MCA has them covered</strong>.</em>
                    <blockquote><span style="line-height: 1.5;">Regardless of what the case is, rely on MCA to deliver peace of mind when you need it the most. </span></blockquote>


                    <br/>
                    <h1>The MCA Coverage Plans</h1>
                    The membership coverage plans from Motor Club of America provide the service you deserve and the peace of mind you most desperately want when the unexpected occurs at home, on the road or at the job. <strong>Your coverage is not only limited</strong> to roadside assistance, but<strong> you also have the added assurance</strong> of <em>personal accidental coverage, emergency room benefits, discounts on prescription drugs, dental care and vision care.</em> Help is literally a phone call away.

                    <strong>MCA provides top notch customer service</strong> and a variety of packages to best suit your needs and budget. When you join MCA, you are in good company…
                    <blockquote>We have over 7,000,000 motorists that rely on MCA’s 86 years of experience to protect them.</blockquote>
                    When you purchase a Security Plan from MCA, <strong><em>your coverage begins 24 hours after your payment has been processed</em></strong>. As a member, you're never locked into a contract. Members are welcome to cancel their accounts at anytime, without any hidden or cancellation fees. Full refunds are granted within 72 hours, and half refunds are granted within 30 days of activating your membership.


                    <br/>
                    <h1 style="text-align: center;">COVERAGE FEATURES</h1>
                    &nbsp;
                    <h2><strong>UNLIMITED Security Roadside Assistance</strong></h2>
                    As a member of our Security plan, you will receive <strong>unlimited roadside assistance</strong>, unlike our competitors which will only provide you 2-4 service calls per year. <span style="text-decoration: underline;"><em>Unlimited roadside assistance means 1 service call per day throughout the entire year</em></span>.

                    If we're unable to get your 4 wheel passenger vehicle back on the road safely, it will be towed to the nearest service facility. You will also receive <strong>unlimited lockout service, unlimited fuel delivery, unlimited tire changing, and unlimited battery boosting.</strong>

                    <strong> </strong>

                    <hr />

                    &nbsp;
                    <h2><strong>Travel Assistance Reimbursement</strong></h2>
                    When a members vehicle is disabled in an auto accident,<strong> Motor Club of America will reimburse up to $500.00</strong> for a rental car, lodging, or meals if the incident happened more than 50 miles away from the registered home address on your account.

                    To be reimbursed, simply give us a call to receive your claim form, and submit the required information to us within 90 days.

                    &nbsp;

                    <hr />

                    &nbsp;
                    <h2><strong>Planning and Travel Reservations</strong></h2>
                    MCA offers free and easy to read, step by step computerized mapping services free of charge to our members. Simply fill out a Travel information card or give us a call. This includes places of interest, resort, motel and hotel information found along your route. <strong>You also have a one-stop reservation service for airline travel, car rental, and hotel discounts.</strong>

                    &nbsp;
                    <p class="lp-prepaid"><strong>DO NOT SIGN UP OR GO FURTHER IF YOU DO NOT HAVE A BANK CARD OR CREDIT CARD.</strong> THIS IS FOR SERIOUS PEOPLE, NOT TEMPORARY PRE PAID PEOPLE. IF YOU HAVE PREPAID, THE SIGNUP OR BUSINESS WONT WORK FOR YOU!</p>
                    [protool_button url="#" background="#de2b20" size="12" center="yes" radius="5" class="btn-mca-complete btn-mca-start popmake-buy-mca"]GET MCA TOTAL SECURITY[/protool_button]

                    &nbsp;
                    <p class="lp-prepaid"><strong>NO PREPAID DEBIT CARDS</strong> THAT YOU BUY &amp; LOAD FROM 7 ELEVEN, WALMART OR ANYTHING LIKE THAT. DO NOT PAY BY EBT TRANSFER BANK DRAFT. THAT WILL TAKE TOO LONG! If you dont have a bank account, GO GET ONE.</p>
                    &nbsp;

                    <hr />

                    &nbsp;
                    <h2><strong>Arrest Bonds</strong></h2>
                    <strong>Your Motor Club Membership card may be used in lieu of cash bail up to $500.00</strong> when involved in a traffic violation. Although this certificate will be accepted in many states, in some states arrest bond certificates are not acceptable.

                    <em>In Maryland the certificate is acceptable for $1,000.00</em>, and in other states they are accepted for lesser amounts than $500.00. Simply give us a call at the toll free number located on the back of your membership card to receive the assistance you need.

                    &nbsp;

                    <hr />

                    &nbsp;
                    <h2><strong>Bail Bonds</strong></h2>
                    <span style="line-height: 1.5;"><strong>MCA will arrange up to a $25,000.00 bond to release you</strong> from incarceration if you're driving a vehicle and charged with a moving traffic law violation such as vehicular manslaughter or auto related negligent homicide.</span>

                    <span style="line-height: 1.5;"> Simply call the toll-free number on the back of your membership card to receive assistance. <em>Our legal department will provide the best assistance possible to <strong>release you from incarceration</strong>.</em></span>

                    &nbsp;

                    <hr />

                    &nbsp;
                    <h2><strong>Attorney Fees</strong></h2>
                    <strong>Motor Club of America will pay up to $2,000.00</strong> for your attorney to defend you against police charges resulting from driving your covered auto:
                    <ul>
                        <li>Up to $200.00 for covered moving violations (non-criminal)</li>
                        <li>Up to $500.00 covered auto related personal injury matters</li>
                        <li>Up to $500.00 covered vehicle damage issues</li>
                        <li>Up to $2,000.00 covered negligent homicide / vehicular manslaughter</li>
                    </ul>
                    &nbsp;
                    <p class="lp-prepaid"><strong>DO NOT SIGN UP OR GO FURTHER IF YOU DO NOT HAVE A BANK CARD OR CREDIT CARD.</strong> THIS IS FOR SERIOUS PEOPLE, NOT TEMPORARY PRE PAID PEOPLE. IF YOU HAVE PREPAID, THE SIGNUP OR BUSINESS WONT WORK FOR YOU!</p>
                    [protool_button url="#" background="#de2b20" size="12" center="yes" radius="5" class="btn-mca-complete btn-mca-start popmake-buy-mca"]GET MCA TOTAL SECURITY[/protool_button]

                    &nbsp;
                    <p class="lp-prepaid"><strong>NO PREPAID DEBIT CARDS</strong> THAT YOU BUY &amp; LOAD FROM 7 ELEVEN, WALMART OR ANYTHING LIKE THAT. DO NOT PAY BY EBT TRANSFER BANK DRAFT. THAT WILL TAKE TOO LONG! If you dont have a bank account, GO GET ONE.</p>


                    <hr />

                    &nbsp;
                    <h2><strong>Stolen Vehicle Reward</strong></h2>
                    <strong>MCA will pay a $5,000.00 reward</strong> to the law enforcement agency or individual responsible for providing the accurate information leading to the arrest and conviction of the person(s) responsible for the crime. <em>The reward is not payable to you, your family, or other members on your MCA membership account.</em>

                    &nbsp;

                    <hr />

                    &nbsp;
                    <h2><strong>Credit Card Protection</strong></h2>
                    Identity theft has become more prevalent. <strong>If you ever become a victim, MCA will cover financial losses of up to $1000.00</strong> plus work with you to help you recover from the act.

                    &nbsp;

                    <hr />

                    &nbsp;
                    <h2><strong>Hotel | Rental Car | RX | Vision | Dental</strong></h2>
                    <strong>Our discount card is an easy way to help you and your family</strong> receive discounts on all of your Prescription, Vision, Dental needs, Hotel, and Rental Car needs. <em>You received a unique membership card allowing you to receive up to:</em>
                    <ul>
                        <li>65% discount on prescriptions at the most popular pharmacies</li>
                        <li>50% off dental procedures</li>
                        <li>50% off eye wear and eye exams</li>
                        <li>50% off rental cars at all of the most popular rental car agencies</li>
                        <li>15% off major hotel and motel chains</li>
                    </ul>
                    &nbsp;
                    <p class="lp-prepaid"><strong>DO NOT SIGN UP OR GO FURTHER IF YOU DO NOT HAVE A BANK CARD OR CREDIT CARD.</strong> THIS IS FOR SERIOUS PEOPLE, NOT TEMPORARY PRE PAID PEOPLE. IF YOU HAVE PREPAID, THE SIGNUP OR BUSINESS WONT WORK FOR YOU!</p>
                    [protool_button url="#" background="#de2b20" size="12" center="yes" radius="5" class="btn-mca-complete btn-mca-start popmake-buy-mca"]GET MCA TOTAL SECURITY[/protool_button]

                    &nbsp;
                    <p class="lp-prepaid"><strong>NO PREPAID DEBIT CARDS</strong> THAT YOU BUY &amp; LOAD FROM 7 ELEVEN, WALMART OR ANYTHING LIKE THAT. DO NOT PAY BY EBT TRANSFER BANK DRAFT. THAT WILL TAKE TOO LONG! If you dont have a bank account, GO GET ONE.</p>
                    &nbsp;

                    <hr />

                    &nbsp;
                    <h2><strong>Emergency Reimbursement Benefits</strong></h2>
                    <strong>Members receive up to $500.00 in emergency cash</strong> for Emergency Room or Trauma Center treatment. This benefit will only be covered due to injury in a covered accident. Includes up to $100.00 in cost for each of the following:
                    <ul>
                        <li>Cast or Splints</li>
                        <li>Ambulance Service</li>
                        <li>Anesthetics</li>
                        <li>X-Rays</li>
                        <li>ER Facility</li>
                    </ul>
                    &nbsp;

                    <hr />

                    <h2><strong>
                            Daily Hospital Benefit</strong></h2>
                    <strong>Receive up to $54,750.00 in hospital cash benefits.</strong> That means as a member, you will receive $150.00 per day beginning the first day you are hospitalized as a result of a covered accident. <strong>MCA will cover your hospital stay up to 365 consecutive days</strong>. Once discharged, you have up to 90 days to file a claim.

                    &nbsp;

                    <hr />

                    &nbsp;
                    <h2><strong>Accidental Death Benefit</strong></h2>
                    As a member, you may enroll, free of charge, in our <strong>$10,000 Accidental Death Coverage</strong>. You may upgrade to our Total Security package to receive <em>additional coverage up to $50,000.</em>

                    &nbsp;
                    <p class="lp-prepaid"><strong>DO NOT SIGN UP OR GO FURTHER IF YOU DO NOT HAVE A BANK CARD OR CREDIT CARD.</strong> THIS IS FOR SERIOUS PEOPLE, NOT TEMPORARY PRE PAID PEOPLE. IF YOU HAVE PREPAID, THE SIGNUP OR BUSINESS WONT WORK FOR YOU!</p>
                    [protool_button url="#" background="#de2b20" size="12" center="yes" radius="5" class="btn-mca-complete btn-mca-start popmake-buy-mca"]GET MCA TOTAL SECURITY[/protool_button]

                    &nbsp;
                    <p class="lp-prepaid"><strong>NO PREPAID DEBIT CARDS</strong> THAT YOU BUY &amp; LOAD FROM 7 ELEVEN, WALMART OR ANYTHING LIKE THAT. DO NOT PAY BY EBT TRANSFER BANK DRAFT. THAT WILL TAKE TOO LONG! If you dont have a bank account, GO GET ONE.</p>
                    [affiliate_conversion_script amount="$0.00" description="The user will decide if they want to purchase MCA here." status="pending"]

                </div>
				<?php // the_content(); ?>
				<?php avada_link_pages(); ?>
			</div>
			<?php if( ! post_password_required($post->ID) ): ?>
			<?php if(class_exists('Woocommerce')): ?>
			<?php 
			$woo_thanks_page_id = get_option('woocommerce_thanks_page_id');
			if( ! get_option('woocommerce_thanks_page_id') ) {
				$is_woo_thanks_page = false;
			} else {
				$is_woo_thanks_page = is_page( get_option( 'woocommerce_thanks_page_id' ) );
			}
			?>
			<?php if($smof_data['comments_pages'] && !is_cart() && !is_checkout() && !is_account_page() && ! $is_woo_thanks_page ): ?>
				<?php
				wp_reset_query();
				comments_template();
				?>
			<?php endif; ?>
			<?php else: ?>
			<?php if($smof_data['comments_pages']): ?>
				<?php
				wp_reset_query();
				comments_template();
				?>
			<?php endif; ?>
			<?php endif; ?>
			<?php endif; // password check ?>
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