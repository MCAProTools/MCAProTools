<?php get_header(); ?>
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
            <div id="post-6" class="post-6 page type-page status-publish hentry">
                <span class="entry-title" style="display: none;">Dashboard</span><span class="vcard" style="display: none;"><span class="fn"><a
                            href="http://mcaprotools.com/author/ptadmin/" title="Posts by MCAPT Admin" rel="author">MCAPT Admin</a></span></span><span
                    class="updated" style="display:none;">2017-02-02T20:40:38+00:00</span>

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
                                        amount: '20',
                                        status: 'paid',
                                        description: 'User Has Access To Dashoard',
                                        context: 'dashboard',
                                        reference: '',
                                        campaign: '',
                                        md5: '1a00f1c5c1abbe1c74cd1eb88d12c582'
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
                    <p><strong>THIS IS DASHBOARD PAGE NOT TRAINING PAGE</strong></p>

                    <h1 style="border: 4px dashed #cc0000; padding: 15px; margin-bottom: 25px;"><span style="color: #cc0000;"><strong>BEFORE YOU CAN
                                ACCESS</strong></span> ANY OF THE MARKETING &amp; RESOURCES, <strong>YOU MUST</strong>…</h1>

                    <p><img class="alignnone size-full wp-image-384" src="http://mcaprotools.com/wp-content/uploads/2015/02/stop_and_watch.png"
                            alt="stop_and_watch" width="734" height="62"
                            srcset="http://mcaprotools.com/wp-content/uploads/2015/02/stop_and_watch.png 734w, http://mcaprotools.com/wp-content/uploads/2015/02/stop_and_watch-300x25.png 300w, http://mcaprotools.com/wp-content/uploads/2015/02/stop_and_watch-100x8.png 100w, http://mcaprotools.com/wp-content/uploads/2015/02/stop_and_watch-120x10.png 120w, http://mcaprotools.com/wp-content/uploads/2015/02/stop_and_watch-500x42.png 500w"
                            sizes="(max-width: 734px) 100vw, 734px"></p>

                    <div class="videoWrapper">
                        <script charset="ISO-8859-1" src="//fast.wistia.com/assets/external/E-v1.js" async=""></script>
                        <p></p>

                        <div class="wistia_responsive_padding" style="padding: 56.25% 0 0 0; position: relative;">
                            <div class="wistia_responsive_wrapper" style="height: 100%; left: 0; position: absolute; top: 0; width: 100%;">
                                <div class="wistia_video_foam_dummy" data-source-container-id="wistia-uhlwxulpnc-1"
                                     style="border: 0px; display: block; height: 0px; margin: 0px; padding: 0px; position: static; visibility: hidden; width: auto;"></div>
                                <div class="wistia_embed wistia_async_uhlwxulpnc videoFoam=true wistia_embed_initialized"
                                     style="height: 439px; width: 781px;" id="wistia-uhlwxulpnc-1">
                                    <div id="wistia_chrome_12" class="w-chrome" tabindex="0" aria-label="Wistia Video Player - MCAProTool Dashboard"
                                         style="display: inline-block; height: 439px; margin: 0px; padding: 0px; position: relative; vertical-align: top; width: 781px; zoom: 1; outline: none; overflow: hidden; box-sizing: content-box;">
                                        <div id="wistia_grid_21_wrapper" style="display: block; width: 781px; height: 439px;">
                                            <div id="wistia_grid_21_above" style="height: 0px; font-size: 0px; line-height: 0px;"></div>
                                            <div id="wistia_grid_21_main" style="width: 781px; left: 0px; height: 439px; margin-top: 0px;">
                                                <div id="wistia_grid_21_behind"></div>
                                                <div id="wistia_grid_21_center" style="width: 100%; height: 100%;">
                                                    <div id="wistia_video_wrapper_44"
                                                         style="display: inline-block; height: 100%; margin: 0px; padding: 0px; position: relative; vertical-align: top; width: 100%; zoom: 1; overflow: hidden;">
                                                        <div id="wistia_20_vulcan" class="bp-750"
                                                             style="background: rgb(0, 0, 0); display: block; height: 100%; overflow: hidden; position: relative; width: 100%;">
                                                            <video id="wistia_simple_video_25" crossorigin="anonymous" preload="metadata"
                                                                   type="video/mp4" poster="http://fast.wistia.com/assets/images/blank.gif"
                                                                   style="background: transparent; display: block; height: 100%; position: static; visibility: visible; width: 100%; object-fit: contain;">
                                                                <source
                                                                    src="http://embed.wistia.com/deliveries/9b40291cdfe7c4f8df74a4ecb1c8e9d842851b92/file.mp4"
                                                                    type="video/mp4">
                                                            </video>
                                                            <div class="w-control-bar w-is-visible w-is-not-transitioning">
                                                                <div class="w-control-bar__region w-control-bar__region--left">
                                                                    <button id="wistia_smallPlayButton_83"
                                                                            class="w-control w-control--play paused w-is-visible" alt="Click to play"
                                                                            tabindex="0" aria-label="Play" title="Play" style="position: relative;">
                                                                        <div class="w-control--icon">
                                                                            <svg version="1.1" xmlns="http://www.w3.org/2000/svg"
                                                                                 xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                                                 viewBox="0 0 10 14.3" enable-background="new 0 0 10 14.3"
                                                                                 xml:space="preserve"
                                                                                 class="wistia_vulcan_svg_icon wistia_vulcan_svg_icon_play wistia_vulcan_svg_icon_play_small">
