<?php

/* Template Name: Followup Page 2 */

get_header();
$username = $_GET['ref'];
$user = get_user_by( 'login', $username );
$user_id = $user->ID;
$mcauser= get_user_meta( $user_id, mca_member, true );
$mcalandingpage=get_user_meta( $user_id, landingpage, true );
?>


<?php
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
        ?>

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



        <style type="text/css">

        .content-fp2-box {
          background-color: #fff;
          margin: 0 auto;
          width: 100%;
        }

        .fp2-title {
        font-size: 60px;
        text-align: center;
        margin-bottom: 20px;
        margin-top: 0px;
        line-height: 100%;
    }

    .fp2-subtitle {
        font-size: 28px;
        margin-top: 0px;
        background-color: yellow;
        margin: 0 auto;
        max-width: 600px;
        margin-bottom: 20px;
        padding: 10px;
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

        .fp2-buy-button {
        margin-bottom: 0px;
        background-color: crimson;
        padding: 20px;
        text-align: center;
        color: #fff;
        font-size: 24px;
    }

      .fp2-buy-button a {
      color: #fff;
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

          .content-fp2-box {
            background-color: #fff;
            margin: 0 auto;
            width: 100%;
          }

        .fp2-title {
        font-size: 29px;
        text-align: center;
        margin-bottom: 15px;
        margin-top: 0px;
        line-height: 100%;
      }

          .fp2-subtitle {
              font-size: 22px;
              margin-top: 0px;
              margin-bottom: 0px;
              background-color: yellow;
              margin: 0 auto;
              padding: 5px;
              max-width: 300px;
              margin-bottom: 25px;
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



        <div class="content-fp2-box">

            <center>
            <p class="fp2-title">
              <span class="red-tag" style="color: crimson;">Video Reveals:</span> Proof That MCA Is Working For Thousands Of People!
            </p>

            <p class="fp2-subtitle"><u>Watch Video Below</u></p>

            </center>

            <div class="video-container">
              <iframe src="https://player.vimeo.com/video/236256683?title=0&byline=0&portrait=0" width="720" height="405" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
            </div>


              <p class="fp2-buy-button">
                <a href="https://www.tvcmatrix.com/secure/cart/addItem.aspx?qty=1&itID=9135&PromoID=83&uid=<?php echo $user->mca_member; ?>" target="_blank">
              JOIN THE TEAM TODAY!</a>
              </p>

    				</center>

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
