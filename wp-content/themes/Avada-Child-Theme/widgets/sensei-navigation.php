<?php
class Sensei_Navigation extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'sensei_navigation_widget', // Base ID
			__( 'Sensei Navigation', 'mca' ), // Name
			array( 'description' => __( 'Sensei Navigation', 'mca' ), ) // Args
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		global $post, $woothemes_sensei, $current_user;
		echo $args['before_widget'];
		if ( ! empty( $instance['title'] ) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ). $args['after_title'];
		}

		$posts_array = array();

		$post_type = get_post_type($post);
		
		if($post_type == 'lesson') {

			$lesson_course_id = get_post_meta( $post->ID, '_lesson_course', true );

			$post_args = array(	
					'post_type' 	=> 'lesson',
					'post_status'       => 'publish',
					'meta_query' => array(
						array(
							'key' => '_lesson_course',
							'value' => intval( $lesson_course_id ),
							'compare' => '='
						)
					),
					'meta_key' => '_order_' . $lesson_course_id,
					'orderby' => 'meta_value_num date',
					'order' => 'ASC',
					'posts_per_page' => -1
			);

			

		} else {
			$post_args = array(	'post_type' 	=> 'course',

							'orderby'         	=> 'menu_order date',

    						'order'           	=> 'ASC',

    						'post_status'       => 'publish',

    						'posts_per_page' => -1
			);

		}

		
		$posts_array = get_posts( $post_args );
		
		if ( count( $posts_array ) > 0 ) {

			echo "<ul class='sensei-navigation'>";


			$is_first_item = true;
			foreach ($posts_array as $post_item){

				$post_id = absint( $post_item->ID );

		    	$post_title = $post_item->post_title;

		    	// user_completed_course
		    	$prerequisite_type =  $post_type == 'lesson' ? '_lesson_prerequisite' : '_course_prerequisite';

		    	$prerequisite = absint( get_post_meta( $post_id, $prerequisite_type, true ) );

		    	if ( $prerequisite > 0 ) {
                    // Check for prerequisite lesson completions
                    $view_course = $post_type == 'lesson' ? WooThemes_Sensei_Utils::user_completed_lesson( $prerequisite, $current_user->ID ) : WooThemes_Sensei_Utils::user_completed_course( $prerequisite, $current_user->ID );
                }

                if($is_first_item)
		    		$view_course = true;
		    	
		    	if ($view_course) {
		    		$is_active = $post->ID == $post_id ? 'active-item' : '';
		    		echo '<li class="' . $is_active . '"><a href="' . esc_url( get_permalink( $post_id ) ) . '" title="'. esc_attr( $post_title ) . '">' . $post_title . '</a></li>';	
		    	} else {
		    		echo '<li class="locked">' . $post_title . '</li>';
		    	}


		    	$is_first_item = false;
		   
			}	
		}

		echo $args['after_widget'];
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		$title = ! empty( $instance['title'] ) ? $instance['title'] : __( 'New title', 'text_domain' );
		?>
		<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		<?php 
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';

		return $instance;
	}

}


add_action( 'widgets_init', function(){
     register_widget( 'Sensei_Navigation' );
});
?>
