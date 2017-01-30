<?php
/**
 * Renders popup close fields
 * @since 1.0
 * @param $post_id
 */

add_action('popmake_popup_forced_interaction_meta_box_fields', 'popmake_popup_forced_interaction_meta_box_field_disabled', 5);
function popmake_popup_forced_interaction_meta_box_field_disabled( $popup_id ) {
	?><tr>
		<th scope="row"><?php _e('Disable Close', 'popup-maker-forced-interaction' );?></th>
		<td>
			<input type="checkbox" value="true" name="popup_close_disabled" id="popup_close_disabled" <?php echo popmake_get_popup_close( $popup_id, 'disabled' ) ? 'checked="checked" ' : '';?>/>
			<label for="popup_close_disabled" class="description"><?php _e('Checking this will disable and hide the close button for this popup.', 'popup-maker-forced-interaction' );?></label>
		</td>
	</tr><?php
}