<?php 
/* Template Name: pushstartsingle */
get_header();
$username = $_GET['ref'];
$user = get_user_by( 'login', $username );
$user_id = $user->ID;
$mcauser= get_user_meta( $user_id, mca_member, true );
$mcapushstart= get_user_meta( $user_id, pushstartmarketingsystem, true ); 
?>
	
	
	
	
	
	
	

	<div id="content" style="width:100%;float:none;">
		<?php if(have_posts()): the_post();?>
			<div id="post-259" class="post-259 page type-page status-publish hentry">
				<div class="post-content">
                    <div id="landing-box">
                        <center>
							<p></p>
                            <h2 style="font-size: 35px;font-weight: 700;"><span style="color: red !important;">This “Push Button” System</span> Is Showing Regular People Like You How To Generate $80 - $2000 In Commissions – Every Week!</h2>
							<div class="videoWrapperhangout">
								<?php if(empty($mcapushstart)){?>
								<iframe src="https://player.vimeo.com/video/225475689?autoplay=1&title=0&byline=0&portrait=0" width="720" height="405" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
								<script src="https://fast.wistia.net/assets/external/E-v1.js" async></script>
								<?php }else{?>
								<?php echo $mcapushstart;?>
								<?php }?>								
							</div>
							<h2 style="padding: 30px;font-weight: 700;padding-bottom: 0px;font-size: 35px;">This Is How We Choose To Live Life... Come Live It With Us!</h2>
							<p><a target="_blank" href="https://www.tvcmatrix.com/secure/cart/addItem.aspx?qty=1&itID=9135&PromoID=83&uid=<?php echo $mcauser; ?>" class="myBtn su-button su-button-style-default sales-btn"><img src="https://mcaprotools.com/wp-content/uploads/2017/04/sign-me-up.png" alt="let-me-in" width="640" height="158"></a></p>
						</center>
                    </div>
                </div>
            </div>
		<?php endif; ?>
	</div>
<?php get_template_part( 'mcapopup' );?>
<?php get_footer(); ?>