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
	max-width: 300px;
}

a.preview-box-button {
    width: 100%;
    max-width: 300px;
    text-align: center;
    background-color: crimson;
    padding: 15px;
    min-width: 300px !important;
    color: #fff;
    padding-left: 75px;
    font-size: 18px;
    float: left;
    margin-top: 10px;
    margin-left: 1px;
    padding-right: 75px;
}

</style>




		<section class="bg-img">
				<div class="bg_images_back"></div>

				<div class="container">
				<img src="https://mcaprotools.com/wp-content/uploads/2015/02/stop_and_watch.png" alt="stop_and_watch" width="100%" height="62" />

				<iframe src="https://player.vimeo.com/video/243497488" width="640" height="400" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>

				<hr />


				<h2 style="font-size: 29px; font-weight: bold;">MCA <span style="color: crimson; background-color: yellow;">"Highest Converting"</span> Sales Funnels</h2>


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
					             <div class="marketing-url-input"><input class="marketing-url" type="text" value="https://mcaprotools.com/lp1/?ref={affiliate_username}" />

												 <a class="mhpreview" href="https://mcaprotools.com/lp1/?ref={affiliate_username}" target="_blank" rel="noopener noreferrer">Preview</a>
											 </div>
					          </div>
					     </div>
				</div>
			</div>

			<!-- Capture Page 1 Popup End -->







			<!-- Capture Page 2 Popup -->
			<div id="capture-page-2" style="display:none;">
			<div class="first-link">
				<h4 class="popup-title">Capture Page 2</h4>
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
										 <div class="marketing-url-input"><input class="marketing-url" type="text" value="https://mcaprotools.com/lp1/?ref={affiliate_username}" />

											 <a class="mhpreview" href="https://mcaprotools.com/lp1/?ref={affiliate_username}" target="_blank" rel="noopener noreferrer">Preview</a>
										 </div>
									</div>
						 </div>
			</div>
			</div>

			<!-- Capture Page 2 Popup End -->


			<!-- Capture Page 2 Popup -->
			<div id="capture-page-2" style="display:none;">
			<div class="first-link">
				<h4 class="popup-title">Capture Page 2</h4>
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
										 <div class="marketing-url-input"><input class="marketing-url" type="text" value="https://mcaprotools.com/lp1/?ref={affiliate_username}" />

											 <a class="mhpreview" href="https://mcaprotools.com/lp1/?ref={affiliate_username}" target="_blank" rel="noopener noreferrer">Preview</a>
										 </div>
									</div>
						 </div>
			</div>
		</div>

		<!-- Capture Page 2 Popup End -->



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
									 <div class="marketing-url-input"><input class="marketing-url" type="text" value="https://mcaprotools.com/lp1/?ref={affiliate_username}" />

										 <a class="mhpreview" href="https://mcaprotools.com/lp1/?ref={affiliate_username}" target="_blank" rel="noopener noreferrer">Preview</a>
									 </div>
								</div>
					 </div>
		</div>
	</div>

	<!-- Capture Page 3 Popup End -->
















	<hr style="padding:50px;">






	<!-- Capture Page 4 Popup -->
	<div id="capture-page-4" style="display:none;">
	<div class="first-link">
		<h4 class="popup-title">Capture Page 4</h4>
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
								 <div class="marketing-url-input"><input class="marketing-url" type="text" value="https://mcaprotools.com/lp1/?ref={affiliate_username}" />

									 <a class="mhpreview" href="https://mcaprotools.com/lp1/?ref={affiliate_username}" target="_blank" rel="noopener noreferrer">Preview</a>
								 </div>
							</div>
				 </div>
	</div>
</div>

<!-- Capture Page 3 Popup End -->






<!-- Capture Page 4 Popup -->
<div id="capture-page-1" style="display:none;">
<div class="first-link">
	<h4 class="popup-title">Capture Page 1</h4>
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
							 <div class="marketing-url-input"><input class="marketing-url" type="text" value="https://mcaprotools.com/lp1/?ref={affiliate_username}" />

								 <a class="mhpreview" href="https://mcaprotools.com/lp1/?ref={affiliate_username}" target="_blank" rel="noopener noreferrer">Preview</a>
							 </div>
						</div>
			 </div>
</div>
</div>

<!-- Capture Page 4 Popup End -->



<!-- Capture Page 4 Popup -->
<div id="capture-page-1" style="display:none;">
<div class="first-link">
	<h4 class="popup-title">Capture Page 1</h4>
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
							 <div class="marketing-url-input"><input class="marketing-url" type="text" value="https://mcaprotools.com/lp1/?ref={affiliate_username}" />

								 <a class="mhpreview" href="https://mcaprotools.com/lp1/?ref={affiliate_username}" target="_blank" rel="noopener noreferrer">Preview</a>
							 </div>
						</div>
			 </div>
