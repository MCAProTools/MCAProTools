<?php

/* Template Name: 6 Figure Video Chart */

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

	<style type="text/css">

  .content-6figure-chart-box {
    background-color: #fff;
    padding: 40px;
    margin: 0 auto;
    width: 80%;
  }

  .videoWrapper {
  position: relative;
  padding-bottom: 56.25%; /* 16:9 */
  padding-top: 25px;
  height: 0;
  }

  .videoWrapper iframe {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  }

  .landing-page-buy-button {
    margin-bottom: 0px;
  }

  .video-container {
    position: relative;
    padding-bottom: 52%;
    padding-top: 30px;
    height: 0;
    overflow: hidden;
  }

	.buttonbox {
    text-align: center;
    margin-top: 25px;
}

  .video-container iframe,
  .video-container object,
  .video-container embed {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  }

	table {
			margin-top: 50px;
	}

	.blank-title {
					width: 40%;
				}

	.table-title {
		text-align: center;
		font-size: 18px;
		font-weight: bold;
		padding-bottom: 15px;
		}

	.beginner-column {
					background-color: #777;
		}

	.table-option {
		text-align: center;
	}

	.table-row-title {
		width: 40%;
		text-align: left;
	}

	tr.grey {
	background-color: lightgray;
	height: 25px;
	}

	tr.white {
			background-color: #fff;
			height: 25px;
	}

	p.chart-text {
	padding: 10px;
	margin-bottom: 0px;
	}

	.redx {
	font-size: 24px;
	color: crimson;
	}

	.checkgreen {
	font-size: 24px;
	color: green;
	}

  @media screen and (max-width: 700px){

  .content-lp1-box {
    background-color: #fff;
    padding: 20px;
    margin: 0 auto;
    width: 100%;
  }

  .landing-page-title {
      font-size: 24px;
      line-height: 30px;
      font-weight: 700;
      margin-top: 0px;
  }
  .video-container {
    position: relative;
    padding-bottom: 47%;
    padding-top: 30px;
    height: 0;
    overflow: hidden;
  }
  }

  </style>


	<div class="content-6figure-chart-box">

		<?php if(have_posts()): the_post(); ?>

		<center>
			<p class="6figure-chart-page-title">This Is How The 6 Figure Formula Is Making It Unbelievably Easy To Earn <span class="red-tag" style="color: crimson;">$2000+ (Or More) Per Week</span></p>

			<p class="6figure-subtitle"><u>Watch My Video Below To Discover How You Can Get Access To This Exclusive Training Too...</u></p>


			<div class="video-container">
					<?php if(empty($mcapushct4)){?>
						<iframe src="https://player.vimeo.com/video/226234110?title=0&byline=0&portrait=0" width="640" height="360" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
					<?php }else{?>
				 <?php echo $mcapushct4;?>
			 <?php }?>
			</div>

			</center>


			 <p class="landing-page-buy-button">
				 <a href="http://mcaprotools.com/checkout/?add-to-cart=8560" target="_blank" class="bizvideo-btn1">
 			    		<div class="su-button-center submitbtn-6fig" style="line-height: 100%;"><span style="font-size: 18px;">Beginners</span><br>6 Figure Formula</div>
 			    		</a>


 				 <a href="http://mcaprotools.com/checkout/?add-to-cart=8564" target="_blank" class="bizvideo-btn2">
 			    		<div class="su-button-center submitbtn-6fig" style="line-height: 100%;"><span style="font-size: 18px;">Advanced</span><br>6 Figure Formula</div>
 			    		</a>
			</p>




			<p class="6figure-chart">
				<table>
			<tr class="white">
				<td class="blank-title"></td>
				<td class="table-title">Beginners Formula</br>$97.00</td>
				<td class="table-title">Advanced Formula</br>$197.00</td>
			</tr>
			<tr class="grey">
				<td class="table-row-title"><p class="chart-text">How To Properly Setup Everything</p></td>
				<td class="table-option"><strong class="checkgreen"><strong class="checkgreen">&#9989;</strong></strong></td>
				<td class="table-option"><strong class="checkgreen">&#9989;</strong></td>
			</tr>
			<tr class="white">
				<td class="table-row-title"><p class="chart-text">How To Build Relationship With Facebook</p></td>
				<td class="table-option"><strong class="checkgreen">&#9989;</strong></td>
				<td class="table-option"><strong class="checkgreen">&#9989;</strong></td>
			</tr>
			<tr class="grey">
				<td class="table-row-title"><p class="chart-text">How To Make Successful Facebook Ads</p></td>
				<td class="table-option"><strong class="checkgreen">&#9989;</strong></td>
				<td class="table-option"><strong class="checkgreen">&#9989;</strong></td>
			</tr>
			<tr class="white">
				<td class="table-row-title"><p class="chart-text">How To Setup A Business Account</p></td>
				<td class="table-option"><strong class="redx">&#10060;</strong></td>
				<td class="table-option"><strong class="checkgreen">&#9989;</strong></td>
			</tr>
			<tr class="grey">
				<td class="table-row-title"><p class="chart-text">How To Avoid Getting Flagged</p></td>
				<td class="table-option"><strong class="redx">&#10060;</strong></td>
				<td class="table-option"><strong class="checkgreen">&#9989;</strong></td>
			</tr>
			<tr class="white">
				<td class="table-row-title"><p class="chart-text">In Depth training On Creating Ads</p></td>
				<td class="table-option"><strong class="redx">&#10060;</strong></td>
				<td class="table-option"><strong class="checkgreen">&#9989;</strong></td>
			</tr>
			<tr class="grey">
				<td class="table-row-title"><p class="chart-text">In Depth training On Creating The Right Ads</p></td>
				<td class="table-option"><strong class="redx">&#10060;</strong></td>
				<td class="table-option"><strong class="checkgreen">&#9989;</strong></td>
			</tr>
			<tr class="white">
				<td class="table-row-title"><p class="chart-text">In Depth Training On Creating Motivational Quotes</p></td>
				<td class="table-option"><strong class="redx">&#10060;</strong></td>
				<td class="table-option"><strong class="checkgreen">&#9989;</strong></td>
			</tr>
			<tr class="grey">
				<td class="table-row-title"><p class="chart-text">Creating Ads With The Right Budget</p></td>
				<td class="table-option"><strong class="redx">&#10060;</strong></td>
				<td class="table-option"><strong class="checkgreen">&#9989;</strong></td>
			</tr>
			<tr class="white">
				<td class="table-row-title"><p class="chart-text">Target The Right Demographics</p></td>
				<td class="table-option"><strong class="redx">&#10060;</strong></td>
				<td class="table-option"><strong class="checkgreen">&#9989;</strong></td>
			</tr>
			<tr class="grey">
				<td class="table-row-title"><p class="chart-text">Keeping Your Page On Autopilot</p></td>
				<td class="table-option"><strong class="redx">&#10060;</strong></td>
				<td class="table-option"><strong class="checkgreen">&#9989;</strong></td>
			</tr>
			<tr class="white">
				<td class="table-row-title"><p class="chart-text">Marketing Video Provided</p></td>
				<td class="table-option"><strong class="redx">&#10060;</strong></td>
				<td class="table-option"><strong class="checkgreen">&#9989;</strong></td>
			</tr>
			</table>
		</p>


		</center>
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
