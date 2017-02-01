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
            <div id="post-1101" class="post-1101 page type-page status-publish hentry">
                <span class="entry-title" style="display: none;">You May Lose Sleep! (Video)</span><span class="vcard" style="display: none;"><span class="fn"><a href="http://mcaprotools.com/author/ptadmin/" title="Posts by MCAPT Admin" rel="author">MCAPT Admin</a></span></span><span class="updated" style="display:none;">2016-03-08T15:01:09+00:00</span>																		<div class="post-content">
                    <div id="ls-landing"></div>
                    <div id="ls-landing-content">
                        <center><p></p>
                            <h1 class="lp-h1" style="color: #fff; text-align: center;"><strong>WARNING:</strong> YOU MAY LOSE SLEEP WHEN YOU ENTER THIS WEBSITE….</h1>
                            <div class="videoWrapper"><div class="wistia_responsive_padding" style="padding:56.25% 0 0 0;position:relative;"><div class="wistia_responsive_wrapper" style="height:100%;left:0;position:absolute;top:0;width:100%;"><div class="wistia_video_foam_dummy" data-source-container-id="" style="border: 0px; display: block; height: 0px; margin: 0px; padding: 0px; position: static; visibility: hidden; width: auto;"></div><iframe src="//fast.wistia.net/embed/iframe/0tx76zoest?seo=false&amp;videoFoam=true" allowtransparency="true" frameborder="0" scrolling="no" class="wistia_embed" name="wistia_embed" allowfullscreen="allowfullscreen" mozallowfullscreen="mozallowfullscreen" webkitallowfullscreen="webkitallowfullscreen" oallowfullscreen="oallowfullscreen" msallowfullscreen="msallowfullscreen" width="920" height="518" style="width: 920px; height: 518px;"></iframe></div></div>
                                <script src="//fast.wistia.net/assets/external/E-v1.js" async=""></script></div>
                            <div id="ls-buttoncontainer">
                                <h3>Enter At Your Own Risk…</h3>
                                <div id="ls-arrow"><img src="http://mcaprotools.s3-us-west-2.amazonaws.com/wp-content/uploads/2015/03/arrow.png" alt="arrow" width="83" height="100"></div>
                                <div class="su-button-center"><a href="#" class="su-button su-button-style-default ls-btn popmake-993" style="color:#FFFFFF;background-color:#de2b20;border-color:#b2221a;border-radius:5px;-moz-border-radius:5px;-webkit-border-radius:5px" target="_self"><span style="color:#FFFFFF;padding:0px 42px;font-size:30px;line-height:60px;border-color:#e86b63;border-radius:5px;-moz-border-radius:5px;-webkit-border-radius:5px;text-shadow:none;-moz-text-shadow:none;-webkit-text-shadow:none"> CLICK HERE TO ENTER NOW!</span></a></div>
                                <div class="fb-like fb_iframe_widget" style="float: left; height: 80px; width: 100%; text-align: left;" data-href="http://mcaprotools.com/" data-width="100%" data-layout="standard" data-action="like" data-show-faces="true" data-share="true" fb-xfbml-state="rendered" fb-iframe-plugin-query="action=like&amp;app_id=1426723247632845&amp;container_width=754&amp;href=http%3A%2F%2Fmcaprotools.com%2F&amp;layout=standard&amp;locale=en_US&amp;sdk=joey&amp;share=true&amp;show_faces=true&amp;width=100%25"><span style="vertical-align: top; width: 0px; height: 0px; overflow: hidden;"><iframe name="f25d53073f7676c" height="1000px" frameborder="0" allowtransparency="true" allowfullscreen="true" scrolling="no" title="fb:like Facebook Social Plugin" src="https://www.facebook.com/v2.3/plugins/like.php?action=like&amp;app_id=1426723247632845&amp;channel=http%3A%2F%2Fstaticxx.facebook.com%2Fconnect%2Fxd_arbiter%2Fr%2FSh-3BhStODe.js%3Fversion%3D42%23cb%3Df13f18dd9788a54%26domain%3Dmcaprotools.com%26origin%3Dhttp%253A%252F%252Fmcaprotools.com%252Ff24ba43c0b5d0ac%26relation%3Dparent.parent&amp;container_width=754&amp;href=http%3A%2F%2Fmcaprotools.com%2F&amp;layout=standard&amp;locale=en_US&amp;sdk=joey&amp;share=true&amp;show_faces=true&amp;width=100%25" style="border: none; visibility: visible; width: 0px; height: 0px;"></iframe></span></div>
                                <p style="font-size: 16px; font-style: normal;">We respect your privacy and have a ZERO TOLERANCE for spam.</p>
                            </div>
                            <h3>As Seen On:</h3>
                            <p><img src="http://mcaprotools.s3-us-west-2.amazonaws.com/wp-content/uploads/2015/02/asseenon.png" alt="As Seen On TV" width="916" height="180" class="alignright size-full wp-image-859" srcset="http://mcaprotools.com/wp-content/uploads/2015/02/asseenon.png 916w, http://mcaprotools.com/wp-content/uploads/2015/02/asseenon-300x59.png 300w, http://mcaprotools.com/wp-content/uploads/2015/02/asseenon-100x20.png 100w, http://mcaprotools.com/wp-content/uploads/2015/02/asseenon-120x24.png 120w, http://mcaprotools.com/wp-content/uploads/2015/02/asseenon-500x98.png 500w" sizes="(max-width: 916px) 100vw, 916px"><br>
                            </p></center>
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