<polygon points="0,0 0,14.3 10,7.5 "></polygon>
</svg>
                                                                        </div>
                                                                    </button>
                                                                </div>
                                                                <div class="w-control-bar__region w-control-bar__region--center">
                                                                    <div class="w-control-bar__region w-control-bar__region--thumbscrubber">
                                                                        <div class="w-chapter-title" style="left: 0px;"></div>
                                                                    </div>
                                                                    <div id="wistia_playbarControl_100"
                                                                         class="w-control wistia_playbar w-control--playbar w-is-visible"
                                                                         alt="Playbar - click to seek">
                                                                        <div class="w-control--icon"></div>
                                                                        <div id="wistia_playbar_mask_102" class="wistia_playbar_mask" tabindex="0"
                                                                             role="slider" aria-label="playbar" aria-valuenow="0:00">
                                                                            <div id="time_positioner_109" class="wistia_time_positioner"
                                                                                 style="width: 0px;">
                                                                                <div id="time_110" class="wistia_time"
                                                                                     style="right: auto; left: 9px;">2:02
                                                                                </div>
                                                                            </div>
                                                                            <div id="wistia_playbar_slider_103" class="wistia_playbar_slider"
                                                                                 style="transform: translateX(-50%);">
                                                                                <div id="wistia_playbar_completed_104"
                                                                                     class="wistia_playbar_completed"></div>
                                                                                <div id="wistia_playbar_unplayed_mask_105"
                                                                                     class="wistia_playbar_unplayed_mask">
                                                                                    <div id="wistia_playbar_unplayed_slider_106"
                                                                                         class="wistia_playbar_unplayed_slider"
                                                                                         style="transform: translateX(-50%);">
                                                                                        <div id="wistia_playbar_buffered_107"
                                                                                             class="wistia_playbar_buffered"></div>
                                                                                        <div id="wistia_playbar_background_108"
                                                                                             class="wistia_playbar_background"></div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div id="wistia_hover_line111" class="wistia_playbar_hover_line"
                                                                                 style="left: 97.1217%;"></div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="w-control-bar__region w-control-bar__region--centerMobile">
                                                                    <div id="wistia_playbarPlaceholder_115"
                                                                         class="w-control wistia_playbar_placeholder w-control--playbar-placeholder w-playbar-placeholder w-is-visible">
                                                                        <div class="w-control--icon"></div>
                                                                        <div class="wistia_placeholder_time_element wistia_time">2:02</div>
                                                                    </div>
                                                                </div>
                                                                <div class="w-control-bar__region w-control-bar__region--right">
                                                                    <div class="w-control-bar__region w-control-bar__region--captions"></div>
                                                                    <div class="w-control-bar__region w-control-bar__region--volume">
                                                                        <div id="wistia_volume2_85"
                                                                             class="w-control w-control--volume w-is-visible number-active-2"
                                                                             style="position: relative;"
                                                                             alt="Volume (100%) - click and drag horizontally to change">
                                                                            <button class="w-control--icon" tabindex="0" aria-label="Mute"
                                                                                    title="Mute" style="background: none; cursor: pointer;">
                                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                                     xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1"
                                                                                     class="wistia_vulcan_svg wistia_vulcan_svg_volume" x="0px"
                                                                                     y="0px" viewBox="0 0 20.3 17.3"
                                                                                     style="enable-background:new 0 0 20.3 17.3;"
                                                                                     xml:space="preserve">
  <g class="wistia_vulcan_svg_volume_speaker_group">
      <g class="wistia_vulcan_svg_volume_speaker_group_inner">
          <polygon class="wistia_vulcan_svg_volume_speaker" fill="#FFFFFF" points="4,7 0,7 0,11 4,11 8,15 8,3"></polygon>
          <g class="wistia_vulcan_svg_volume_waves">
              <path class="wistia_vulcan_svg_volume_wave wistia_vulcan_svg_wave_1" stroke-width="2px" stroke-linecap="round" stroke-miterlimit="10"
                    d="M13.2,3.5c0,0,1.1,2.5,1.1,5s-1.1,5-1.1,5" fill="none" stroke="#ffffff"></path>
              <path class="wistia_vulcan_svg_volume_wave wistia_vulcan_svg_wave_2" stroke-width="2px" stroke-linecap="round" stroke-miterlimit="10"
                    d="M17,1c0,0,1.7,3.8,1.7,7.5S17,16,17,16" fill="none" stroke="#ffffff"></path>
              <g class="wistia_vulcan_svg_volume_x wistia_vulcan_svg_volume_wave">

                  <path fill="#ffffff" stroke-width="2px" stroke-linecap="round" stroke-miterlimit="10"
                        d="M11.4,11.4c-0.1,0-0.3,0-0.4-0.1c-0.2-0.2-0.2-0.5,0-0.7l4.3-4.3c0.2-0.2,0.5-0.2,0.7,0 c0.2,0.2,0.2,0.5,0,0.7l-4.3,4.3C11.6,11.4,11.5,11.4,11.4,11.4z"></path>
                  <path fill="#ffffff" stroke-width="2px" stroke-linecap="round" stroke-miterlimit="10"
                        d="M15.7,11.4c-0.1,0-0.3,0-0.4-0.1L11,7c-0.2-0.2-0.2-0.5,0-0.7s0.5-0.2,0.7,0l4.3,4.3c0.2,0.2,0.2,0.5,0,0.7,C15.9,11.4,15.8,11.4,15.7,11.4z"></path>
              </g>
          </g>
      </g>
  </g>
