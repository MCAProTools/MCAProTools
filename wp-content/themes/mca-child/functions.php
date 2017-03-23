<?php
function avada_child_scripts()
{
    if (!is_admin() && !in_array($GLOBALS['pagenow'], array('wp-login.php', 'wp-register.php'))) {

        $theme_info = wp_get_theme();

        wp_enqueue_style('avada-child-stylesheet', get_template_directory_uri() . '/style.css', array(), $theme_info->get('Version'));
        //Bootstrap - Child
        wp_enqueue_style('avada-child-bootstrap', get_stylesheet_directory_uri() . '/assets/css/bootstrap.min.css', array(), $theme_info->get('Version'));
        //Landing Page Custom CSS - Child
        wp_enqueue_style('avada-child-custom', get_stylesheet_directory_uri() . '/assets/css/custom.css', array(), $theme_info->get('Version'));
        //Jenny's Custom CSS
        wp_enqueue_style('jenny-child-custom', get_stylesheet_directory_uri() . '/assets/css/jenny.css', array(), $theme_info->get('Version'));
        //Menchie's Custom CSS
        wp_enqueue_style('menchie-child-custom', get_stylesheet_directory_uri() . '/assets/css/menchie.css', array(), $theme_info->get('Version'));
        //Steve's Custom CSS
        wp_enqueue_style('steve-child-custom', get_stylesheet_directory_uri() . '/assets/css/steve.css', array(), $theme_info->get('Version'));
        wp_register_script("mca_save_user_information", get_stylesheet_directory_uri() . '/assets/js/mca_save_user_information.js', array('jquery'));
        wp_localize_script('mca_save_user_information', 'myAjax', array('ajaxurl' => admin_url('admin-ajax.php')));
        wp_enqueue_script('mca_save_user_information');
    }
}

add_action('wp_enqueue_scripts', 'avada_child_scripts');
/**
 * [affiliate_username_mca] shortcode
 * Outputs an anchor link with the currently tracked affiliate's username
 * https://gist.github.com/sumobi/3f3aef04e9c8d6798db7
 */
function affwp_custom_affiliate_username_mca_shortcode($atts, $content = null)
{
    $affiliate_id = affiliate_wp()->tracking->get_affiliate_id();
    if ($affiliate_id) {
        $affiliate = affwp_get_affiliate($affiliate_id);
        $user_info = get_userdata($affiliate->user_id);
    }
    // get the affiliate username and set a default if no affiliate is being tracked
    $affiliate_user_name = isset($user_info->mca_username) ? $user_info->mca_username : 'aberlin';
    $content = '<a class="yellow-button" href="http://' . $affiliate_user_name . '.mcaprotoools.com/join">I Don\'t Have A<br>MCA Account!</a>';
    return do_shortcode($content);
}

add_shortcode('affiliate_username', 'affwp_custom_affiliate_username_shortcode');
/**
 * [affiliate_referral_url_username] shortcode
 */
function affwp_custom_referral_url_shortcode($atts, $content = null)
{
    if (!affwp_is_affiliate()) {
        return;
    }
    shortcode_atts(array(
        'url' => ''
    ), $atts, 'affiliate_referral_url_username');
    if (!empty($content)) {
        $base = $content;
    } else {
        $base = !empty($atts['url']) ? $atts['url'] : home_url('/');
    }
    $affiliate = affwp_get_affiliate(affwp_get_affiliate_id());
    $user_info = get_userdata($affiliate->user_id);
    $affiliate_user_name = $user_info->user_login;
    return add_query_arg(affiliate_wp()->tracking->get_referral_var(), $affiliate_user_name, $base);
}

add_shortcode('affiliate_referral_url_username', 'affwp_custom_referral_url_shortcode');
/**
 * Force the frontend scripts to load on pages with these shortcodes
 */
function affwp_custom_force_frontend_scripts($ret)
{
    global $post;
    if (
        has_shortcode($post->post_content, 'affiliate_creatives') ||

        has_shortcode($post->post_content, 'affiliate_graphs') ||
        has_shortcode($post->post_content, 'affiliate_referrals') ||
        has_shortcode($post->post_content, 'affiliate_settings') ||
        has_shortcode($post->post_content, 'affiliate_stats') ||
        has_shortcode($post->post_content, 'affiliate_urls') ||
        has_shortcode($post->post_content, 'affiliate_visits')
    ) {
        $ret = true;
    }
    return $ret;
}

add_filter('affwp_force_frontend_scripts', 'affwp_custom_force_frontend_scripts');
/**
 * [affiliate_settings] shortcode
 */
function affwp_custom_affiliate_settings_shortcode($atts, $content = null)
{
    ob_start();
    echo '<div id="affwp-affiliate-dashboard">';
    affiliate_wp()->templates->get_template_part('dashboard-tab', 'settings');
    echo '</div>';
    $content = ob_get_clean();
    return $content;
}

add_shortcode('affiliate_settings', 'affwp_custom_affiliate_settings_shortcode');
/**
 * [affiliate_graphs] shortcode
 */
function affwp_custom_affiliate_graphs_shortcode($atts, $content = null)
{
    ob_start();
    echo '<div id="affwp-affiliate-dashboard">';
    affiliate_wp()->templates->get_template_part('dashboard-tab', 'graphs');
    echo '</div>';
    $content = ob_get_clean();
    return $content;
}

add_shortcode('affiliate_graphs', 'affwp_custom_affiliate_graphs_shortcode');
/**
 * [affiliate_referrals] shortcode
 */
function affwp_custom_affiliate_referrals_shortcode($atts, $content = null)
{
    ob_start();
    echo '<div id="affwp-affiliate-dashboard">';
    affiliate_wp()->templates->get_template_part('dashboard-tab', 'referrals');
    echo '</div>';
    $content = ob_get_clean();
    return $content;
}

add_shortcode('affiliate_referrals', 'affwp_custom_affiliate_referrals_shortcode');
/**
 * [affiliate_stats] shortcode
 */
