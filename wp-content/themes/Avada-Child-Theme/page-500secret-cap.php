<?php
/* Template Name: 500+ Secret Capture */
get_header();
?>

<style type="text/css">

#main {
    padding-top: 0px;
    padding-bottom: 0px;
    height: 1080px !important;
}

.content-500secret-cap {
    width: 100%;
    float: none;
    clear: both;
    margin-right: auto;
    margin-left: auto;
}

.landing-secretbox-box {
    max-width: 500px;
    margin: 100px auto 0px;
    z-index: 600;
    position: relative;
    background-color: #FFF;
    padding: 30px;
    border-radius: 5px;
    -webkit-box-shadow: -2px 2px 19px -7px rgba(0, 0, 0, 1);
    -moz-box-shadow: -2px 2px 19px -7px rgba(0, 0, 0, 1);
    box-shadow: -2px 2px 19px -7px rgba(0, 0, 0, 1);
    text-align: center;
}

.secret-title {
    font-size: 33px;
    line-height: 35px;
    font-weight: 600;
}

input[type="text"].secretemail {
    margin-top: 20px;
    width: 100%;
    padding: 14px;
    font-size: 16px;
    color: #000;
}

.secretemailtxt {
    margin-top: 20px;
}

input[type=submit].secretsubmit {
    background-color: #de291e;
    border: none;
    color: #fff;
    margin-top: 20px;
    width: 90%;
    padding: 15px 0px;
    text-transform: uppercase;
    font-size: 20px;
    font-weight: 600;
    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
    border-radius: 5px;
}

</style>

<div class="content-500secret-cap">
		<?php if(have_posts()): the_post();?>

		<div class="landing-secretbox-box">
					<div class="secret-title">Learn How Everyday People Like You Are Making <span style="color: crimson;">$500+</span> A Day Online...
					</div>

		<div>
			<form method="post" class="af-form-wrapper" accept-charset="UTF-8" action="https://www.aweber.com/scripts/addlead.pl">
				<textarea name="listname" style="display:none;"><?php echo do_shortcode("[protool_mca_user meta_key='aweber_list' referrer_data='yes' referrer_key='ref' display_type='single_line']"); ?></textarea>

				<textarea style="display:none;" name="redirect" id="redirect_ec539077ddfbfd0ed6a1a4e4f7bb8862">https://mcaprotools.com/daystart/?ref=<?php echo do_shortcode('[protool_mca_user meta_key="referrer" referrer_key="ref"]'); ?></textarea>

				<input type="hidden" name="meta_required" value="email" />
				<input class="input-email secretemail" name="email" type="text" placeholder="Enter Your Best Email" required />

				<div class="secretemailtxt">Enter Details To Get Instant Access</div>

				<input type="submit" class="secretsubmit" value="Get Instant Access!" />
			</form>
		</div>
	</div>

<?php endif; ?>
<?php get_footer(); ?>