</svg>
                                                                            </button>
                                                                            <div class="wistia_vulcan_volume_slider" tabindex="0"
                                                                                 aria-label="Volume Slider" aria-valuemin="0" aria-valuemax="100"
                                                                                 role="slider" style="bottom: 34px;">
                                                                                <div class="wistia_vulcan_volume_track_hit">
                                                                                    <div class="wistia_vulcan_volume_track">
                                                                                        <div class="wistia_vulcan_volume_level" style="height: 80px;">
                                                                                            <div class="wistia_vulcan_volume_grabber_hit">
                                                                                                <div class="wistia_vulcan_volume_grabber">
                                                                                                    <div
                                                                                                        class="wistia_vulcan_volume_dot_grabber"></div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="w-control-bar__region w-control-bar__region--share"></div>
                                                                    <div class="w-control-bar__region w-control-bar__region--settings">
                                                                        <div class="w-component w-component--settings">
                                                                            <div>
                                                                                <div class="w-menu w-menu--share" style="left: -40px;">
                                                                                    <ul class="w-menu__list">
                                                                                        <li class="w-menu__list-item w-menu__list-item--Speed">
                                                                                            <button tabindex="-1" class="w-menu__section-title"
                                                                                                    title="Speed" alt="Speed" aria-label="Speed">
                                                                                                <div class="w-menu__section-title_label">Speed</div>
                                                                                                <div class="w-menu__section-title_value">1x</div>
                                                                                            </button>
                                                                                            <div class="w-menu__collapsable-wrapper"
                                                                                                 style="height: 0px;">
                                                                                                <ul class="w-menu__list w-menu__list--collapsable w-is-transitioned">
                                                                                                    <li class="w-menu__list-item">
                                                                                                        <button tabindex="-1"
                                                                                                                class="w-menu__list-link w-menu__list-link--checkable"
                                                                                                                data-optionkey="0.5" title="0.5x"
                                                                                                                alt="0.5x" aria-label="0.5x">0.5x
                                                                                                        </button>
                                                                                                    </li>
                                                                                                    <li class="w-menu__list-item">
                                                                                                        <button tabindex="-1"
                                                                                                                class="w-menu__list-link w-menu__list-link--checkable is-checked"
                                                                                                                data-optionkey="1" title="1x" alt="1x"
                                                                                                                aria-label="1x">1x
                                                                                                        </button>
                                                                                                    </li>
                                                                                                    <li class="w-menu__list-item">
                                                                                                        <button tabindex="-1"
                                                                                                                class="w-menu__list-link w-menu__list-link--checkable"
                                                                                                                data-optionkey="1.25" title="1.25x"
                                                                                                                alt="1.25x" aria-label="1.25x">1.25x
                                                                                                        </button>
                                                                                                    </li>
                                                                                                    <li class="w-menu__list-item">
                                                                                                        <button tabindex="-1"
                                                                                                                class="w-menu__list-link w-menu__list-link--checkable"
                                                                                                                data-optionkey="1.5" title="1.5x"
                                                                                                                alt="1.5x" aria-label="1.5x">1.5x
                                                                                                        </button>
                                                                                                    </li>
                                                                                                    <li class="w-menu__list-item">
                                                                                                        <button tabindex="-1"
                                                                                                                class="w-menu__list-link w-menu__list-link--checkable"
                                                                                                                data-optionkey="1.75" title="1.75x"
                                                                                                                alt="1.75x" aria-label="1.75x">1.75x
                                                                                                        </button>
                                                                                                    </li>
                                                                                                    <li class="w-menu__list-item">
                                                                                                        <button tabindex="-1"
                                                                                                                class="w-menu__list-link w-menu__list-link--checkable"
                                                                                                                data-optionkey="2" title="2x" alt="2x"
                                                                                                                aria-label="2x">2x
                                                                                                        </button>
                                                                                                    </li>
                                                                                                    <li tabindex="-1"
                                                                                                        data-tabto=".w-menu__list-item--Quality button"
                                                                                                        class="w-menu__list-item"></li>
                                                                                                </ul>
                                                                                            </div>
                                                                                        </li>
                                                                                        <li class="w-menu__list-item w-menu__list-item--Quality">
                                                                                            <button tabindex="-1" class="w-menu__section-title"
                                                                                                    title="Quality" alt="Quality"
                                                                                                    aria-label="Quality">
                                                                                                <div class="w-menu__section-title_label">Quality</div>
                                                                                                <div class="w-menu__section-title_value">540p</div>
                                                                                            </button>
                                                                                            <div class="w-menu__collapsable-wrapper"
                                                                                                 style="height: 0px;">
                                                                                                <ul class="w-menu__list w-menu__list--collapsable w-is-transitioned">
                                                                                                    <li class="w-menu__list-item">
                                                                                                        <button tabindex="-1"
                                                                                                                class="w-menu__list-link w-menu__list-link--checkable"
                                                                                                                data-optionkey="mp4_h264_314k"
                                                                                                                title="224p" alt="224p"
                                                                                                                aria-label="224p">224p
                                                                                                        </button>
                                                                                                    </li>
                                                                                                    <li class="w-menu__list-item">
                                                                                                        <button tabindex="-1"
                                                                                                                class="w-menu__list-link w-menu__list-link--checkable"
                                                                                                                data-optionkey="mp4_h264_1018k"
                                                                                                                title="360p" alt="360p"
                                                                                                                aria-label="360p">360p
                                                                                                        </button>
                                                                                                    </li>
                                                                                                    <li class="w-menu__list-item">
                                                                                                        <button tabindex="-1"
                                                                                                                class="w-menu__list-link w-menu__list-link--checkable"
                                                                                                                data-optionkey="mp4_h264_825k"
                                                                                                                title="540p" alt="540p"
                                                                                                                aria-label="540p">540p
                                                                                                        </button>
                                                                                                    </li>
                                                                                                    <li class="w-menu__list-item">
                                                                                                        <button tabindex="-1"
                                                                                                                class="w-menu__list-link w-menu__list-link--checkable"
                                                                                                                data-optionkey="mp4_h264_1312k"
                                                                                                                title="720p" alt="720p"
                                                                                                                aria-label="720p">720p
                                                                                                        </button>
                                                                                                    </li>
                                                                                                    <li class="w-menu__list-item">
                                                                                                        <button tabindex="-1"
                                                                                                                class="w-menu__list-link w-menu__list-link--checkable"
                                                                                                                data-optionkey="mp4_h264_1909k"
                                                                                                                title="1080p" alt="1080p"
                                                                                                                aria-label="1080p">1080p
                                                                                                        </button>
                                                                                                    </li>
                                                                                                    <li tabindex="-1"
                                                                                                        data-tabto=".w-menu__list-item--close-settings"
                                                                                                        class="w-menu__list-item"></li>
                                                                                                </ul>
                                                                                            </div>
                                                                                        </li>
                                                                                        <li tabindex="-1" data-tabto=".w-control--settings"
                                                                                            class="w-menu__list-item w-menu__list-item--close-settings"></li>
                                                                                    </ul>
                                                                                </div>
                                                                                <button class="w-control w-control--settings w-is-visible"
                                                                                        title="Settings" alt="Settings" tabindex="0"
                                                                                        aria-label="Settings">
                                                                                    <div class="w-control--icon">
                                                                                        <svg x="0px" y="0px" viewBox="0 0 19 19"
                                                                                             enable-background="new 0 0 19 19"
                                                                                             class="wistia_vulcan_svg_icon wistia_vulcan_svg_icon_settings">
                                                                                            <path
                                                                                                d="M17.8,8.8h-2c-0.2-1-0.5-2-1-2.7l1.4-1.5c0.5-0.5,0.5-1.3,0-1.7c-0.5-0.5-1.2-0.5-1.7,0l-1.5,1.4 c-0.7-0.5-1.5-0.8-2.5-1v-2c0-0.7-0.3-1.2-1-1.2s-1,0.5-1,1.2v2.1c-1,0.2-1.8,0.5-2.5,1L4.5,2.8c-0.5-0.5-1.2-0.5-1.7,0 S2.3,4,2.8,4.5l1.5,1.8c-0.5,0.7-0.8,1.6-1,2.6H1.2C0.5,8.8,0,9.2,0,9.8s0.5,1,1.2,1h2.1c0.2,1,0.5,1.6,1,2.3l-1.5,1.4 c-0.5,0.5-0.5,1.2,0,1.7c0.2,0.2,0.5,0.3,0.8,0.3s0.6-0.1,0.8-0.4l1.6-1.5c0.7,0.5,1.5,0.8,2.5,1v2.1c0,0.7,0.3,1.2,1,1.2 s1-0.5,1-1.2v-2c1-0.2,1.8-0.5,2.5-1l1.4,1.4c0.2,0.2,0.5,0.3,0.9,0.3s0.6-0.1,0.8-0.3c0.5-0.5,0.5-1.2,0-1.7l-1.4-1.3 c0.5-0.7,0.9-1.4,1-2.4h2c0.7,0,1.2-0.3,1.2-1S18.5,8.8,17.8,8.8z M9.6,14.1C7,14.1,5,12,5,9.5S7,4.9,9.6,4.9s4.6,2.1,4.6,4.6 S12.1,14.1,9.6,14.1z"></path>
                                                                                        </svg>
                                                                                    </div>
                                                                                </button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="w-control-bar__region w-control-bar__region--airplay">
                                                                        <button id="wistia_airplayButton_86" class="w-control w-control--fullscreen"
                                                                                alt="Airplay" tabindex="0" aria-label="Airplay" title="Airplay"
                                                                                style="position: relative; user-select: none;">
                                                                            <div class="w-control--icon">
                                                                                <svg width="40px" height="34px" viewBox="0 0 40 34" version="1.1"
                                                                                     xmlns="http://www.w3.org/2000/svg"
                                                                                     xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                                     class="wistia_vulcan_svg_icon wistia_vulcan_svg_icon_airplay">
                                                                                    <g stroke="none" fill="none">
                                                                                        <polyline stroke="#000000" stroke-width="2"
                                                                                                  points="14.52 23 9 23 9 10 32 10 32 23 26.48 23"></polyline>
                                                                                        <polygon fill="#000000"
                                                                                                 points="20.5 20 25.5 26 15.5 26"></polygon>
                                                                                    </g>
                                                                                </svg>
                                                                            </div>
                                                                        </button>
                                                                    </div>
                                                                    <div class="w-control-bar__region w-control-bar__region--chromecast">
                                                                        <div id="wistia_undefined_93" class="w-control w-control--fullscreen"
                                                                             alt="Chromecast" tabindex="0" aria-label="Chromecast" title="Chromecast"
                                                                             style="position: relative; user-select: none;">
                                                                            <div class="w-control--icon">
                                                                                <svg class="wistia_vulcan_svg_icon_chromecast" width="40px"
                                                                                     height="34px" viewBox="0 0 40 34" version="1.1">
                                                                                    <defs></defs>
                                                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                                        <g>
                                                                                            <g transform="translate(8.000000, 5.000000)">
                                                                                                <path
                                                                                                    d="M1,18 L1,21 L4,21 C4,19.34 2.66,18 1,18 L1,18 Z M1,14 L1,16 C3.76,16 6,18.24 6,21 L8,21 C8,17.13 4.87,14 1,14 L1,14 Z M1,10 L1,12 C5.97,12 10,16.03 10,21 L12,21 C12,14.92 7.07,10 1,10 L1,10 Z M21,3 L3,3 C1.9,3 1,3.9 1,5 L1,8 L3,8 L3,5 L21,5 L21,19 L14,19 L14,21 L21,21 C22.1,21 23,20.1 23,19 L23,5 C23,3.9 22.1,3 21,3 L21,3 Z"
                                                                                                    fill="#FFFFFF"></path>
                                                                                                <rect x="0" y="0" width="24" height="24"></rect>
                                                                                            </g>
                                                                                        </g>
                                                                                    </g>
                                                                                </svg>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="w-control-bar__region w-control-bar__region--chapters">
                                                                        <div>
                                                                            <nothing></nothing>
                                                                        </div>
                                                                    </div>
                                                                    <div class="w-control-bar__region w-control-bar__region--fullscreen">
                                                                        <button id="wistia_fullscreenButton_94"
                                                                                class="w-control w-control--fullscreen w-is-visible"
                                                                                alt="Fullscreen - click to toggle" tabindex="0"
                                                                                aria-label="Fullscreen" title="Fullscreen"
                                                                                style="position: relative; user-select: none;">
                                                                            <div class="w-control--icon">
                                                                                <svg version="1.1" xmlns="http://www.w3.org/2000/svg"
                                                                                     xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                                                     viewBox="0 0 27.5 19.5" enable-background="new 0 0 27.5 19.5"
                                                                                     xml:space="preserve"
                                                                                     class="wistia_vulcan_svg_icon wistia_vulcan_svg_icon_fullscreen">
  <g>
      <polyline fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10"
                points="26.8,5.1 26.8,0.8 20.5,0.8"></polyline>
      <polyline fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10"
                points="7,0.8 0.7,0.8 0.7,5.1"></polyline>
      <polyline fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10"
                points="20.5,18.8 26.8,18.8 26.8,14.4	"></polyline>
      <polyline fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10"
                points="0.7,14.4 0.7,18.8 7,18.8"></polyline>
  </g>
                                                                                    <rect x="5.8" y="4.8" fill="none" stroke="#000000"
                                                                                          stroke-width="2" stroke-linecap="round"
                                                                                          stroke-linejoin="round" stroke-miterlimit="10" width="16"
                                                                                          height="10"></rect>