function affwp_custom_affiliate_stats_shortcode($atts, $content = null)
{
    ob_start();
    echo '<div id="affwp-affiliate-dashboard">';
    affiliate_wp()->templates->get_template_part('dashboard-tab', 'stats');
    echo '</div>';
    $content = ob_get_clean();
    return $content;
}

add_shortcode('affiliate_referrals', 'affwp_custom_affiliate_stats_shortcode');
/**
 * [affiliate_urls_display] shortcode
 */
function affwp_custom_affiliate_urls_display_shortcode($atts, $content = null)
{
    ob_start();
    echo '<div id="affwp-affiliate-dashboard">';
    affiliate_wp()->templates->get_template_part('dashboard-tab', 'urls');
    echo '</div>';
    $content = ob_get_clean();
    return $content;
}

/**
 * [affiliate_creatives] shortcode
 */
function affwp_custom_affiliate_creatives_shortcode($atts, $content = null)
{
    ob_start();
    echo '<div id="affwp-affiliate-dashboard">';
    affiliate_wp()->templates->get_template_part('dashboard-tab', 'creatives');
    echo '</div>';
    $content = ob_get_clean();
    return $content;
}

add_shortcode('affiliate_creatives', 'affwp_custom_affiliate_creatives_shortcode');
/**
 * [affiliate_visits] shortcode
 */
function affwp_custom_affiliate_visits_shortcode($atts, $content = null)
{
    ob_start();
    echo '<div id="affwp-affiliate-dashboard">';
    affiliate_wp()->templates->get_template_part('dashboard-tab', 'visits');
    echo '</div>';
    $content = ob_get_clean();
    return $content;
}

add_shortcode('affiliate_visits', 'affwp_custom_affiliate_visits_shortcode');

// SENSEI
function start_course_text()
{
    return "Start This Course!";
}

add_action('sensei_start_course_text', 'start_course_text');
function complete_lesson_text()
{
    return "MARK LESSON COMPLETE!";
}

add_action('sensei_complete_lesson_text', 'complete_lesson_text');
function delete_course_text()
{
    return "RESET COURSE";
}

add_action('sensei_delete_course_text', 'delete_course_text');
require_once(get_stylesheet_directory() . '/widgets/sensei-navigation.php');
function user_lesson_complete()
{
    global $post;
    $lesson_ids = sensei_get_prev_next_lessons($post->ID);
    if ($lesson_ids['next_lesson'] != 0) {
        $next_url = get_permalink(absint($lesson_ids['next_lesson']));
        $message = 'You will get redirected to the next lesson in <span id="lesson-timer">0</span> second(s).';
    } else {
        // $course_ids = sensei_get_prev_next_courses( $post->ID );
        $post_args = array('post_type' => 'course',
            'orderby' => 'menu_order date',
            'order' => 'ASC',
            'post_status' => 'publish',
            'posts_per_page' => -1
        );

        $posts_array = get_posts($post_args);

        $lesson_course_id = get_post_meta($post->ID, '_lesson_course', true);

        $next_course = 0;
        $traininghubnext = 0;
        $next_course_found = false;

        foreach ($posts_array as $post_item) {
            if ($next_course == $lesson_course_id) {
                $next_course = $post_item->ID;
                $next_course_found = true;
                $course_name_display = $post_item->post_title;
                break;
            } else {
                $next_course = $post_item->ID;
            }
        }

        if (!$next_course_found)
            $next_course = 0;

        if ($next_course != 0) {
            $next_url = get_permalink(absint($next_course));
            $message = 'You will get redirected to the next course in <span id="lesson-timer">0</span> second(s).';
        } else {
            $next_url = get_site_url() . '/training-hub/';
            $message = 'You will get redirected to training hub in <span id="lesson-timer">0</span> second(s).';
            $traininghubnext = 1;
        }
    }

    ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script type="text/javascript">
        jQuery(document).ready(function ($) {
            $('.empty-container').html('<div class="sensei-message tick">Congratulations! You have completed this lesson.</div>');
            $('.sensei-message').append('<?php echo $message; ?>');
            <?php if ($next_course != 0) { echo '$(\'.sensei-message\').replaceWith(\'<div class="sensei-message badge-div"> <img src="/wp-content/uploads/2017/03/badge.png" /><br /> <h2 class="congrats-text">Congratulations</h2> <h3>'.get_the_title( $lesson_course_id ).' Course</h3> <h2 class="congrats-text">Completed</h2> <a href="'.$next_url.'" style="display: block; text-align: center;">Go to the next course...</a></div><style type="text/css">.wistia_responsive_padding { display: none; }</style>\');'; } ?>
            <?php if ($traininghubnext != 0) { echo '$(\'.sensei-message\').replaceWith(\'<div class="sensei-message badge-div"> <img src="/wp-content/uploads/2017/03/badge.png" /><br /> <h2 class="congrats-text">Congratulations</h2> <h3>'.get_the_title( $lesson_course_id ).' Course</h3> <h2 class="congrats-text">Completed</h2> <a href="/marketing-hub/" style="display: block; text-align: center;">Go to Marketing Links...</a></div><style type="text/css">.wistia_responsive_padding { display: none; }</style>\');'; } ?>
            var redirect_second = 3,
                display = document.querySelector('#lesson-timer');
            startTimer(redirect_second, display);
        });




        function startTimer(seconds, display) {
            function timer() {


                display.textContent = seconds;

                if (seconds <= 1) {
                    console.log('<?php echo $next_url; ?>');

                    // return false;
                    clearInterval(myTimer);
                    <?php if ($next_course == 0 && $traininghubnext == 0) : ?>
                       window.location.href = '<?php echo $next_url; ?>';
                    <?php endif; ?>
                }
                seconds--;
            };
            // we don't want to wait a full second before the timer starts
            timer();
            var myTimer = setInterval(timer, 1000);
        }
    </script>
    <?php
}

add_action('sensei_user_lesson_end', 'user_lesson_complete');

