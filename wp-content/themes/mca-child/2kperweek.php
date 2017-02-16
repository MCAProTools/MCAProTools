<?php
/* Template Name: 2kperweek */
get_header(); ?>
<?php
$content_css = '';
$sidebar_css = '';
$sidebar_exists = true;
$sidebar_left = '';
$double_sidebars = false;

$sidebar_1 = get_post_meta($post->ID, 'sbg_selected_sidebar_replacement', true);
$sidebar_2 = get_post_meta($post->ID, 'sbg_selected_sidebar_2_replacement', true);

if ($smof_data['pages_global_sidebar'] || (class_exists('TribeEvents') && is_events_archive())) {
    if ($smof_data['pages_sidebar'] != 'None') {
        $sidebar_1 = array($smof_data['pages_sidebar']);
    } else {
        $sidebar_1 = '';
    }

    if ($smof_data['pages_sidebar_2'] != 'None') {
        $sidebar_2 = array($smof_data['pages_sidebar_2']);
    } else {
        $sidebar_2 = '';
    }
}

if ((is_array($sidebar_1) && ($sidebar_1[0] || $sidebar_1[0] === '0')) && (is_array($sidebar_2) && ($sidebar_2[0] || $sidebar_2[0] === '0'))) {
    $double_sidebars = true;
}

if (is_array($sidebar_1) &&
    ($sidebar_1[0] || $sidebar_1[0] === '0')
) {
    $sidebar_exists = true;
} else {
    $sidebar_exists = false;
}

if (!$sidebar_exists) {
    $content_css = 'width:100%';
    $sidebar_css = 'display:none';
    $sidebar_exists = false;
} elseif (get_post_meta($post->ID, 'pyre_sidebar_position', true) == 'left') {
    $content_css = 'float:right;';
    $sidebar_css = 'float:left;';
    $sidebar_left = 1;
} elseif (get_post_meta($post->ID, 'pyre_sidebar_position', true) == 'right') {
    $content_css = 'float:left;';
    $sidebar_css = 'float:right;';
} elseif (get_post_meta($post->ID, 'pyre_sidebar_position', true) == 'default' || !metadata_exists('post', $post->ID, 'pyre_sidebar_position')) {
    if ($smof_data['default_sidebar_pos'] == 'Left') {
        $content_css = 'float:right;';
        $sidebar_css = 'float:left;';
        $sidebar_left = 1;
    } elseif ($smof_data['default_sidebar_pos'] == 'Right') {
        $content_css = 'float:left;';
        $sidebar_css = 'float:right;';
        $sidebar_left = 2;
    }
}

if (get_post_meta($post->ID, 'pyre_sidebar_position', true) == 'right') {
    $sidebar_left = 2;
}

if ($smof_data['pages_global_sidebar'] || (class_exists('TribeEvents') && is_events_archive())) {
    if ($smof_data['pages_sidebar'] != 'None') {
        $sidebar_1 = $smof_data['pages_sidebar'];

        if ($smof_data['default_sidebar_pos'] == 'Right') {
            $content_css = 'float:left;';
            $sidebar_css = 'float:right;';
            $sidebar_left = 2;
        } else {
            $content_css = 'float:right;';
            $sidebar_css = 'float:left;';
            $sidebar_left = 1;
        }
    }

    if ($smof_data['pages_sidebar_2'] != 'None') {
        $sidebar_2 = $smof_data['pages_sidebar_2'];
    }

    if ($smof_data['pages_sidebar'] != 'None' && $smof_data['pages_sidebar_2'] != 'None') {
        $double_sidebars = true;
    }
} else {
    $sidebar_1 = '0';
    $sidebar_2 = '0';
}

if ($double_sidebars == true) {
    $content_css = 'float:left;';
    $sidebar_css = 'float:left;';
    $sidebar_2_css = 'float:left;';
} else {
    $sidebar_left = 1;
}