</div>
</div>

<!-- Capture Page 4 Popup End -->




<hr>
<br><br><br><br><br><br><br><br>

					      [/protool_column]
					      [protool_column size="1/3"] <img src="https://mcaprotools.com/wp-content/themes/mca-child/img/mlss/500-ss.jpg" alt="" width="300" />
					         <a class="marketing-link-red-button" rel="lightbox" data-gall="gall-frame" data-lightbox-type="inline" href="#capture-page-2">Get Page Link</a>
					         <div id="capture-page-2" style="display:none;">
					            <div class="first-link">
					               <h4 class="popup-title">Capture Page 2</h4>
					               This link is for the lead capture page shown below. This will redirect to the video sale landing page after someone enters their email address:
					               <div class="marketing-sharing-section">
					                  <h3 style="font-size: 18px;">SHARE THIS URL WITH YOUR CUSTOMERS</h3>
					                  <div class="marketing-section">
					                     <div class="marketing-url-input"><input class="marketing-url" type="text" value="https://mcaprotools.com/500s/?ref={affiliate_username}" /><a class="mhpreview" href="https://mcaprotools.com/500s/?ref={affiliate_username}" target="_blank" rel="noopener noreferrer">Preview</a></div>
					                  </div>
					               </div>
					            </div>
					            <div class="second-link">
					               This is the landing page the user is redirected to after they enter thier email address:
					               <div class="marketing-sharing-section">
					                  <div class="marketing-section">
					                     <div class="marketing-url-input"><input class="marketing-url" type="text" value="https://mcaprotools.com/daystart/?ref={affiliate_username}" /><a class="mhpreview" href="https://mcaprotools.com/daystart/?ref={affiliate_username}" target="_blank" rel="noopener noreferrer">Preview</a></div>
					                  </div>
					               </div>
					            </div>
					         </div>
					      [/protool_column]
					      [protool_column size="1/3"]
					      [/protool_column]
					      [protool_column size="1/3"][/protool_column]
					   [/protool_row]
					[/protool_spoiler]
					[/fusion_builder_column][fusion_builder_column type="1_1" background_position="left top" background_color="" border_size="" border_color="" border_style="solid" spacing="yes" background_image="" background_repeat="no-repeat" padding="" margin_top="0px" margin_bottom="0px" class="" id="" animation_type="" animation_speed="0.3" animation_direction="left" hide_on_mobile="no" center_content="no" min_height="none"][protool_spoiler open="yes" title="Video Sales Letter Pages" style="fancy" class="mca-spoiler"]
					   [protool_row]
					      [protool_column size="1/3"]<img src="https://mcaprotools.com/wp-content/themes/mca-child/img/mlss/landing-ss.png" alt="" width="300" />
					         <a class="marketing-link-red-button" rel="lightbox" data-gall="gall-frame" data-lightbox-type="inline" href="#landing-page-1">Get Page Link</a>
					         <div id="landing-page-1" style="display:none;">
					            <h4 class="popup-title">Video Sales Letter Page 1</h4>
					            You can embed your own video below:
					            [protool_mca_user meta_key="videosaleslandingpage1" referrer_data="no" referrer_key="" editable="yes" class="" display_type="no" placeholder="To Add Your Own Video To This Page, Enter Embed Code Here..."]
					            <div class="first-link">
					               <div class="marketing-sharing-section">
					                  <h3 style="font-size: 18px;">SHARE THIS URL WITH YOUR CUSTOMERS</h3>
					                  <div class="marketing-section">
					                     <div class="marketing-url-input"><input class="marketing-url" type="text" value="https://mcaprotools.com/lp1/?ref={affiliate_username}" /><a class="mhpreview" href="https://mcaprotools.com/lp1/?ref={affiliate_username}" target="_blank" rel="noopener noreferrer">Preview</a></div>
					                  </div>
					               </div>
					            </div>
					         </div>
					      [/protool_column]
					      [protool_column size="1/3"]<img src="https://mcaprotools.com/wp-content/themes/mca-child/img/mlss/lp2-ss.png" alt="" width="300" />
					         <a class="marketing-link-red-button" rel="lightbox" data-gall="gall-frame" data-lightbox-type="inline" href="#landing-page-2">Get Page Link</a>
					         <div id="landing-page-2" style="display:none;">
					            <h4 class="popup-title">Video Sales Letter Page 2</h4>
					            You can embed your own video below:
					            [protool_mca_user meta_key="videosaleslandingpage2" referrer_data="no" referrer_key="" editable="yes" class="" display_type="no" placeholder="To Add Your Own Video To This Page, Enter Embed Code Here..."]
					            <div class="first-link">
					               <div class="marketing-sharing-section">
					                  <h3 style="font-size: 18px;">SHARE THIS URL WITH YOUR CUSTOMERS</h3>
					                  <div class="marketing-section">
					                     <div class="marketing-url-input"><input class="marketing-url" type="text" value="https://mcaprotools.com/lp2/?ref={affiliate_username}" /><a class="mhpreview" href="https://mcaprotools.com/lp2/?ref={affiliate_username}" target="_blank" rel="noopener noreferrer">Preview</a></div>
					                  </div>
					               </div>
					            </div>
					         </div>
					      [/protool_column]
					      [protool_column size="1/3"]
					      [/protool_column]
					      [protool_column size="1/3"][/protool_column]
					   [/protool_row]
					[/protool_spoiler]
					<hr />
					[/fusion_builder_column][fusion_builder_column type="1_1" background_position="left top" background_color="" border_size="" border_color="" border_style="solid" spacing="yes" background_image="" background_repeat="no-repeat" padding="" margin_top="0px" margin_bottom="0px" class="" id="" animation_type="" animation_speed="0.3" animation_direction="left" hide_on_mobile="no" center_content="no" min_height="none"][protool_spoiler open="yes" title="Follow Up Landing Pages" style="fancy" class="mca-spoiler"]
					   [protool_row]
					      [protool_column size="1/3"] <img src="https://mcaprotools.com/wp-content/themes/mca-child/img/mlss/followup-ss.png" alt="" width="300" />
					         <a class="marketing-link-red-button" rel="lightbox" data-gall="gall-frame" data-lightbox-type="inline" href="#follow-page-1">Get Page Link</a>
					         <div id="follow-page-1" style="display:none;">
					            <div class="first-link">
					               <h4 class="popup-title">Follow Up Page 1</h4>
					               This link is for the follow up page shown.
					               <div class="marketing-sharing-section">
					                  <h3 style="font-size: 18px;">SHARE THIS URL WITH YOUR CUSTOMERS</h3>
					                  <div class="marketing-section">
					                     <div class="marketing-url-input">
					                        <input class="marketing-url" type="text" value="https://mcaprotools.com/followup/?ref={affiliate_username}" /><a class="mhpreview" href="https://mcaprotools.com/followup/?ref={affiliate_username}" target="_blank" rel="noopener noreferrer">Preview</a>
					                     </div>
					                  </div>
					               </div>
					            </div>
					         </div>
					      [/protool_column]
					      [protool_column size="1/3"] <img src="https://mcaprotools.com/wp-content/themes/mca-child/img/mlss/fp2-ss.png" alt="" width="300" />
					         <a class="marketing-link-red-button" rel="lightbox" data-gall="gall-frame" data-lightbox-type="inline" href="#follow-page-2">Get Page Link</a>
					         <div id="follow-page-2" style="display:none;">
					            <div class="first-link">
					               <h4 class="popup-title">Follow Up Page 2</h4>
					               This link is for the follow up page shown.
					               <div class="marketing-sharing-section">
					                  <h3 style="font-size: 18px;">SHARE THIS URL WITH YOUR CUSTOMERS</h3>
					                  <div class="marketing-section">
					                     <div class="marketing-url-input">
					                        <input class="marketing-url" type="text" value="https://mcaprotools.com/fp2/?ref={affiliate_username}" /><a class="mhpreview" href="https://mcaprotools.com/fp2/?ref={affiliate_username}" target="_blank" rel="noopener noreferrer">Preview</a>
					                     </div>
					                  </div>
					               </div>
					            </div>
					         </div>
					      [/protool_column]
					      [protool_column size="1/3"] <img src="https://mcaprotools.com/wp-content/themes/mca-child/img/mlss/fp3-ss.png" alt="" width="300" />
					         <a class="marketing-link-red-button" rel="lightbox" data-gall="gall-frame" data-lightbox-type="inline" href="#follow-page-3">Get Page Link</a>
					         <div id="follow-page-3" style="display:none;">
					            <div class="first-link">
					               <h4 class="popup-title">Follow Up Page 3</h4>
					               This link is for the follow up page shown.
					               <div class="marketing-sharing-section">
					                  <h3 style="font-size: 18px;">SHARE THIS URL WITH YOUR CUSTOMERS</h3>
					                  <div class="marketing-section">
					                     <div class="marketing-url-input">
					                        <input class="marketing-url" type="text" value="https://mcaprotools.com/fp3/?ref={affiliate_username}" /><a class="mhpreview" href="https://mcaprotools.com/fp3/?ref={affiliate_username}" target="_blank" rel="noopener noreferrer">Preview</a>
					                     </div>
					                  </div>
					               </div>
					            </div>
					         </div>
					      [/protool_column]
					      [protool_column size="1/3"][/protool_column]
					   [/protool_row]
					   [protool_row]
					      [protool_column size="1/3"] <img src="https://mcaprotools.com/wp-content/themes/mca-child/img/mlss/fp4-ss.png" alt="" width="300" />
					         <a class="marketing-link-red-button" rel="lightbox" data-gall="gall-frame" data-lightbox-type="inline" href="#follow-page-4">Get Page Link</a>
					         <div id="follow-page-4" style="display:none;">
					            <div class="first-link">
					               <h4 class="popup-title">Follow Up Page 4</h4>
					               This link is for the follow up page shown.
					               <div class="marketing-sharing-section">
					                  <h3 style="font-size: 18px;">SHARE THIS URL WITH YOUR CUSTOMERS</h3>
					                  <div class="marketing-section">
					                     <div class="marketing-url-input">
					                        <input class="marketing-url" type="text" value="https://mcaprotools.com/fp4/?ref={affiliate_username}" /><a class="mhpreview" href="https://mcaprotools.com/fp4/?ref={affiliate_username}" target="_blank" rel="noopener noreferrer">Preview</a>
					                     </div>
					                  </div>
					               </div>
					            </div>
					         </div>
					      [/protool_column]
					      [protool_column size="1/3"][/protool_column]
					      [protool_column size="1/3"][/protool_column]
					   [/protool_row]
					[/protool_spoiler]
					[/fusion_builder_column][fusion_builder_column type="1_1" background_position="left top" background_color="" border_size="" border_color="" border_style="solid" spacing="yes" background_image="" background_repeat="no-repeat" padding="" margin_top="0px" margin_bottom="0px" class="" id="" animation_type="" animation_speed="0.3" animation_direction="left" hide_on_mobile="no" center_content="no" min_height="none"][protool_spoiler open="yes" title="Live Stream Pages" style="fancy" class="mca-spoiler"]
					   [protool_row]
					      [protool_column size="1/3"] <img src="https://mcaprotools.com/wp-content/uploads/2017/04/hangout-ss.jpg" alt="" />
					         <a class="marketing-link-red-button" rel="lightbox" data-gall="gall-frame" data-lightbox-type="inline" href="#hangout-page-1">Get Page Link</a>
					         <div id="hangout-page-1" style="display:none;">
					            <h4 class="popup-title">Live Stream Page</h4>
					            Use this LIVE Stream Page and do Google Hangouts with your teams / or potential customers and provide value to everyone in a public setting.
					            To <strong>Setup "NEW" Google Hangout</strong> Click The Green Button To Be Redirected to "Google Hangouts / Youtube Live": </br>
					            <a href="https://www.youtube.com/my_live_events" target="_blank" rel="noopener">
					            <img class="alignleft size-full" src="http://mcaprotools.com/wp-content/themes/mca-child/img/hangout-go.png" width="362" height="64" />
					            </a>
					            [protool_mca_user meta_key="hangout" referrer_data="no" referrer_key="" editable="yes" class="no-filter" display_type="no" placeholder="To Add Your Own Video To This Page, Enter Embed Code Here..."]
					            <div class="marketing-sharing-section">
					               <h3 style="font-weight: bold; font-size: 24px;">Hangout Page Title</h3>
					               <div class="marketing-section">
					                  <div class="marketing-url-input">[protool_mca_user meta_key="hangout_title" referrer_key="ref" editable="yes" display_type="single_line" placeholder=""]</div>
					               </div>
					               <h3 style="font-weight: bold; font-size: 24px;">Hangout Page Sub Title</h3>
					               <div class="marketing-section">
					                  <div class="marketing-url-input">[protool_mca_user meta_key="hangout_subtitle" referrer_key="ref" editable="yes" display_type="single_line" placeholder=""]</div>
					               </div>
					               <div class="first-link">
					                  <h3 style="font-size: 18px;">SHARE THIS URL WITH YOUR CUSTOMERS</h3>
					                  <div class="marketing-section">
					                     <div class="marketing-url-input"><input class="marketing-url" type="text" value="https://www.mcaprotools.com/hangout/?ref={affiliate_username}" /><a class="mhpreview" href="https://www.mcaprotools.com/hangout/?ref={affiliate_username}" target="_blank" rel="noopener noreferrer">Preview</a></div>
					                  </div>
					               </div>
					            </div>
					         </div>
					      [/protool_column]
					      [protool_column size="1/3"][/protool_column]
					      [protool_column size="1/3"][/protool_column]
					   [/protool_row]
					[/protool_spoiler][/fusion_builder_column][/fusion_builder_row][/fusion_builder_container]




				</div>
			</section>
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