function user_course_start()
{
    global $post;

    $post_args = array(
        'post_type' => 'lesson',
        'post_status' => 'publish',
        'posts_per_page' => 1,
        'meta_query' => array(
            array(
                'key' => '_lesson_course',
                'value' => intval($post->ID),
                'compare' => '='
            )
        ),
        'meta_key' => '_order_' . $post->ID,
        'orderby' => 'meta_value_num date',
        'order' => 'ASC'
    );
    $first_lesson = get_posts($post_args);


    if ($first_lesson)
        $next_url = get_permalink(absint($first_lesson[0]->ID));
    else
        $next_url = get_site_url() . '/training-hub/';
    ?>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script type="text/javascript">
        jQuery(document).ready(function ($) {

            window.location.href = "<?php echo $next_url; ?>";
        });
    </script>
    <?php
}

add_action('sensei_user_course_start', 'user_course_start');
//removes auto add <p></p> tag on landing page
if (is_page(510)) {
    remove_filter('the_content', 'wpautop');
}


function mca_load_user_courses_content($user = false, $manage = false)
{
    global $woothemes_sensei, $post, $wp_query, $course, $my_courses_page, $my_courses_section;

    // Build Output HTML
    $complete_html = $active_html = '';

    if ($user) {

        $my_courses_page = true;

        // Allow action to be run before My Courses content has loaded
        do_action('sensei_before_my_courses', $user->ID);

        // Logic for Active and Completed Courses
        $per_page = 20;
        if (isset($woothemes_sensei->settings->settings['my_course_amount']) && (0 < absint($woothemes_sensei->settings->settings['my_course_amount']))) {
            $per_page = absint($woothemes_sensei->settings->settings['my_course_amount']);
        }

        $course_statuses = WooThemes_Sensei_Utils::sensei_check_for_activity(array('user_id' => $user->ID, 'type' => 'sensei_course_status'), true);
        // User may only be on 1 Course
        if (!is_array($course_statuses)) {
            $course_statuses = array($course_statuses);
        }
        $completed_ids = $active_ids = array();
        foreach ($course_statuses as $course_status) {
            if (WooThemes_Sensei_Utils::user_completed_course($course_status, $user->ID)) {
                $completed_ids[] = $course_status->comment_post_ID;
            } else {
                $active_ids[] = $course_status->comment_post_ID;
            }
        }

        $active_count = $completed_count = 0;

        $active_courses = array();
        if (0 < intval(count($active_ids))) {
            $my_courses_section = 'active';
            $active_courses = $woothemes_sensei->post_types->course->course_query($per_page, 'usercourses', $active_ids);
            $active_count = count($active_ids);
        } // End If Statement

        $completed_courses = array();
        if (0 < intval(count($completed_ids))) {
            $my_courses_section = 'completed';
            $completed_courses = $woothemes_sensei->post_types->course->course_query($per_page, 'usercourses', $completed_ids);
            $completed_count = count($completed_ids);
        } // End If Statement
        $lesson_count = 1;

        $active_page = 1;
        if (isset($_GET['active_page']) && 0 < intval($_GET['active_page'])) {
            $active_page = $_GET['active_page'];
        }

        $completed_page = 1;
        if (isset($_GET['completed_page']) && 0 < intval($_GET['completed_page'])) {
            $completed_page = $_GET['completed_page'];
        }
        foreach ($active_courses as $course_item) {

            $course_lessons = $woothemes_sensei->post_types->course->course_lessons($course_item->ID);
            $lessons_completed = 0;
            foreach ($course_lessons as $lesson) {
                if (WooThemes_Sensei_Utils::user_completed_lesson($lesson->ID, $user->ID)) {
                    ++$lessons_completed;
                }
            }

            // Get Course Categories
            $category_output = get_the_term_list($course_item->ID, 'course-category', '', ', ', '');

            $active_html .= '<article class="' . esc_attr(join(' ', get_post_class(array('course', 'post'), $course_item->ID))) . '">';

            // Image
            $active_html .= $woothemes_sensei->post_types->course->course_image(absint($course_item->ID));

            // Title
            $active_html .= '<header>';

            $active_html .= '<h2><a href="' . esc_url(get_permalink(absint($course_item->ID))) . '" title="' . esc_attr($course_item->post_title) . '">' . esc_html($course_item->post_title) . '</a></h2>';

            $active_html .= '</header>';

            $active_html .= '<section class="entry">';

            $active_html .= '<p class="sensei-course-meta">';

            // Author
            $user_info = get_userdata(absint($course_item->post_author));
            if (isset($woothemes_sensei->settings->settings['course_author']) && ($woothemes_sensei->settings->settings['course_author'])) {
                $active_html .= '<span class="course-author">' . __('by ', 'woothemes-sensei') . '<a href="' . esc_url(get_author_posts_url(absint($course_item->post_author))) . '" title="' . esc_attr($user_info->display_name) . '">' . esc_html($user_info->display_name) . '</a></span>';
            } // End If Statement
            // Lesson count for this author
            $lesson_count = $woothemes_sensei->post_types->course->course_lesson_count(absint($course_item->ID));
            // Handle Division by Zero
            if (0 == $lesson_count) {
                $lesson_count = 1;
            } // End If Statement
            $active_html .= '<span class="course-lesson-count">' . $lesson_count . '&nbsp;' . apply_filters('sensei_lessons_text', __('Lessons', 'woothemes-sensei')) . '</span>';
            // Course Categories
            if ('' != $category_output) {
                $active_html .= '<span class="course-category">' . sprintf(__('in %s', 'woothemes-sensei'), $category_output) . '</span>';
            } // End If Statement
            $active_html .= '<span class="course-lesson-progress">' . sprintf(__('%1$d of %2$d lessons completed', 'woothemes-sensei'), $lessons_completed, $lesson_count) . '</span>';

            $active_html .= '</p>';

            $active_html .= '<p class="course-excerpt">' . apply_filters('get_the_excerpt', $course_item->post_excerpt) . '</p>';

            $progress_percentage = abs(round((doubleval($lessons_completed) * 100) / ($lesson_count), 0));

            if (50 < $progress_percentage) {
                $class = ' green';
            } elseif (25 <= $progress_percentage && 50 >= $progress_percentage) {
                $class = ' orange';
            } else {
                $class = ' red';
            }

            /* if ( 0 == $progress_percentage ) { $progress_percentage = 5; } */

            $active_html .= '<div class="meter' . esc_attr($class) . '"><span style="width: ' . $progress_percentage . '%">' . $progress_percentage . '%</span></div>';

            $active_html .= '</section>';

            if ($manage) {

                $active_html .= '<section class="entry-actions">';

                $active_html .= '<form method="POST" action="' . remove_query_arg(array('active_page', 'completed_page')) . '">';

                $active_html .= '<input type="hidden" name="user_id"  value="' . get_current_user_id() . '" />';
                $active_html .= '<input type="hidden" name="course_id"  value="' . esc_attr(absint($course_item->ID)) . '" />';

                if (0 < absint(count($course_lessons)) && $woothemes_sensei->settings->settings['course_completion'] == 'complete') {
                    $active_html .= '<span><input name="course_complete" type="submit" class="course-complete" value="' . apply_filters('sensei_mark_as_complete_text', __('Mark as Complete', 'woothemes-sensei')) . '"/></span>';
                } // End If Statement

                $course_purchased = false;
                if (WooThemes_Sensei_Utils::sensei_is_woocommerce_activated()) {
                    // Get the product ID
                    $wc_post_id = get_post_meta(absint($course_item->ID), '_course_woocommerce_product', true);
                    if (0 < $wc_post_id) {
                        $course_purchased = WooThemes_Sensei_Utils::sensei_customer_bought_product($user->user_email, $user->ID, $wc_post_id);
                    } // End If Statement
                } // End If Statement

                if (!$course_purchased) {
                    $active_html .= '<span><input name="reset-course" type="submit" class="course-delete" value="' . apply_filters('sensei_delete_course_text', __('Delete Course', 'woothemes-sensei')) . '"/></span>';
                } // End If Statement

                $active_html .= '</form>';

                $active_html .= '</section>';
            }

            $active_html .= '</article>';
        }

        // Active pagination
        if ($active_count > $per_page) {

            $current_page = 1;
            if (isset($_GET['active_page']) && 0 < intval($_GET['active_page'])) {
                $current_page = $_GET['active_page'];
            }

            $active_html .= '<nav class="pagination woo-pagination">';
            $total_pages = ceil($active_count / $per_page);

            $link = '';

            if ($current_page > 1) {
                $prev_link = add_query_arg('active_page', $current_page - 1);
                $active_html .= '<a class="prev page-numbers" href="' . $prev_link . '">' . __('Previous', 'woothemes-sensei') . '</a> ';
            }

            for ($i = 1; $i <= $total_pages; $i++) {
                $link = add_query_arg('active_page', $i);

                if ($i == $current_page) {
                    $active_html .= '<span class="page-numbers current">' . $i . '</span> ';
                } else {
                    $active_html .= '<a class="page-numbers" href="' . $link . '">' . $i . '</a> ';
                }
            }

            if ($current_page < $total_pages) {
                $next_link = add_query_arg('active_page', $current_page + 1);
                $active_html .= '<a class="next page-numbers" href="' . $next_link . '">' . __('Next', 'woothemes-sensei') . '</a> ';
            }

            $active_html .= '</nav>';
        }

        foreach ($completed_courses as $course_item) {
            $course = $course_item;

            // Get Course Categories
            $category_output = get_the_term_list($course_item->ID, 'course-category', '', ', ', '');

            $complete_html .= '<article class="' . join(' ', get_post_class(array('course', 'post'), $course_item->ID)) . '">';

            // Image
            $complete_html .= $woothemes_sensei->post_types->course->course_image(absint($course_item->ID));

            // Title
            $complete_html .= '<header>';

            $complete_html .= '<h2><a href="' . esc_url(get_permalink(absint($course_item->ID))) . '" title="' . esc_attr($course_item->post_title) . '">' . esc_html($course_item->post_title) . '</a></h2>';

            $complete_html .= '</header>';

            $complete_html .= '<section class="entry">';

            $complete_html .= '<form method="POST" action="' . remove_query_arg(array('active_page', 'completed_page')) . '">';


            $complete_html .= '<input type="hidden" name="user_id"  value="' . get_current_user_id() . '" />';
            $complete_html .= '<input type="hidden" name="course_id"  value="' . esc_attr(absint($course_item->ID)) . '" />';

            $complete_html .= '<p class="sensei-course-meta">';

            // Author
            $user_info = get_userdata(absint($course_item->post_author));
            if (isset($woothemes_sensei->settings->settings['course_author']) && ($woothemes_sensei->settings->settings['course_author'])) {
                $complete_html .= '<span class="course-author">' . __('by ', 'woothemes-sensei') . '<a href="' . esc_url(get_author_posts_url(absint($course_item->post_author))) . '" title="' . esc_attr($user_info->display_name) . '">' . esc_html($user_info->display_name) . '</a></span>';
            } // End If Statement

            // Lesson count for this author
            $complete_html .= '<span class="course-lesson-count">' . $woothemes_sensei->post_types->course->course_lesson_count(absint($course_item->ID)) . '&nbsp;' . apply_filters('sensei_lessons_text', __('Lessons', 'woothemes-sensei')) . '</span>';
            // Course Categories
            if ('' != $category_output) {
                $complete_html .= '<span class="course-category">' . sprintf(__('in %s', 'woothemes-sensei'), $category_output) . '</span>';
            } // End If Statement

            $complete_html .= '</p>';

            $complete_html .= '<p class="course-excerpt">' . apply_filters('get_the_excerpt', $course_item->post_excerpt) . '</p>';

            $complete_html .= '<div class="meter green"><span style="width: 100%">100%</span></div>';

            if ($manage) {
                $has_quizzes = $woothemes_sensei->post_types->course->course_quizzes($course_item->ID, true);
                // Output only if there is content to display
                if (has_filter('sensei_results_links') || $has_quizzes) {
                    $complete_html .= '<p class="sensei-results-links">';
                    $results_link = '';
                    if ($has_quizzes) {
                        $results_link = '<a class="button view-results" href="' . $woothemes_sensei->course_results->get_permalink($course_item->ID) . '">' . apply_filters('sensei_view_results_text', __('View results', 'woothemes-sensei')) . '</a>';
                    }
                    $complete_html .= apply_filters('sensei_results_links', $results_link);
                    $complete_html .= '</p>';
                }
            }

            $complete_html .= '<span><input name="reset-course" type="submit" class="course-delete" value="' . apply_filters('sensei_delete_course_text', __('Delete Course', 'woothemes-sensei')) . '"/></span>';

            $complete_html .= '</form>';

            $complete_html .= '</section>';

            $complete_html .= '</article>';
        }

        // Active pagination
        if ($completed_count > $per_page) {

            $current_page = 1;
            if (isset($_GET['completed_page']) && 0 < intval($_GET['completed_page'])) {
                $current_page = $_GET['completed_page'];
            }

            $complete_html .= '<nav class="pagination woo-pagination">';
            $total_pages = ceil($completed_count / $per_page);

            $link = '';

            if ($current_page > 1) {
                $prev_link = add_query_arg('completed_page', $current_page - 1);
                $complete_html .= '<a class="prev page-numbers" href="' . $prev_link . '">' . __('Previous', 'woothemes-sensei') . '</a> ';
            }

            for ($i = 1; $i <= $total_pages; $i++) {
                $link = add_query_arg('completed_page', $i);

                if ($i == $current_page) {
                    $complete_html .= '<span class="page-numbers current">' . $i . '</span> ';
                } else {
                    $complete_html .= '<a class="page-numbers" href="' . $link . '">' . $i . '</a> ';
                }
            }

            if ($current_page < $total_pages) {
                $next_link = add_query_arg('completed_page', $current_page + 1);
                $complete_html .= '<a class="next page-numbers" href="' . $next_link . '">' . __('Next', 'woothemes-sensei') . '</a> ';
            }

            $complete_html .= '</nav>';
        }

    } // End If Statement

    if ($manage) {
        $no_active_message = apply_filters('sensei_no_active_courses_user_text', __('You have no active courses.', 'woothemes-sensei'));
        $no_complete_message = apply_filters('sensei_no_complete_courses_user_text', __('You have not completed any courses yet.', 'woothemes-sensei'));
    } else {
        $no_active_message = apply_filters('sensei_no_active_courses_learner_text', __('This learner has no active courses.', 'woothemes-sensei'));
        $no_complete_message = apply_filters('sensei_no_complete_courses_learner_text', __('This learner has not completed any courses yet.', 'woothemes-sensei'));
    }

    ob_start();
    ?>

    <?php do_action('sensei_before_user_courses'); ?>

    <?php
    if ($manage && (!isset($woothemes_sensei->settings->settings['messages_disable']) || !$woothemes_sensei->settings->settings['messages_disable'])) {
        ?>
        <p class="my-messages-link-container"><a class="my-messages-link" href="<?php echo get_post_type_archive_link('sensei_message'); ?>"
                                                 title="<?php _e('View & reply to private messages sent to your course & lesson teachers.', 'woothemes-sensei'); ?>"><?php _e('My Messages', 'woothemes-sensei'); ?></a>
        </p>
        <?php
    }
    ?>
    <div id="my-courses">

        <ul>
            <li><a href="#active-courses"><?php echo apply_filters('sensei_active_courses_text', __('Active Courses', 'woothemes-sensei')); ?></a>
            </li>
            <li>
                <a href="#completed-courses"><?php echo apply_filters('sensei_completed_courses_text', __('Completed Courses', 'woothemes-sensei')); ?></a>
            </li>
        </ul>

        <?php do_action('sensei_before_active_user_courses'); ?>

        <?php $course_page_id = intval($woothemes_sensei->settings->settings['course_page']);
        if (0 < $course_page_id) {
            $course_page_url = get_permalink($course_page_id);
        } elseif (0 == $course_page_id) {
            $course_page_url = get_post_type_archive_link('course');
        } ?>

        <div id="active-courses">

            <?php if ('' != $active_html) {
                echo $active_html;
            } else { ?>
                <div class="sensei-message info"><?php echo $no_active_message; ?> </div>
                <?php

                $course_link_message = 'Start Course!';

                $post_args = array(
                    'post_type' => 'course',
                    'orderby' => 'menu_order date',
                    'order' => 'ASC',
                    'post_status' => 'publish'
                );

                $posts_array = get_posts($post_args);
                if (count($posts_array) > 0) {
                    $is_first_item = true;
                    $is_current_course_competed = false;
                    foreach ($posts_array as $post_item) {
                        $is_current_course_competed = false;
                        $post_id = absint($post_item->ID);
                        $prerequisite = absint(get_post_meta($post_id, '_course_prerequisite', true));
                        if ($prerequisite > 0)
                            $view_course = WooThemes_Sensei_Utils::user_completed_course($prerequisite, $current_user->ID);

                        if ($is_first_item)
                            $view_course = true;

                        if ($view_course) {
                            $course_link = get_permalink($post_id);
                            if (!$is_first_item)
                                $is_current_course_competed = WooThemes_Sensei_Utils::user_completed_course($post_id, $current_user->ID);

                            if ($is_current_course_competed) {
                                $course_link = '/marketing-hub/';
                                $course_link_message = 'You Completed All Lessons - Go To Marketing Hub';
                            } else {
                                $course_link_message = 'Start Course!';
                            }
                        }

                        $is_first_item = false;

                    }
                }
                ?>
                <a class="start-course-btn" href="<?php echo $course_link; ?>"><?php echo $course_link_message; ?></a>
            <?php } // End If Statement
            ?>

        </div>

        <?php do_action('sensei_after_active_user_courses'); ?>

        <?php do_action('sensei_before_completed_user_courses'); ?>

        <div id="completed-courses">

            <?php if ('' != $complete_html) {
                echo $complete_html;
            } else { ?>
                <div class="sensei-message info"><?php echo $no_complete_message; ?></div>
            <?php } // End If Statement
            ?>

        </div>

        <?php do_action('sensei_after_completed_user_courses'); ?>

    </div>

    <?php do_action('sensei_after_user_courses'); ?>

    <?php
    return ob_get_clean();
}

