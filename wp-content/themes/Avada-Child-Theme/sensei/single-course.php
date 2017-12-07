<?php
/**
 * The Template for displaying all single courses.
 *
 * Override this template by copying it to yourtheme/sensei/single-course.php
 *
 * @author 		Automattic
 * @package 	Sensei
 * @category    Templates
 * @version     1.9.0
 */
?>

<?php  get_sensei_header();  ?>

<style type="text/css">

h1 {
    font-size: 39px;
    margin-top: 0px;
    width: 100%;
    text-align: center;
}

.progress {
    float: left;
    width: 0%;
    height: 100%;
    font-size: 18px;
    width: 100%;
    margin-bottom: 25px;
    line-height: 20px;
    color: #000;
    text-align: center;
    background-color: #fff;
    box-shadow: none;
    -webkit-transition: width .6s ease;
    transition: width .6s ease;
}

.single.logged-in #main .type-course header h1 {
    margin-right: 150px;
    margin-bottom: 5px;
}

#main .course .course-meta, #main .course-container .course-meta {
    margin-bottom: 20px;
    clear: both;
    border-radius: 6px;
    background: #f3f3f3;
    border: solid 1px #dcdcdc;
}

.course .status, .course-lessons .status, .course-container .status {
    padding: .382em 1em;
    -webkit-border-radius: 5px;
    border-radius: 5px;
    -moz-background-clip: padding;
    -webkit-background-clip: padding-box;
    background-clip: padding-box;
    color: #fff;
    font-weight: bold;
    background: #63a95f;
    display: inline-block;
}

#main .course .course-lessons .lesson p.lesson-meta span:first-child, #main .course .module-lessons .lesson p.lesson-meta span:first-child, #main .course-container .course-lessons .lesson p.lesson-meta span:first-child, #main .course-container .module-lessons .lesson p.lesson-meta span:first-child {
    padding-left: 0px;
    margin-left: 10px;
}

#main .course .course-lessons .lesson p.lesson-meta, #main .course .module-lessons .lesson p.lesson-meta, #main .course-container .course-lessons .lesson p.lesson-meta, #main .course-container .module-lessons .lesson p.lesson-meta {
    font-style: italic;
    font-size: .9em;
    border: 1px dashed;
    color: #888888;
    padding: 5px;
    margin-bottom: 10px;
}

#main .fusion-portfolio h2, #main .post h2, #wrapper #main .post h2, #wrapper #main .post-content .fusion-title h2, #wrapper #main .post-content .title h2, #wrapper .fusion-title h2, #wrapper .post-content h2, #wrapper .title h2, #wrapper .woocommerce .checkout h3, .fusion-modal h2, .fusion-widget-area h2, .woocommerce .checkout h3, h2.entry-title {
    font-size: 30px;
    line-height: 110%;
    margin-bottom: 10px;
}

.post {
    margin-bottom: 40px;
}

/*
article.even {
background:#f0f8ff;
}
article.odd {
 background:#f4f4fb;
}
*/

article.post-1302.lesson.type-lesson.status-publish.hentry.post {
    margin-top: 10px;
}

section.course-lessons {
    border-top: 3px solid crimson;
}

article.post.lesson.type-lesson.status-publish.hentry.post {
    margin-top: 10px;
    border-bottom: 1px solid #c3c3c3;
    margin-bottom: 15px;
}

#main .course .course-meta .single_add_to_cart_button, #main .course-container .course-meta .single_add_to_cart_button {
    font-size: 1em;
    position: relative;
    background-color: crimson;
    top: .2em;
    box-shadow: 0px 5px 0px #b10526;
    width: 100%;
    padding: 15px;
    margin-bottom: 0.618em;
}

.course .status.completed, .course-lessons .status.completed, .course-container .status.completed {
    background: #63a95f;
    width: 100%;
    padding: 20px;
}

#main .course .course-meta, #main .course-container .course-meta {
    margin-bottom: 20px;
    clear: both;
    border-radius: 6px;
    background: #fff;
    border: none;
}

span.course-lesson-count {
    display: none;
}

span.woocommerce-Price-amount.amount {
    display: none;
}

.sidebar .widget li {
    margin: 0;
    padding: 0;
    border-bottom: 1px solid #c3c3c3;
    display: block;
    height: 40px;
    margin-bottom: 15px;
}

.sidebar .widget .heading .widget-title, .sidebar .widget .widget-title {
    background-color: rgba(255,255,255,0);
    border-bottom: 3px solid crimson;
    padding-bottom: 10px;
}

</style>


<?php
if (Sensei_WC::has_customer_bought_product(get_current_user_id(), 3287)) {
    echo '<style type="text/css">
            #sensei_category_courses-4 ul li .course-price {
                display: none;
            }
            </style>';
}
?>

<article <?php post_class( array( 'course', 'post' ) ); ?>>
    <?php

    /**
     * Hook inside the single course post above the content
     *
     * @since 1.9.0
     *
     * @param integer $course_id
     *
     * @hooked Sensei()->frontend->sensei_course_start     -  10
     * @hooked Sensei_Course::the_title                    -  10
     * @hooked Sensei()->course->course_image              -  20
     * @hooked Sensei_WC::course_in_cart_message           -  20
     * @hooked Sensei_Course::the_course_enrolment_actions -  30
     * @hooked Sensei()->message->send_message_link        -  35
     * @hooked Sensei_Course::the_course_video             -  40
     */
     do_action( 'sensei_single_course_content_inside_before', get_the_ID() );

    ?>
    <section class="entry fix">
        <?php  the_content(); ?>

    </section>

    <?php

    /**
     * Hook inside the single course post above the content
     *
     * @since 1.9.0
     *
     * @param integer $course_id
     *
     */
     do_action( 'sensei_single_course_content_inside_after', get_the_ID() );

    ?>
</article><!-- .post .single-course -->

<?php get_sensei_footer(); ?>