</svg>
                                                                            </div>
                                                                        </button>
                                                                    </div>
                                                                    <div class="w-control-bar__region w-control-bar__region--branding"></div>
                                                                    <div></div>
                                                                </div>
                                                            </div>
                                                            <div class="w-menu-bar w-is-visible"></div>
                                                            <div class="w-icon-rail">
                                                                <div class="w-control-bar__region w-control-bar__region--iconRail">
                                                                    <nothing></nothing>
                                                                </div>
                                                            </div>
                                                            <div id="wistia_66.thumbnail" tabindex="-1"
                                                                 style="cursor: default; display: block; height: 439px; overflow: hidden; outline: none; position: absolute; width: 781px; left: 0px; top: 0px;">
                                                                <img id="wistia_66.thumbnail_img" alt="Wistia video thumbnail - MCAProTool Dashboard"
                                                                     src="http://embed.wistia.com/deliveries/b9a68d16744e96172bf878c0a26f317b1d1523b8.jpg?image_crop_resized=960x540"
                                                                     style="border: 0px solid rgb(0, 0, 0); display: block; float: none; height: 439px; margin: 0px; max-height: none; max-width: none; padding: 0px; position: absolute; width: 781px; left: 0px; top: 0px;">
                                                            </div>
                                                            <div id="wistia_loading_116" class="w-control wistia-loading" style="top: 0px;">
                                                                <div class="wistia-loading__mask"></div>
                                                                <div class="wistia-loading__svg-position">
                                                                    <svg class="wistia-loading__svg" version="1.1" xmlns="http://www.w3.org/2000/svg"
                                                                         xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                                         viewBox="0 0 127 80" enable-background="new 0 0 127 80" xml:space="preserve">
    <polygon class="wistia-loading__polygon wl-d" points="63,30.3 63,49.7 66,47.7 66,32.3 "></polygon>
                                                                        <polygon class="wistia-loading__polygon wl-c"
                                                                                 points="63,30.3 60,28.2 60,51.8 62,50.4 63,49.7 63,30.3 "></polygon>
                                                                        <polygon class="wistia-loading__polygon wl-b"
                                                                                 points="57,26.1 57,53.9 60,51.8 60,28.2 "></polygon>
                                                                        <polygon class="wistia-loading__polygon wl-a"
                                                                                 points="54,24 54,56 57,53.9 57,26.1 "></polygon>
                                                                        <polygon class="wistia-loading__polygon wl-g"
                                                                                 points="73,37.2 72,36.5 72,43.5 73,42.8 75,41.4 75,38.6 "></polygon>
                                                                        <polygon class="wistia-loading__polygon wl-e"
                                                                                 points="66,32.3 66,47.7 69,45.6 69,34.4 "></polygon>
                                                                        <polygon class="wistia-loading__polygon wl-h"
                                                                                 points="75,38.6 75,41.4 77,40 "></polygon>
                                                                        <polygon class="wistia-loading__polygon wl-f"
                                                                                 points="69,34.4 69,45.6 72,43.5 72,36.5 "></polygon>
  </svg>
                                                                </div>
                                                            </div>
                                                            <div id="wistia_context_menu_117" class="w-control w-control--context-menu w-context-menu"
                                                                 style="background-color: rgb(255, 255, 255); box-shadow: rgba(0, 0, 0, 0.2) 0px 3px 10px; left: 0px; line-height: 1.5em; position: absolute; text-shadow: none; top: 0px; width: 200px; z-index: 100000;">
                                                                <a href="https://wistia.com/about-wistia?about=58973" target="_blank"
                                                                   class="w-context-menu__item w-is-visible aboutWistia w-context-menu__item--aboutWistia"
                                                                   style="display: block; text-decoration: none;">About Wistia</a><a href="#"
                                                                                                                                     class="w-context-menu__item w-is-visible reportAProblem w-context-menu__item--reportAProblem"
                                                                                                                                     style="display: block; text-decoration: none;">Report
                                                                    a problem</a></div>
                                                            <div class="w-tooltip w-tooltip--wistia_vulcan_storyboard"
                                                                 style="position: absolute; overflow: hidden; z-index: 13; width: 0px; height: 0px; bottom: 56px; right: 0px; left: 643.5px;">
                                                                <div class="wistia_vulcan_storyboard_view"
                                                                     style="position: absolute; color: rgb(255, 255, 255); overflow: hidden; width: 150px; height: 84px;">
                                                                    <div class="wistia_vulcan_storyboard_time"
                                                                         style="position: absolute; background: rgba(0, 0, 0, 0.34902); font-family: WistiaPlayerOverpass, sans-serif; padding: 2px 4px; color: rgb(255, 255, 255); z-index: 10; bottom: 0px; width: 100%; text-align: center;">
                                                                        1:59
                                                                    </div>
                                                                    <div
                                                                        style="display: block; position: absolute; overflow: hidden; top: 0px; right: 0px; bottom: 0px; left: 0px;">
                                                                        <div class="w-storyboard-viewer"
                                                                             style="position: relative; overflow: hidden; width: 150px; height: 84px;">
                                                                            <div class="w-storyboard-viewer__storyboard"
                                                                                 style="position: absolute; top: 0px; left: 0px; width: 200px; height: 112px; background-position: -600px -1596px; background-size: 1500px 1764px; background-image: url(&quot;http://embed.wistia.com/deliveries/fe87c32dfc5d3375048f30283c1116814d49fae1/file.jpg&quot;);"></div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="w-report-a-problem w-is-transparent w-is-hidden">
                                                                <div class="w-report-a-problem__centered-content">
                                                                    <div class="w-report-a-problem__form-content"><p>Thanks for reporting a problem.
                                                                            We'll attach technical data about this session to help us figure out the
                                                                            issue. Which of these best describes the problem?</p><select
                                                                            class="w-report-a-problem__category" title="Problem Category"
                                                                            aria-label="Problem Category">
                                                                            <option value="">Choose one</option>
                                                                            <option value="stuttering">Video plays but frequently stutters</option>
                                                                            <option value="low_quality">Video has poor quality</option>
                                                                            <option value="fails_to_play">Video fails to play</option>
                                                                            <option value="other">Other</option>
                                                                        </select>

                                                                        <p>Any other details or context?</p><textarea
                                                                            class="w-report-a-problem__description" title="Problem Description"
                                                                            aria-label="Problem Description"></textarea></div>
                                                                    <div class="w-report-a-problem__button-row">
                                                                        <div
                                                                            class="w-report-a-problem__form-feedback w-report-a-problem__form-feedback--blank"></div>
                                                                        <a href="#" class="w-report-a-problem__cancel">Cancel</a>
                                                                        <button class="w-report-a-problem__send">Send</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="w-status-bar">message</div>
                                                            <div data-testid="big-play-button">
                                                                <div data-testid="big-play-button__wrapper"
                                                                     style="position: absolute; top: 0px; bottom: 0px; left: 0px; right: 0px; z-index: 8; transition: all 100ms ease;">
                                                                    <div data-testid="big-play-button__contents"
                                                                         style="position: relative; display: table; height: 100%; width: 100%;">
                                                                        <div data-testid="big-play-button__vertically-centered-contents"
                                                                             style="position: relative; display: table-cell; vertical-align: middle;">
                                                                            <div data-testid="big-play-button__horizontally-centered-contents"
                                                                                 style="width: 127px; margin: auto;">
                                                                                <div data-testid="big-play-button__button"
                                                                                     style="cursor: pointer; background: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAP4AAACiCAYAAABh2nDdAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAulJREFUeNrs3d1tGlEQBtAlSgEpgXSAO8AdxB2QDuwONhWQDpxUAB14OyAdmA5IB+SOvDdCSHnLn/WdI91XP4z1aYY77DIMAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAMAvnc/nQzsrlYCs4JdTOxvVgKzgd7t23qkKZAW/PLezVhnICn43qg7kBb88tbNUJcgKfr/4+6BSkBX8buviD/KCf7bzh8zgd/cqB3nBt/OH0OD3i7+1KkJW8O38ITj4/eJvqaKQFXw7fwgNfvfo4i/PQgleV/D/0J8+tnO3WCy+qXKGN0pAU5/3D3b+Oj5ZHf/SNHf/7yqu45Nj3Y7n/AWfQHXZV4/5bpXCqE/GqH+tLvw+uvjT8cmymrv/Ril0fHI6/qX93P1d/Ak+QcEvx8HO36hPnOXwsvMflULHJ6fjX5oGO38dnzjr4WXn72EfwSdM7fx3XvBp1Cdn1L9m56/jE6jv/D3so+MT1PEv2fnr+ASqC7+Dh30EnzzLefQflcKoT8aof60u/Grnf/Sf1PHJsZpHfzt/wSfMz52/Ugg+WWrk/6oMgk+OL+3c+oLPv/dWCfgLapdfO/29Uuj4ZJjauRF6wSfHpxb4Wys8oz4ZjvNoPymFjk+G/TzaC73gE6Au8B5a4L2Rx6hPCM/h6/iE+dwCfyP0Oj45o73dvOATZBq8XdeoT5S+mxd6HZ8Ax8Ev6Oj4ROm7eaEXfAL0Czyf5436hPCqLB2fMH03L/Q6PiGj/Z3v2ev45Kiwvxd6wSfHg908/KfOv1+97nqlspAT/Ec/aw05wT/5UQvICn6N9kuVhJzgjyoIOcE/+alqyAr+zgUe5AS/uvy9ikFO8O3mISz4W6M95ATfbh7Cgv9kNw9ZwR9VBXKC/+wCD7KCbzcPYcHfqAIAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAvE4/BBgAB9Vp0xXzB8AAAAAASUVORK5CYII=&quot;) 0% 0% / 127px 81px rgba(123, 121, 106, 0.8); height: 81px; width: 127px;"></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="wistia_grid_21_front"></div>
                                                <div id="wistia_grid_21_top_inside">
                                                    <div id="wistia_grid_21_top" style="height: 0px; font-size: 0px; line-height: 0px;"></div>
                                                </div>
                                                <div id="wistia_grid_21_bottom_inside">
                                                    <div id="wistia_grid_21_bottom" style="height: 0px; font-size: 0px; line-height: 0px;"></div>
                                                </div>
                                                <div id="wistia_grid_21_left_inside">
                                                    <div id="wistia_grid_21_left" style="height: 0px; font-size: 0px; line-height: 0px;"></div>
                                                </div>
                                                <div id="wistia_grid_21_right_inside">
                                                    <div id="wistia_grid_21_right" style="height: 0px; font-size: 0px; line-height: 0px;"></div>
                                                </div>
                                            </div>
                                            <div id="wistia_grid_21_below" style="height: 0px; font-size: 0px; line-height: 0px;"></div>
                                            <style id="wistia_22_style" type="text/css" class="wistia_injected_style">#wistia_grid_21_wrapper {
                                                    -moz-box-sizing: content-box;
                                                    -webkit-box-sizing: content-box;
                                                    box-sizing: content-box;
                                                    font-family: Arial, sans-serif;
                                                    font-size: 14px;
                                                    height: 100%;
                                                    position: relative;
                                                    text-align: left;
                                                    width: 100%;
                                                }

                                                #wistia_grid_21_wrapper * {
                                                    -moz-box-sizing: content-box;
                                                    -webkit-box-sizing: content-box;
                                                    box-sizing: content-box;
                                                }

                                                #wistia_grid_21_above {
                                                    position: relative;
                                                }

                                                #wistia_grid_21_main {
                                                    display: block;
                                                    height: 100%;
                                                    position: relative;
                                                }

                                                #wistia_grid_21_behind {
                                                    height: 100%;
                                                    left: 0;
                                                    position: absolute;
                                                    top: 0;
                                                    width: 100%;
                                                }

                                                #wistia_grid_21_center {
                                                    height: 100%;
                                                    overflow: hidden;
                                                    position: relative;
                                                    width: 100%;
                                                }

                                                #wistia_grid_21_front {
                                                    display: none;
                                                    height: 100%;
                                                    left: 0;
                                                    position: absolute;
                                                    top: 0;
                                                    width: 100%;
                                                }

                                                #wistia_grid_21_top_inside {
                                                    position: absolute;
                                                    left: 0;
                                                    top: 0;
                                                    width: 100%;
                                                }

                                                #wistia_grid_21_top {
                                                    width: 100%;
                                                    position: absolute;
                                                    bottom: 0;
                                                    left: 0;
                                                }

                                                #wistia_grid_21_bottom_inside {
                                                    position: absolute;
                                                    left: 0;
                                                    bottom: 0;
                                                    width: 100%;
                                                }

                                                #wistia_grid_21_bottom {
                                                    width: 100%;
                                                    position: absolute;
                                                    top: 0;
                                                    left: 0;
                                                }

                                                #wistia_grid_21_left_inside {
                                                    height: 100%;
                                                    position: absolute;
                                                    left: 0;
                                                    top: 0;
                                                }

                                                #wistia_grid_21_left {
                                                    height: 100%;
                                                    position: absolute;
                                                    right: 0;
                                                    top: 0;
                                                }

                                                #wistia_grid_21_right_inside {
                                                    height: 100%;
                                                    right: 0;
                                                    position: absolute;
                                                    top: 0;
                                                }

                                                #wistia_grid_21_right {
                                                    height: 100%;
                                                    left: 0;
                                                    position: absolute;
                                                    top: 0;
                                                }

                                                #wistia_grid_21_below {
                                                    position: relative;
                                                }</style>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <p>&nbsp;</p>
                    <?php echo do_shortcode('[usercourses]'); ?>
                    <?php ?>
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