function mca_sensei_lesson_quiz_meta($post_id = 0, $user_id = 0)
{
    global $woothemes_sensei;
    // Get the prerequisite lesson
    $lesson_prerequisite = (int)get_post_meta($post_id, '_lesson_prerequisite', true);
    $lesson_course_id = (int)get_post_meta($post_id, '_lesson_course', true);

    // Lesson Quiz Meta
    $quiz_id = $woothemes_sensei->post_types->lesson->lesson_quizzes($post_id);
    $has_user_completed_lesson = WooThemes_Sensei_Utils::user_completed_lesson(intval($post_id), $user_id);
    $show_actions = is_user_logged_in() ? true : false;

    if (intval($lesson_prerequisite) > 0) {

        // If the user hasn't completed the prereq then hide the current actions
        $show_actions = WooThemes_Sensei_Utils::user_completed_lesson($lesson_prerequisite, $user_id);
    }
    ?>
    <header><?php
    if ($quiz_id && is_user_logged_in() && WooThemes_Sensei_Utils::user_started_course($lesson_course_id, $user_id)) { ?>
        <?php $no_quiz_count = 0; ?>
        <?php
        $has_quiz_questions = get_post_meta($post_id, '_quiz_has_questions', true);
        // Display lesson quiz status message
        if ($has_quiz_questions) {
            echo '<div class="sensei-message tick">Congratulations! You have completed this lesson.</div>';
            if ($has_quiz_questions) {
                echo $status['extra'];
            } // End If Statement
        } // End If Statement
        ?>
    <?php } elseif ($show_actions && $quiz_id && $woothemes_sensei->access_settings()) { ?>
        <?php
        $has_quiz_questions = get_post_meta($post_id, '_quiz_has_questions', true);
        if ($has_quiz_questions) { ?>
            <p><a class="button" href="<?php echo esc_url(get_permalink($quiz_id)); ?>"
                  title="<?php echo esc_attr(apply_filters('sensei_view_lesson_quiz_text', __('View the Lesson Quiz', 'woothemes-sensei'))); ?>"><?php echo apply_filters('sensei_view_lesson_quiz_text', __('View the Lesson Quiz', 'woothemes-sensei')); ?></a>
            </p>
        <?php } ?>
    <?php } // End If Statement
    if ($show_actions && !$has_user_completed_lesson) {
        sensei_complete_lesson_button();
    } elseif ($show_actions) {
        sensei_reset_lesson_button();
    } // End If Statement
    ?></header><?php
} // End sensei_lesson_quiz_meta()

