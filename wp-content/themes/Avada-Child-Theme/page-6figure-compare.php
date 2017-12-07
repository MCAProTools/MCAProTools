<?php
/* Template Name: 6 Figure Compare */
get_header();
if($_GET['ref'] != '' || $_GET['s1'] != '') {
                if($_GET['ref'] != '') $username = $_GET['ref'];
                else $username = $_GET['s1'];
                $user = get_user_by( 'login', $username );
                $user_id = $user->ID;
                $avatar_img = get_avatar( $user_id, 400 );
            }
            else {
                $args  = array(
                    'role' => 'vip_user'
                );

                $users = get_users( $args );
                $rand_key = array_rand($users, 1);
                $user = $users[$rand_key];
                $username = $user->user_login;
                $user = get_user_by( 'login', $username );
                $user_id = $user->ID;
                $avatar_img = get_avatar( $user_id, 400 );
            }
$mcauser= get_user_meta( $user_id, mca_member, true );
$mcapushct4= get_user_meta( $user_id, videosaleslandingpage1, true );
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
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

  .content-lp1-box {
    background-color: #fff;
    padding: 40px;
    margin: 0 auto;
    width: 80%;
  }

  .landing-page-title {
      font-size: 29px;
      font-weight: 700;
      margin-bottom: 0px;
      line-height: 35px;
      margin-top: 0px;
      margin-bottom: 15px;
  }

  .landing-page-subtitle {
      font-size: 18px;
      font-weight: 100;
      line-height: 40px;
      margin-top: 0px;
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


  .blank-title {
          width: 40%;
        }

  .table-title {
    text-align: center;
    font-size: 18px;
    font-weight: bold;
    padding-bottom: 15px;
    }


  .buttonbox {
    text-align: center;
  }

  .buttonbox > p {
    display: inline-block;
    float: none!important;
    background-color: crimson;
    padding: 10px;
    width: 375px;
}

.buttonbox a {
    color: #fff;
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


  .video-container {
    position: relative;
    padding-bottom: 52%;
    padding-top: 30px;
    height: 0;
    overflow: hidden;
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

@media screen and (max-width: 700px){

  .content-lp1-box {
    background-color: #fff;
    padding: 20px;
    margin: 0 auto;
    width: 100%;
  }

  .landing-page-title {
    font-size: 20px;
    line-height: 23px;
    font-weight: 700;
    margin-bottom: 10px;
    margin-top: 0px;
}

  .video-container {
    position: relative;
    padding-bottom: 47%;
    padding-top: 30px;
    height: 0;
    overflow: hidden;
}

.buttonbox > p {
    display: inline-block;
    float: none!important;
    background-color: crimson;
    padding: 10px;
    width: 140px;
}



.landing-page-subtitle {
    font-size: 14px;
    font-weight: 100;
    line-height: 16px;
    margin-top: 0px;
}

}






  </style>





	<div id="content" style="<?php echo $content_css; ?>">
		<?php if(have_posts()): the_post();?>

        <div class="content-lp1-box">
          <center>
            <p class="landing-page-title">This Is How The 6 Figure Formula Is Making It Unbelievably Easy To Earn <span style="color: red !important;">$2000+ (Or More) Per Week</span></p>

            <p class="landing-page-subtitle">Watch My Video Below To Discover How You Can Get Access To This Exclusive Training Too...</p>

            <div class="video-container">
                <?php if(empty($mcapushct4)){?>
                  <iframe src="https://player.vimeo.com/video/226234110?title=0&byline=0&portrait=0" width="640" height="360" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                <?php }else{?>
               <?php echo $mcapushct4;?>
             <?php }?>
            </div>



            <div class="buttonbox">
                <p> <a href="http://mcaprotools.com/checkout/?add-to-cart=8560" class="back" id="bottom-btn1"><strong>Beginners 6 Figure Formula</strong><br><em style="font-size:12px;">(Click Here To Purchase)</em></a></p>

                <p> <a href="http://mcaprotools.com/checkout/?add-to-cart=8564" class="back" id="bottom-btn2"><strong>Advanced 6 Figure Formula</strong><br><em style="font-size:12px;">(Click Here To Purchase</em></a></p>
            </div>




    				<div class="siteclear"></div>



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

        <div class="siteclear"></div>


        <div class="buttonbox">
            <p> <a href="http://mcaprotools.com/checkout/?add-to-cart=8560" class="back" id="bottom-btn1"><strong>Beginners 6 Figure Formula</strong><br><em style="font-size:12px;">(Click Here To Purchase)</em></a></p>

            <p> <a href="http://mcaprotools.com/checkout/?add-to-cart=8564" class="back" id="bottom-btn2"><strong>Advanced 6 Figure Formula</strong><br><em style="font-size:12px;">(Click Here To Purchase</em></a></p>
        </div>


          </center>
      </div>
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
