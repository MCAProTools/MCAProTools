<?php
/* Template Name: marketing-links */
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

		<?php if(have_posts()): the_post(); ?>

<style type="text/css">

.preview-box {
    max-width: 250px;
    float: left;
    margin-left: 10px;
    margin-right: 10px;
    margin-top: 20px;
}

a.preview-box-button {
    width: 100%;
    max-width: 300px;
    text-align: center;
    background-color: crimson;
    padding: 15px;
    min-width: 190px !important;
    color: #fff;
    padding-left: 25px;
    font-size: 18px;
    float: left;
    margin-top: 10px;
    margin-left: 1px;
    padding-right: 25px;
}

h4.popup-title {
    margin-bottom: 0px;
    font-size: 29px;
    margin-top: 0px;
}

input.marketing-url {
    padding: 20px;
    color: #000;
    font-size: 16px;
    width: 88%;
    margin-bottom: 20px;
}

.second-marketing-url-input {
    margin-top: 10px;
}

a.mhpreview {
    background-color: crimson;
    color: #fff;
    padding: 10px;
    padding-left: 20px;
    float: right;
    padding-right: 20px;
}


</style>


<div class="post-content">



				<?php //the_content(); ?>
				<?php //avada_link_pages(); ?>

				<div class="container">

				<center>
				<p><img src="https://mcaprotools.com/wp-content/uploads/2015/02/stop_and_watch.png" alt="stop_and_watch" width="75%" height="62" /></p>

				<p><iframe src="https://player.vimeo.com/video/243497488" width="100%" height="400" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe></p>


				<h2 style="font-size: 39px; font-weight: bold; margin-top: 25px;">MCA <span style="color: crimson; background-color: yellow;">"Highest Converting"</span> Sales Funnels</h2>

				</center>


				<hr style="clear: both; padding-bottom: 5px; border: 0px; padding-top: 5px;">

				<h1>Capture Pages</h1>

				<!-- Capture Page 1 Preview Box -->
				<div class="preview-box">
					<img src="https://mcaprotools.com/wp-content/themes/mca-child/img/mlss/cp1-ss.png" alt="" width="300" />
					<a class="preview-box-button" rel="lightbox" data-gall="gall-frame" data-lightbox-type="inline" href="#capture-page-1">Get Page Link</a>
				</div>
				<!-- Capture Page 1 Preview Box End -->

				<!-- Capture Page 1 Popup -->
				<div id="capture-page-1" style="display:none;">
				<div class="first-link">
					<h4 class="popup-title">Capture Page 1</h4>
					<p>This link is for the lead capture page shown below. This will redirect to the video sale landing page after someone enters their email address:</p>

				<div class="marketing-sharing-section">
					<h3 style="font-size: 18px;">SHARE THIS URL WITH YOUR CUSTOMERS</h3>
					    <div class="marketing-section">
					      <div class="marketing-url-input">
									<input class="marketing-url" type="text" value="https://mcaprotools.com/cp1/?ref=<?php echo do_shortcode( '[affiliate_username]' ); ?>" />

									<a class="mhpreview" href="https://mcaprotools.com/cp1/?ref={affiliate_username}" target="_blank" rel="noopener noreferrer">Preview</a>
								</div>
					    </div>
				</div>
				</div>

				<div class="second-link">
				This is the landing page the user is redirected to after they enter thier email address:
					  	<div class="marketing-sharing-section">
					         <div class="marketing-section">
					             <div class="second-marketing-url-input"><input class="marketing-url" type="text" value="https://mcaprotools.com/lp1/?ref={affiliate_username}" />

												 <a class="mhpreview" href="https://mcaprotools.com/lp1/?ref={affiliate_username}" target="_blank" rel="noopener noreferrer">Preview</a>
											 </div>
					          </div>
					     </div>
				</div>
			</div>

			<!-- Capture Page 1 Popup End -->




			<!-- Capture Page 2 Preview Box -->
			<div class="preview-box">
				<img src="https://mcaprotools.com/wp-content/themes/mca-child/img/mlss/500-ss.jpg" alt="" width="300" />
				<a class="preview-box-button" rel="lightbox" data-gall="gall-frame" data-lightbox-type="inline" href="#capture-page-2">Get Page Link</a>
			</div>
			<!-- Capture Page 2 Preview Box End -->


			<!-- Capture Page 2 Popup -->
			<div id="capture-page-2" style="display:none;">
			<div class="first-link">
				<h4 class="popup-title">Capture Page 2</h4>
				<p>This link is for the lead capture page shown below. This will redirect to the video sale landing page after someone enters their email address:</p>

			<div class="marketing-sharing-section">
				<h3 style="font-size: 18px;">SHARE THIS URL WITH YOUR CUSTOMERS</h3>
						<div class="marketing-section">
							<div class="marketing-url-input">
								<input class="marketing-url" type="text" value="https://mcaprotools.com/500s/?ref={affiliate_username}" />

								<a class="mhpreview" href="https://mcaprotools.com/500s/?ref={affiliate_username}" target="_blank" rel="noopener noreferrer">Preview</a>
							</div>
						</div>
			</div>
			</div>

			<div class="second-link">
			This is the landing page the user is redirected to after they enter thier email address:
						<div class="marketing-sharing-section">
								 <div class="marketing-section">
										 <div class="second-marketing-url-input"><input class="marketing-url" type="text" value="https://mcaprotools.com/daystart/?ref={affiliate_username}" />

											 <a class="mhpreview" href="https://mcaprotools.com/daystart/?ref={affiliate_username}" target="_blank" rel="noopener noreferrer">Preview</a>
										 </div>
									</div>
						 </div>
			</div>
			</div>

			<!-- Capture Page 2 Popup End -->




			<!-- Capture Page 3 Preview Box -->
			<div class="preview-box" style="display: none;">
				<img src="" alt="" width="300" />
				<a class="preview-box-button" rel="lightbox" data-gall="gall-frame" data-lightbox-type="inline" href="#capture-page-3">Get Page Link</a>
			</div>
			<!-- Capture Page 3 Preview Box End -->



			<!-- Capture Page 3 Popup -->
			<div id="capture-page-2" style="display:none;">
			<div class="first-link">
				<h4 class="popup-title">Capture Page 2</h4>
				<p>This link is for the lead capture page shown below. This will redirect to the video sale landing page after someone enters their email address:</p>

			<div class="marketing-sharing-section">
				<h3 style="font-size: 18px;">SHARE THIS URL WITH YOUR CUSTOMERS</h3>
						<div class="marketing-section">
							<div class="marketing-url-input">
								<input class="marketing-url" type="text" value="https://mcaprotools.com/cp3/?ref={affiliate_username}" />

								<a class="mhpreview" href="https://mcaprotools.com/cp3/?ref={affiliate_username}" target="_blank" rel="noopener noreferrer">Preview</a>
							</div>
						</div>
			</div>
			</div>

			<div class="second-link">
			This is the landing page the user is redirected to after they enter thier email address:
						<div class="marketing-sharing-section">
								 <div class="marketing-section">
										 <div class="second-marketing-url-input"><input class="marketing-url" type="text" value="https://mcaprotools.com/lp1/?ref={affiliate_username}" />

											 <a class="mhpreview" href="https://mcaprotools.com/lp1/?ref={affiliate_username}" target="_blank" rel="noopener noreferrer">Preview</a>
										 </div>
									</div>
						 </div>
			</div>
		</div>

		<!-- Capture Page 3 Popup End -->


		<!-- Capture Page 3 Popup -->
		<div id="capture-page-3" style="display:none;">
		<div class="first-link">
			<h4 class="popup-title">Capture Page 3</h4>
			<p>This link is for the lead capture page shown below. This will redirect to the video sale landing page after someone enters their email address:</p>

		<div class="marketing-sharing-section">
			<h3 style="font-size: 18px;">SHARE THIS URL WITH YOUR CUSTOMERS</h3>
					<div class="marketing-section">
						<div class="marketing-url-input">
							<input class="marketing-url" type="text" value="https://mcaprotools.com/cp1/?ref={affiliate_username}" />

							<a class="mhpreview" href="https://mcaprotools.com/cp1/?ref={affiliate_username}" target="_blank" rel="noopener noreferrer">Preview</a>
						</div>
					</div>
		</div>
		</div>

		<div class="second-link">
		This is the landing page the user is redirected to after they enter thier email address:
					<div class="marketing-sharing-section">
							 <div class="marketing-section">
									 <div class="second-marketing-url-input"><input class="marketing-url" type="text" value="https://mcaprotools.com/lp1/?ref={affiliate_username}" />

										 <a class="mhpreview" href="https://mcaprotools.com/lp1/?ref={affiliate_username}" target="_blank" rel="noopener noreferrer">Preview</a>
									 </div>
								</div>
					 </div>
		</div>
	</div>

	<!-- Capture Page 3 Popup End -->






	<hr style="clear: both; padding-bottom: 25px; border: 0px; padding-top: 25px;">


	<h1>Landing Pages</h1>

	<!-- Landing Page 1 Preview Box -->
	<div class="preview-box">
		<img src="https://mcaprotools.com/wp-content/themes/mca-child/img/mlss/landing-ss.png" alt="" width="300" />
		<a class="preview-box-button" rel="lightbox" data-gall="gall-frame" data-lightbox-type="inline" href="#landing-page-1">Get Page Link</a>
	</div>
	<!-- Landing Page 1 Preview Box End -->

	<!-- Landing Page 1 Popup -->
	<div id="landing-page-1" style="display:none;">
	<div class="first-link">
		<h4 class="popup-title">Landing Page 1</h4>
		<p>This link is for the lead capture page shown below. This will redirect to the video sale landing page after someone enters their email address:</p>

	<div class="marketing-sharing-section">



		<div class="marketing-section">
			<div class="marketing-url-input">
				<?php echo do_shortcode( "[protool_mca_user meta_key='lp1video' referrer_data='no' referrer_key='' editable='yes' class='' display_type='no' placeholder='To Add Your Own Video To This Page, Enter Embed Code Here...']" ); ?>
			</div>
		</div>



				<div class="marketing-section">
					<h3 style="font-size: 18px;">SHARE THIS URL WITH YOUR CUSTOMERS</h3>
					<div class="marketing-url-input">
						<input class="marketing-url" type="text" value="https://mcaprotools.com/lp1/?ref={affiliate_username}" />

						<a class="mhpreview" href="https://mcaprotools.com/lp1/?ref={affiliate_username}" target="_blank" rel="noopener noreferrer">Preview</a>
					</div>
				</div>
	</div>
	</div>
	</div>

	<!-- Landing Page 1 Popup End -->




	<!-- Landing Page 2 Preview Box -->
	<div class="preview-box">
	<img src="https://mcaprotools.com/wp-content/themes/mca-child/img/mlss/lp2-ss.png" alt="" width="300" />
	<a class="preview-box-button" rel="lightbox" data-gall="gall-frame" data-lightbox-type="inline" href="#landing-page-2">Get Page Link</a>
	</div>
	<!-- Landing Page 2 Preview Box End -->


	<!-- Landing Page 2 Popup -->
	<div id="landing-page-2" style="display:none;">
	<div class="first-link">
	<h4 class="popup-title">Landing Page 2</h4>
	<p>This link is for the lead Landing Page shown below. This will redirect to the video sale landing page after someone enters their email address:</p>

	<div class="marketing-sharing-section">


	<div class="marketing-section">
		<div class="marketing-url-input">
			<?php echo do_shortcode( '[protool_mca_user meta_key="daystartvideo" referrer_data="no" referrer_key="" editable="yes" class="" display_type="no" placeholder="To Add Your Own Video To This Page, Enter Embed Code Here..."]' ); ?>
		</div>
	</div>



			<div class="marketing-section">
				<h3 style="font-size: 18px;">SHARE THIS URL WITH YOUR CUSTOMERS</h3>

				<div class="marketing-url-input">
					<input class="marketing-url" type="text" value="https://mcaprotools.com/daystart/?ref={affiliate_username}" />

					<a class="mhpreview" href="https://mcaprotools.com/daystart/?ref={affiliate_username}" target="_blank" rel="noopener noreferrer">Preview</a>
				</div>
			</div>
	</div>
	</div>
	</div>

	<!-- Landing Page 2 Popup End -->




	<!-- landing Page 3 Preview Box -->
	<div class="preview-box" style="display: none;">
	<img src="https://mcaprotools.com/wp-content/themes/mca-child/img/mlss/cp1-ss.png" alt="" width="300" />
	<a class="preview-box-button" rel="lightbox" data-gall="gall-frame" data-lightbox-type="inline" href="#landing-page-3">Get Page Link</a>
	</div>
	<!-- Landing Page 3 Preview Box End -->



	<!-- Landing Page 3 Popup -->
	<div id="landing-page-3" style="display:none;">
	<div class="first-link">
	<h4 class="popup-title">Landing Page 2</h4>
	<p>This link is for the lead Landing Page shown below. This will redirect to the video sale landing page after someone enters their email address:</p>

	<div class="marketing-sharing-section">
	<h3 style="font-size: 18px;">SHARE THIS URL WITH YOUR CUSTOMERS</h3>
			<div class="marketing-section">
				<div class="marketing-url-input">
					<input class="marketing-url" type="text" value="https://mcaprotools.com/cp1/?ref={affiliate_username}" />

					<a class="mhpreview" href="https://mcaprotools.com/cp1/?ref={affiliate_username}" target="_blank" rel="noopener noreferrer">Preview</a>
				</div>
			</div>
	</div>
	</div>
	</div>

	<!-- Landing Page 3 Popup End -->








	<hr style="clear: both; padding-bottom: 25px; border: 0px; padding-top: 25px;">








	<h1>Follow Up Pages</h1>

	<!-- Follow Up 1 Preview Box -->
	<div class="preview-box">
		<img src="https://mcaprotools.com/wp-content/themes/mca-child/img/mlss/followup-ss.png" alt="" width="300" />
		<a class="preview-box-button" rel="lightbox" data-gall="gall-frame" data-lightbox-type="inline" href="#followup-page-1">Get Page Link</a>
	</div>
	<!-- Follow Up 1 Preview Box End -->

	<!-- Follow Up 1 Popup -->
	<div id="followup-page-1" style="display:none;">
	<div class="first-link">
		<h4 class="popup-title">Follow Up 1</h4>
		<p>This link is for the lead Landing Page shown below. This will redirect to the video sale Follow Up after someone enters their email address:</p>

	<div class="marketing-sharing-section">
		<h3 style="font-size: 18px;">SHARE THIS URL WITH YOUR CUSTOMERS</h3>
				<div class="marketing-section">
					<div class="marketing-url-input">
						<input class="marketing-url" type="text" value="https://mcaprotools.com/followup/?ref={affiliate_username}" />

						<a class="mhpreview" href="https://mcaprotools.com/followup/?ref={affiliate_username}" target="_blank" rel="noopener noreferrer">Preview</a>
					</div>
				</div>
	</div>
	</div>
	</div>

	<!-- Follow Up 1 Popup End -->




	<!-- Follow Up 2 Preview Box -->
	<div class="preview-box">
	<img src="https://mcaprotools.com/wp-content/themes/mca-child/img/mlss/fp2-ss.png" alt="" width="300" />
	<a class="preview-box-button" rel="lightbox" data-gall="gall-frame" data-lightbox-type="inline" href="#followup-page-2">Get Page Link</a>
	</div>
	<!-- Follow Up 2 Preview Box End -->


	<!-- Follow Up 2 Popup -->
	<div id="followup-page-2" style="display:none;">
	<div class="first-link">
	<h4 class="popup-title">Follow Up 2</h4>
	<p>This link is for the lead Follow Up shown below. This will redirect to the video sale Follow Up after someone enters their email address:</p>

	<div class="marketing-sharing-section">
	<h3 style="font-size: 18px;">SHARE THIS URL WITH YOUR CUSTOMERS</h3>
			<div class="marketing-section">
				<div class="marketing-url-input">
					<input class="marketing-url" type="text" value="https://mcaprotools.com/fp2/?ref={affiliate_username}" />

					<a class="mhpreview" href="https://mcaprotools.com/fp2/?ref={affiliate_username}" target="_blank" rel="noopener noreferrer">Preview</a>
				</div>
			</div>
	</div>
	</div>
	</div>

	<!-- Follow Up 2 Popup End -->




	<!-- Follow Up 3 Preview Box -->
	<div class="preview-box">
	<img src="https://mcaprotools.com/wp-content/themes/mca-child/img/mlss/fp3-ss.png" alt="" width="300" />
	<a class="preview-box-button" rel="lightbox" data-gall="gall-frame" data-lightbox-type="inline" href="#followup-page-3">Get Page Link</a>
	</div>
	<!-- Follow Up 3 Preview Box End -->



	<!-- Follow Up 3 Popup -->
	<div id="followup-page-3" style="display:none;">
	<div class="first-link">
	<h4 class="popup-title">Follow Up 2</h4>
	<p>This link is for the lead Follow Up shown below. This will redirect to the video sale Follow Up after someone enters their email address:</p>

	<div class="marketing-sharing-section">
	<h3 style="font-size: 18px;">SHARE THIS URL WITH YOUR CUSTOMERS</h3>
			<div class="marketing-section">
				<div class="marketing-url-input">
					<input class="marketing-url" type="text" value="https://mcaprotools.com/fp3/?ref={affiliate_username}" />

					<a class="mhpreview" href="https://mcaprotools.com/fp3/?ref={affiliate_username}" target="_blank" rel="noopener noreferrer">Preview</a>
				</div>
			</div>
	</div>
	</div>
	</div>

	<!-- Follow Up 3 Popup End -->





	<!-- Follow Up 4 Preview Box -->
	<div class="preview-box">
	<img src="https://mcaprotools.com/wp-content/themes/mca-child/img/mlss/fp4-ss.png" alt="" width="300" />
	<a class="preview-box-button" rel="lightbox" data-gall="gall-frame" data-lightbox-type="inline" href="#followup-page-4">Get Page Link</a>
	</div>
	<!-- Follow Up 4 Preview Box End -->



	<!-- Follow Up 4 Popup -->
	<div id="followup-page-4" style="display:none;">
	<div class="first-link">
	<h4 class="popup-title">Follow Up 2</h4>
	<p>This link is for the lead Follow Up shown below. This will redirect to the video sale Follow Up after someone enters their email address:</p>

	<div class="marketing-sharing-section">
	<h3 style="font-size: 18px;">SHARE THIS URL WITH YOUR CUSTOMERS</h3>
			<div class="marketing-section">
				<div class="marketing-url-input">
					<input class="marketing-url" type="text" value="https://mcaprotools.com/fp4/?ref={affiliate_username}" />

					<a class="mhpreview" href="https://mcaprotools.com/fp4/?ref={affiliate_username}" target="_blank" rel="noopener noreferrer">Preview</a>
				</div>
			</div>
	</div>
	</div>
	</div>

	<!-- Follow Up 4 Popup End -->




	<hr style="clear: both; padding-bottom: 25px; border: 0px; padding-top: 25px;">








	<h1>Live Stream Pages</h1>

	<!-- Live Steam 1 Preview Box -->
	<div class="preview-box">
		<img src="https://mcaprotools.com/wp-content/uploads/2017/04/hangout-ss.jpg" alt="" width="300" />
		<a class="preview-box-button" rel="lightbox" data-gall="gall-frame" data-lightbox-type="inline" href="#livestream-page-1">Get Page Link</a>
	</div>
	<!-- Live Steam 1 Preview Box End -->

	<!-- Live Steam 1 Popup -->
	<div id="livestream-page-1" style="display:none;">
	<div class="first-link">
		<h4 class="popup-title">Live Stream Page 1</h4>
		<p>Use this LIVE Stream Page and do Google Hangouts with your teams / or potential customers and provide value to everyone in a public setting. To <strong>Setup "NEW" Google Hangout</strong> <a href="https://www.youtube.com/my_live_events" target="_blank" rel="noopener">Click Here</a> To Be Redirected to "Google Hangouts / Youtube Live":</a></p>

		<div class="title-settings-section">

					<div class="marketing-section">
						<h3 style="font-size: 18px;">Hangout Page Video Embed</h3>
						<div class="marketing-url-input">
							<?php echo do_shortcode( '[protool_mca_user meta_key="hangout" referrer_data="no" referrer_key="" editable="yes" class="no-filter" display_type="no" placeholder="To Add Your Own Video To This Page, Enter Embed Code Here..."]' ); ?>
						</div>

						<div class="marketing-section">
							<h3 style="font-size: 18px;">Hangout Page Title</h3>
							<div class="marketing-url-input">
								<?php echo do_shortcode( '[protool_mca_user meta_key="hangout_title" referrer_key="ref" editable="yes" display_type="single_line" placeholder=""]' ); ?>
							</div>


						<div class="marketing-section">
							<h3 style="font-size: 18px;">Hangout Subtitle Title</h3>
							<div class="marketing-url-input">
								<?php echo do_shortcode( '[protool_mca_user meta_key="hangout_subtitle" referrer_key="ref" editable="yes" display_type="single_line" placeholder=""]' ); ?>
							</div>
						</div>
		</div>



	<div class="marketing-sharing-section">
		<h3 style="font-size: 18px;">SHARE THIS URL WITH YOUR CUSTOMERS</h3>
				<div class="marketing-section">
					<div class="marketing-url-input">
						<input class="marketing-url" type="text" value="https://mcaprotools.com/hangout/?ref={affiliate_username}" />

						<a class="mhpreview" href="https://mcaprotools.com/hangout/?ref={affiliate_username}" target="_blank" rel="noopener noreferrer">Preview</a>
					</div>
				</div>
	</div>
	</div>
	</div>

	<!-- Follow Up 1 Popup End -->
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