function mca_sensei_course_meta()
{
    global $woothemes_sensei, $post, $current_user;
    ?>
    <section class="course-meta">
    <?php

    $is_user_taking_course = WooThemes_Sensei_Utils::user_started_course($post->ID, $current_user->ID);
    if (is_user_logged_in() && !$is_user_taking_course) {

        // Get the product ID
        $wc_post_id = absint(get_post_meta($post->ID, '_course_woocommerce_product', true));

        // Check for woocommerce
        if (WooThemes_Sensei_Utils::sensei_is_woocommerce_activated() && (0 < intval($wc_post_id))) {
            sensei_wc_add_to_cart($post->ID);
        } else {
            sensei_start_course_form($post->ID);
        } // End If Statement

    } elseif (is_user_logged_in()) {
        // Check if course is completed
        $user_course_status = WooThemes_Sensei_Utils::user_course_status($post->ID, $current_user->ID);
        $completed_course = WooThemes_Sensei_Utils::user_completed_course($user_course_status);
        // Success message
        if ($completed_course) { ?>
            <div class="status completed"><?php echo apply_filters('sensei_complete_text', __('Completed', 'woothemes-sensei')); ?></div>
            <?php
            $has_quizzes = $woothemes_sensei->post_types->course->course_quizzes($post->ID, true);
            if (has_filter('sensei_results_links') || $has_quizzes) { ?>
                <p class="sensei-results-links">
                    <?php
                    $results_link = '';
                    if ($has_quizzes) {
                        $results_link = '<a class="view-results" href="' . $woothemes_sensei->course_results->get_permalink($post->ID) . '">' . apply_filters('sensei_view_results_text', __('View results', 'woothemes-sensei')) . '</a>';
                    }
                    $results_link = apply_filters('sensei_results_links', $results_link);
                    echo $results_link;
                    ?></p>
            <?php } ?>
        <?php } else { ?>
            <?php
            $course_lessons = $woothemes_sensei->frontend->course->course_lessons($post->ID);
            $total_lessons = count($course_lessons);

            $lessons_completed = 0;
            foreach ($course_lessons as $lesson_item) {
                $user_lesson_status = WooThemes_Sensei_Utils::user_lesson_status($lesson_item->ID, $current_user->ID);
                $single_lesson_complete = WooThemes_Sensei_Utils::user_completed_lesson($user_lesson_status);
                if ($single_lesson_complete) {
                    $lessons_completed++;
                } // End
            }

            $progress_percentage = abs(round((doubleval($lessons_completed) * 100) / ($total_lessons), 0));
            if (50 < $progress_percentage) {
                $class = ' green';
            } elseif (25 <= $progress_percentage && 50 >= $progress_percentage) {
                $class = ' orange';
            } else {
                $class = ' red';
            }
            echo '<div class="course-completion-rate">' . sprintf(__('Currently completed %1$s of %2$s in total', 'woothemes-sensei'), $lessons_completed, $total_lessons) . '</div>';
            ?>
        <?php } ?>
    <?php } else {
        // Get the product ID
        $wc_post_id = absint(get_post_meta($post->ID, '_course_woocommerce_product', true));
        // Check for woocommerce
        if (WooThemes_Sensei_Utils::sensei_is_woocommerce_activated() && (0 < intval($wc_post_id))) {
            sensei_wc_add_to_cart($post->ID);
        } else {
            // User needs to register
            wp_register('<div class="status register">', '</div>');
        } // End If Statement
    } // End If Statement
    ?>

    </section><?php

} // End sensei_course_meta()


