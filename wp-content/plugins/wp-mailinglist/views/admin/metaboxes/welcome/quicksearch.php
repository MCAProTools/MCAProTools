<div>
	<form action="<?php echo admin_url('admin.php'); ?>?page=<?php echo $this -> sections -> subscribers; ?>" method="post">
		<p>
			<label>
				<?php _e('Subscriber:', 'wp-mailinglist'); ?><br/>
				<input placeholder="<?php echo esc_attr(stripslashes(__('Subscriber...', 'wp-mailinglist'))); ?>" type="text" name="searchterm" value="" id="newsletters_quicksearch_input" />
			</label>
		</p>
		<p class="submit">
			<button value="1" type="submit" name="search" id="newsletters_quicksearch_submit" class="button button-primary"> 
				<?php _e('Search Now', 'wp-mailinglist'); ?>
			</button>
		</p>
	</form>
</div>