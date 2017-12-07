<?php
/**
 * The Template for displaying all single lessons.
 *
 * Override this template by copying it to yourtheme/sensei/single-lesson.php
 *
 * @author 		Automattic
 * @package 	Sensei
 * @category    Templates
 * @version     1.9.0
 */
?>

<?php  get_sensei_header();  ?>


<style type="text/css">

form {
    padding: 30px;
    background-color: rgba(3,42,170, 1);
    border: 5px solid #162469;
}

input.mca_user_field {
    color: #000;
    background-color: #f7f7f7;
    padding: 29px;
    box-shadow: 1px 1px 4px #CCC inset;
    font-size: 18px;
    margin-bottom: 25px;
    border: solid 1px #A9A9A9;
}

button.save-user-info {
    padding: 20px;
    background: crimson;
    color: #fff;
    font-size: 15px;
    border: 1px solid #b10526;
    margin-right: 25px;
    box-shadow: 0px 5px 0px #b10526;
    width: 76%;
}

button.reset-user-info {
    padding: 20px;
    background: #c3c3c3;
    color: #000;
    font-size: 15px;
    width: 20%;
    border: 1px solid #787878;
    box-shadow: 0px 5px 0px #787878;
}

section.sensei-breadcrumb {
    float: left;
    width: 100%;
    margin-top: 50px;
}

input.aweber-campaign-code-input {
    width: 100%;
    padding: 15px;
    font-size: 20px;
    text-align: center;
    color: #000;
    background-color: #f7f7f7;
    padding: 30px;
    box-shadow: 1px 1px 4px #CCC inset;
    margin-top: 10px;
    font-size: 18px;
    border: solid 1px #A9A9A9;
}


.aweber-campaign-code-box {
    padding: 30px;
    background-color: rgba(3,42,170, 1);
    border: 5px solid #162469;
}

.global-fields-box {
    padding: 30px;
    background-color: rgba(3,42,170, 1);
    border: 5px solid #162469;
}

.global-fields-page-title {
    width: 30%;
    font-weight: bold;
    float: left;
    margin-right: 25px;
    font-size: 12px;
    margin-top: 0px;
}

.global-fields-list {
    list-style: none;
    background-color: #f5f5f5;
    padding: 12px;
    padding-left: 10px;
    padding-right: 0px;
    margin-bottom: 25px;
    border: 1px solid lightgrey;
    min-height: 60px;
}

input.global-fields-input {
  padding: 20px;
  margin-top: -25px;
}

.global-fields-input-wrap {
  width: 65%;
  float: left;
}

@media only screen and (max-width: 500px) {
  button.save-user-info {
    padding: 20px;
    background: crimson;
    color: #fff;
    font-size: 15px;
    border: 1px solid #b10526;
    margin-right: 25px;
    box-shadow: 0px 5px 0px #b10526;
    width: 55%;
}

button.reset-user-info {
    padding: 20px;
    background: #c3c3c3;
    color: #000;
    font-size: 15px;
    width: 35%;
    border: 1px solid #787878;
    box-shadow: 0px 5px 0px #787878;
}

.global-fields-list {
    list-style: none;
    background-color: #f5f5f5;
    padding: 12px;
    padding-left: 10px;
    padding-right: 0px;
    margin-bottom: 25px;
    border: 1px solid lightgrey;
    min-height: 80px;
}

.global-fields-input-wrap {
    width: 55%;
    float: left;
    margin-top: 27px;
}

.global-fields-page-title {
    width: 30%;
    font-weight: bold;
    float: left;
    margin-right: 25px;
    font-size: 10px;
    margin-top: 0px;
}



}



</style>

<?php the_post(); ?>

<article <?php post_class( array( 'lesson', 'post' ) ); ?>>

    <?php

        /**
         * Hook inside the single lesson above the content
         *
         * @since 1.9.0
         *
         * @param integer $lesson_id
         *
         * @hooked deprecated_lesson_image_hook - 10
         * @hooked deprecate_sensei_lesson_single_title - 15
         * @hooked Sensei_Lesson::lesson_image() -  17
         * @hooked deprecate_lesson_single_main_content_hook - 20
         */
        do_action( 'sensei_single_lesson_content_inside_before', get_the_ID() );

    ?>

    <section class="entry fix">

        <?php

        if ( sensei_can_user_view_lesson() ) {

            if( apply_filters( 'sensei_video_position', 'top', $post->ID ) == 'top' ) {

                do_action( 'sensei_lesson_video', $post->ID );

            }

            the_content();

        } else {
            ?>

                <p>

                    <?php echo get_the_excerpt(); ?>

                </p>

            <?php
        }

        ?>

    </section>

    <?php

        /**
         * Hook inside the single lesson template after the content
         *
         * @since 1.9.0
         *
         * @param integer $lesson_id
         *
         * @hooked Sensei()->frontend->sensei_breadcrumb   - 30
         */
        do_action( 'sensei_single_lesson_content_inside_after', get_the_ID() );

    ?>

</article><!-- .post -->

<?php get_sensei_footer(); ?>