add_filter('su/data/shortcodes', 'register_my_custom_shortcode');
function register_my_custom_shortcode($shortcodes)
{
    $shortcodes['mca_user'] = array(
        'name' => __('MCA User Information', 'mca'),
        'type' => 'single',
        'group' => 'data',
        'atts' => array(
            'meta_key' => array(
                'default' => '',
                'name' => __('MCA User Field', 'su'),
                'desc' => __('The user meta key to display', 'su')
            ),

            'referrer_data' => array(
                'type' => 'select',
                'values' => array(
                    'yes' => __('Yes', 'su'),
                    'no' => __('No', 'su')
                ),
                'default' => 'no',
                'name' => __('Referrer Data', 'su'),
                'desc' => __('Get the referrer\'s data if available instead of the current user', 'su')
            ),

            'referrer_key' => array(
                'default' => '',
                'name' => __('Referrer Variable', 'su'),
                'desc' => __('The expected variable that will catch the referrer\'s ID or Username', 'su')
            ),


            'editable' => array(
                'type' => 'select',
                'values' => array(
                    'yes' => __('Yes', 'su'),
                    'no' => __('No', 'su')
                ),
                'default' => 'no',
                'name' => __('Editable', 'su'),
                'desc' => __('Set the user field if editable or not', 'su')
            ),

            'class' => array(
                'default' => '',
                'name' => __('Custom Class', 'su'),
                'desc' => __('The custom class for the container', 'su')
            ),
            'display_type' => array(
                'type' => 'select',
                'values' => array(
                    'single_line' => __('Single Line Text', 'su'),
                    'paragraph' => __('Paragraph Text', 'su')
                ),
                'default' => '',
                'name' => __('Display Type', 'su'),
                'desc' => __('Type to display if field is editable', 'su')
            ),

            'placeholder' => array(
                'default' => '',
                'name' => __('Placeholder', 'su'),
                'desc' => __('Placeholder if the field is editable', 'su')
            ),

            'save_message' => array(
                'default' => 'Field has been successfully saved!',
                'name' => __('Save Message', 'su'),
                'desc' => __('Message to display after modifying the field', 'su')
            ),
        ),
        'icon' => 'info-circle',
        'function' => 'get_mca_user_information'
    );
    return $shortcodes;
}