if (class_exists('Woocommerce')) {
    if (is_cart() || is_checkout() || is_account_page() || (get_option('woocommerce_thanks_page_id') && is_page(get_option('woocommerce_thanks_page_id')))) {
        $content_css = 'width:100%';
        $sidebar_css = 'display:none';
        $sidebar_exists = false;
    }
}
?>
    <div id="content" style="<?php echo $content_css; ?>">
        <?php
        if (have_posts()): the_post();
            ?>
            <div id="post-122" class="post-122 page type-page status-publish hentry">
                <span class="entry-title"
                      style="display: none;">Free Video: Reveals How ‘Kids’ In their twenties are earning $2000 Per WEEK!</span><span class="vcard"
                                                                                                                                      style="display: none;"><span
                        class="fn"><a href="http://mcaprotools.com.localhost/author/ptadmin/" title="Posts by MCAPT Admin" rel="author">MCAPT
                            Admin</a></span></span><span class="updated" style="display:none;">2015-08-05T14:03:56+00:00</span>

                <div class="post-content">
                    <script type="text/javascript">
                        jQuery(document).ready(function ($) {

                            var ref = $.cookie('affwp_ref');
                            var visit = $.cookie('affwp_ref_visit_id');

                            // If a referral var is present and a referral cookie is not already set
                            if (ref && visit) {

                                // Fire an ajax request to log the hit
                                $.ajax({
                                    type: "POST",
                                    data: {
                                        action: 'affwp_track_conversion',
                                        affiliate: ref,
                                        amount: '$0.00',
                                        status: 'pending',
                                        description: 'Has not paid for MCA, but has opted in to receive more information!',
                                        context: '',
                                        reference: '',
                                        campaign: '',
                                        md5: '450a318153354eb2239113b389423376'
                                    },
                                    url: affwp_scripts.ajaxurl,
                                    success: function (response) {
                                        if (window.console && window.console.log) {
                                            console.log(response);
                                        }
                                    }

                                }).fail(function (response) {
                                    if (window.console && window.console.log) {
                                        console.log(response);
                                    }
                                }).done(function (response) {
                                });

                            }

                        });
                    </script>
                    <h2 style="font-size: 50px!important;"><img class="size-full wp-image-958"
                                                                src="http://mcaprotools.s3-us-west-2.amazonaws.com/wp-content/uploads/2015/02/stop_and_watch21.png"
                                                                alt="stop_and_watch2" width="200" height="65"
                                                                srcset="http://mcaprotools.com/wp-content/uploads/2015/02/stop_and_watch21.png 200w, http://mcaprotools.com/wp-content/uploads/2015/02/stop_and_watch21-100x33.png 100w, http://mcaprotools.com/wp-content/uploads/2015/02/stop_and_watch21-120x39.png 120w"
                                                                sizes="(max-width: 200px) 100vw, 200px"> You’re Going To Want To Watch This!</h2>

                    <div class="su-row">
                        <div style="float: left" class="su-column su-column-size-3-5 mca-2kperweek-video">
                            <div class="su-column-inner su-clearfix">
                                <div class="videoWrapper">
                                    <div class="wistia_responsive_padding" style="padding:56.25% 0 0 0;position:relative;">
                                        <div class="wistia_responsive_wrapper" style="height:100%;left:0;position:absolute;top:0;width:100%;">
                                            <div class="wistia_video_foam_dummy" data-source-container-id=""
                                                 style="border: 0px; display: block; height: 0px; margin: 0px; padding: 0px; position: static; visibility: hidden; width: auto;"></div>
                                            <div class="wistia_video_foam_dummy" data-source-container-id=""
                                                 style="border: 0px; display: block; height: 0px; margin: 0px; padding: 0px; position: static; visibility: hidden; width: auto;"></div>
                                            <iframe src="//fast.wistia.net/embed/iframe/0tx76zoest?seo=false&amp;videoFoam=true"
                                                    allowtransparency="true" frameborder="0" scrolling="no" class="wistia_embed" name="wistia_embed"
                                                    allowfullscreen="allowfullscreen" mozallowfullscreen="mozallowfullscreen"
                                                    webkitallowfullscreen="webkitallowfullscreen" oallowfullscreen="oallowfullscreen"
                                                    msallowfullscreen="msallowfullscreen" width="600" height="338"
                                                    style="width: 600px; height: 338px;"></iframe>
                                        </div>
                                    </div>
                                    <script src="//fast.wistia.net/assets/external/E-v1.js" async=""></script>
                                </div>
                            </div>
                        </div>
                        <div style="float: right" class="su-column su-column-size-2-5 mca-2kperweek-desc">
                            <div class="su-column-inner su-clearfix">
                                <h2>ARE YOU READY?</h2>

                                <p>See How You Can Earn Upwards of $2,080 Per Week While You’re on Vacation With Your Family…</p>

                                <p class="smaller">*Enter Your Email Below to Watch the FREE Video*</p>

                                <form method="post" class="af-form-wrapper" accept-charset="UTF-8" action="https://www.aweber.com/scripts/addlead.pl">
                                    <textarea style="display:none;" name="listname">awlist3813448</textarea>
                                    <textarea style="display:none;"
                                              name="redirect"
                                              id="redirect_ec539077ddfbfd0ed6a1a4e4f7bb8862">http://mcaprotools.com/whatismca/?ref=<?php if (isset($_GET['ref'])) echo $_GET['ref']; ?></textarea><input
                                        type="hidden" name="meta_required" value="email"><br>
                                    <input class="input-email" name="email" type="text" placeholder="Email Address*">

                                    <p></p>

                                    <div class="btn-mca-send-video">
                                        <a style="display: inline-block" href="http://mcaprotools.com"
                                           class="su-button su-button-style-default"
                                           style="color:#FFFFFF;background-color:#2D89EF;border-color:#246ebf;border-radius:5px;-moz-border-radius:5px;-webkit-border-radius:5px"
                                           target="_self"><span
                                                style="color:#FFFFFF;padding:0px 16px;font-size:13px;line-height:26px;border-color:#6cacf4;border-radius:5px;-moz-border-radius:5px;-webkit-border-radius:5px;text-shadow:none;-moz-text-shadow:none;-webkit-text-shadow:none">  <input
                                                    type="image" class="alignnone size-full wp-image-450"
                                                    src="http://mcaprotools.com/wp-content/uploads/2015/02/send_me_video.png" alt="send_me_video"
                                                    width="304" height="74"> </span></a></div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
<?php if ($sidebar_exists == true): ?>
    <?php wp_reset_query(); ?>
    <div id="sidebar" class="sidebar" style="<?php echo $sidebar_css; ?>">
        <?php
        if ($sidebar_left == 1) {
            generated_dynamic_sidebar($sidebar_1);
        }
        if ($sidebar_left == 2) {
            generated_dynamic_sidebar_2($sidebar_2);
        }
        ?>
    </div>
    <?php if ($double_sidebars == true): ?>
        <div id="sidebar-2" class="sidebar" style="<?php echo $sidebar_2_css; ?>">
            <?php
            if ($sidebar_left == 1) {
                generated_dynamic_sidebar_2($sidebar_2);
            }
            if ($sidebar_left == 2) {
                generated_dynamic_sidebar($sidebar_1);
            }
            ?>
        </div>
    <?php endif; ?>
<?php endif; ?>
<?php get_footer(); ?>