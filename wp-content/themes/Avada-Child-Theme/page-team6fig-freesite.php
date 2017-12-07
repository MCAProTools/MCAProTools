<?php
/* Template Name: Team 6 Figure / Free Page */
get_header();


?>


<style type="text/css">

.content-team6fig-freesite {
    background-color: #fff;
    padding: 40px;
}


.team6fig-freesite-title {
  font-size: 39px;
  font-weight: 700;
  line-height: 100% !important;
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

  .video-container iframe,
  .video-container object,
  .video-container embed {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  }


@media screen and (max-width: 700px) {

  .content-team6fig-freesite {
      background-color: #fff;
      padding: 20px;
  }

  .team6fig-freesite-title {
    font-size: 26px;
    line-height: 30px;
    margin-top: 0px;
    font-weight: 700;
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


	<div class="content-team6fig-freesite">
		<?php if(have_posts()): the_post();?>

      <center>
        <p class="team6fig-freesite-title">"Watch This <span style="color: red !important;">FREE Video </span>That Reveals the SIMPLE Formula to Making an Extra $500-$2,000 Per Week from Home!"</p>

          <div class="video-container">
            <iframe width="720" height="340" src="https://www.youtube.com/embed/eFBsdptryrg?autoplay=1&rel=0&controls=0&showinfo=0" frameborder="0" allowfullscreen></iframe>
          </div>

      <?php if($_GET['ref'] != '') $username2 = $_GET['ref']; else $username2 = $_GET['s1']; ?>

			   <p class="team6fig-freesite-buy-button">
           <a href="https://www.tvcmatrix.com/secure/cart/addItem.aspx?qty=1&itID=9135&PromoID=83&uid=<?php echo $username2; ?>" target="_blank" class="myBtn su-button su-button-style-default sales-btn">
          <img src="https://mcaprotools.com/wp-content/uploads/2017/05/large-registernow.png" alt="let-me-in" width="568" height="189">
          </a>
        </p>
      </center>
    </div>

<!--  Page End -->

  </div>
  <?php endif; ?>
	</div>
<?php get_footer(); ?>