function get_mca_user_information($atts, $content = null)
{
    global $current_user;
    $atts = shortcode_atts(array(
        'meta_key' => '',
        'referrer_data' => 'no',
        'referrer_key' => 'referrer',
        'editable' => 'no',
        'class' => '',
        'display_type' => 'single_line',
        'placeholder' => 'Enter your data here',
        'save_message' => 'Field has been successfully saved!'
    ), $atts);

    if (empty($atts['meta_key']))
        return 'MCA User Field is required!';

    if ($atts['meta_key'] == 'referrer') {
        return $_GET[$atts['referrer_key']];
    }

    $user_id = $current_user->ID;
    if ($atts['referrer_data'] == 'yes') {
        $username = $_GET[$atts['referrer_key']];

        $user = get_user_by('login', $username);
        $user_id = $user->ID;

        if ($atts['meta_key'] == 'displayname') {
            $meta_value = $user->first_name . ' ' . $user->last_name;
        } elseif ($atts['meta_key'] == 'useravatar') {
            $meta_value = get_avatar($user_id, 400);
        } else {
            $meta_value = get_user_meta($user_id, $atts['meta_key'], true);
        }

        if (empty($meta_value))
            $user_id = 1;
    }

    $user_id = !empty($user_id) ? $user_id : 1;

    if ($atts['meta_key'] == 'displayname') {
        $user = get_userdata($user_id);
        $meta_value = $user->first_name . ' ' . $user->last_name;
    } elseif ($atts['meta_key'] == 'useravatar') {
        $meta_value = get_avatar($user_id, 400);
    } elseif ($atts['meta_key'] == 'userlocation') {
        $geolocation = unserialize(file_get_contents('http://www.geoplugin.net/php.gp?ip=' . $_SERVER['REMOTE_ADDR']));
        // $geolocation = unserialize(file_get_contents('http://www.geoplugin.net/php.gp?ip=97.76.202.238'));

        if (!empty($geolocation['geoplugin_city']))
            $meta_value = $geolocation['geoplugin_city'];

        if (!empty($geolocation['geoplugin_regionName']))
            $meta_value = empty($meta_value) ? $geolocation['geoplugin_regionName'] : $meta_value . ', ' . $geolocation['geoplugin_regionName'];

        if (!empty($geolocation['geoplugin_countryName']) && $geolocation['geoplugin_countryName'] != 'United States')
            $meta_value = empty($meta_value) ? $geolocation['geoplugin_countryName'] : $meta_value . ', ' . $geolocation['geoplugin_countryName'];

    } else {
        $meta_value = get_user_meta($user_id, $atts['meta_key'], true);
    }

    $html = $meta_value;

    if ($atts['editable'] == 'yes') {
        $nonce = wp_create_nonce('mca_user_info_nonce');

        $html = '<div class="' . $atts['class'] . '"><form onsubmit="return false">';
        if ($atts['display_type'] == 'single_line')
            $html .= '<input type="text" required class="mca_user_field" data-meta_key="' . $atts['meta_key'] . '" placeholder="' . $atts['placeholder'] . '" value="' . $meta_value . '">';
        else
            $html .= '<textarea class="mca_user_field" data-meta_key="' . $atts['meta_key'] . '" placeholder="' . $atts['placeholder'] . '">' . $meta_value . '</textarea>';

        $html .= '<button type="submit" class="save-user-info" data-nonce="' . $nonce . '" data-message="' . $atts['save_message'] . '">SAVE</button>';
        $html .= '<div class="mca_user_message"></div>';
        $html .= '</form></div>';
    }

    return $html;
}

function save_mca_user_information()
{
    if (!wp_verify_nonce($_POST['nonce'], "mca_user_info_nonce")) {
        exit("No naughty business please");
    }

    global $current_user;

    $meta_key = $_POST['meta_key'];
	$meta_value = $_POST['meta_value'];
	if($meta_value != '') {
	    update_user_meta($current_user->ID, $meta_key, $meta_value);
	    $response['html'] = $meta_key;
	    $response['save_message'] = $_POST['save_message'];
	}
	else {
		$response['save_message'] = 'Please fill in the required field.';
	}
	echo json_encode($response);
    die();
}

add_action('wp_ajax_save_mca_user_information', 'save_mca_user_information');


function wcs_redirect_product_based($order_id)
{
    $order = wc_get_order($order_id);

    foreach ($order->get_items() as $item) {
        $_product = wc_get_product($item['product_id']);
        // Add whatever product id you want below here
        if ($item['product_id'] == 171) {
            // change below to the URL that you want to send your customer to
            wp_redirect(get_site_url());
        }
    }
}


add_action('woocommerce_thankyou', 'wcs_redirect_product_based');

function filter_affiliate_username($content)
{
    if (!affwp_is_affiliate()) {
        return $content;
    }

    $affiliate = affwp_get_affiliate(affwp_get_affiliate_id());
    $user_info = get_userdata($affiliate->user_id);
    $affiliate_user_name = $user_info->user_login;

    $referrer = $_GET['ref'];
    $content = str_replace("{referrer}", $referrer, $content);
    $content = str_replace("{affiliate_username}", $affiliate_user_name, $content);
    return $content;
}

add_filter('the_content', 'filter_affiliate_username');
function filter_referrer_menu($items)
{
    $username = $_GET['ref'];
    $user = get_user_by('login', $username);
    foreach ($items as $item) {
        if ($item->title == "{referrer}") {
            if ($user) {
                $item->title = '
					<div class="referrer-menu">
						<div class="pull-left">
							<div class="referrer-caption">You We\'re Referred By:</div>
							<div class="referrer-name">' . $user->first_name . ' ' . $user->last_name . '</div>
						</div>
						<div class="pull-right">' . get_avatar($user->ID, 90) . '</div>
					</div>
				';
            } else {
                $item->title = '';
            }
        }
    }

    return $items;
}

add_filter('wp_nav_menu_objects', 'filter_referrer_menu', 10, 2);


if (function_exists('affiliate_wp')) {
    remove_action('affwp_set_affiliate_status', array(affiliate_wp()->emails, 'notify_on_approval'), 10, 3);
}

// let's start by enqueuing our styles correctly
function mca_admin_styles()
{
    $theme_info = wp_get_theme();
    wp_register_style('admin_stylesheet', get_stylesheet_directory_uri() . '/assets/css/admin.css', array(), $theme_info->get('Version'));
    wp_enqueue_style('admin_stylesheet');
}


add_action('admin_enqueue_scripts', 'mca_admin_styles');

add_action('wp_enqueue_scripts', 'load_old_jquery_fix', 100);

function load_old_jquery_fix()
{
    if (!is_admin()) {
        wp_deregister_script('jquery');
        wp_register_script('jquery', ("//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"), false, '1.11.3');
        wp_enqueue_script('jquery');
    }
}

//  Handle reset button
if (isset($_POST['reset-course'])) {
    $success = WooThemes_Sensei_Utils::sensei_remove_user_from_course($_POST['course_id'], $_POST['user_id']);
}


function mca_start_course()
{
    // handle start taking this course button
    global $post, $current_user;
// Check if the user is taking the course
    $is_user_taking_course = Sensei_Utils::user_started_course($post->ID, $current_user->ID);
// Handle user starting the course
    if (isset($_POST['course_start'])
        && wp_verify_nonce($_POST['woothemes_sensei_start_course_noonce'], 'woothemes_sensei_start_course_noonce')
        && !$is_user_taking_course
    ) {

        // Start the course
        $activity_logged = Sensei_Utils::user_start_course($current_user->ID, $post->ID);
        $this->data = new stdClass();
        $this->data->is_user_taking_course = false;
        if ($activity_logged) {
            $this->data->is_user_taking_course = true;

            // Refresh page to avoid re-posting
            ?>

            <script type="text/javascript"> window.location = '<?php echo get_permalink( $post->ID ); ?>'; </script>

            <?php
        } // End If Statement
    } // End If Statement
}

add_action('wp', 'mca_start_course');

function login_failed()
{
    $login_page = home_url('/login/');
    wp_redirect($login_page . '?login=failed');
    exit;
}

add_action('wp_login_failed', 'login_failed');

function verify_username_password($user, $username, $password)
{
    $login_page = home_url('/login');
    if ($username == "" || $password == "") {
        wp_redirect($login_page . "?login=empty");
        exit;
    }
}

add_filter('authenticate', 'verify_username_password', 1, 3);

function logout_page()
{
    $login_page = home_url('/login/');
    wp_redirect($login_page . "?login=false");
    exit;
}

add_action('wp_logout', 'logout_page');

/*function show_template()
{
    if (is_super_admin()) {
        global $template;
        print_r($template);
    }
}
add_action('wp_footer', 'show_template');*/


// add profile image shortcode
function profile_image_shortcode()
{
    $args = array(
        'size' => 250
    );
    $url = get_avatar_url(get_current_user_id(), $args); ?>
    <img class="myautimg" src="<?php echo $url; ?>">
<?php }

add_shortcode('profileimage', 'profile_image_shortcode');

function my_page_template_redirect()
{
    if (!is_user_logged_in()) {
        $login_page = home_url('/login');
        $guest_allowed = array(
            "whatismca",
            "benefits",
            "testimonials",
            "notsleepingvideo",
            "losingsleep",
            "2kperweek",
            "login",
            "mcaprotools-invite",
            "checkout",
            "cart",
            "hangout"
        );
        if ($_SERVER['REQUEST_METHOD'] == 'GET' && !is_page($guest_allowed)) {
            wp_redirect($login_page);
            exit;
        }
    }
    if (is_user_logged_in() && is_page('login')) {
        wp_redirect(home_url());
        exit;
    }

    global $current_user, $post;
    $classes = get_body_class();
    if (in_array('post-type-archive-course', $classes)) {
        wp_redirect('/training-hub/');
        exit;
    }
}

add_action('template_redirect', 'my_page_template_redirect');
