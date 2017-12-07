<div class="wrap newsletters <?php echo $this -> pre; ?> newsletters">
	<h1><?php _e('Sent &amp; Draft Emails', 'wp-mailinglist'); ?> <a class="add-new-h2" href="?page=<?php echo $this -> sections -> send; ?>"><?php _e('Create Newsletter', 'wp-mailinglist'); ?></a></h1>
	<form id="posts-filter" method="post" action="?page=<?php echo $this -> sections -> history; ?>">
		<?php if (!empty($histories)) : ?>
			<ul class="subsubsub">
				<li><?php echo (empty($_GET['showall'])) ? $paginate -> allcount : count($histories); ?> <?php _e('sent/draft emails', 'wp-mailinglist'); ?> |</li>
				<?php if (empty($_GET['showall'])) : ?>
					<li><?php echo $Html -> link(__('Show All', 'wp-mailinglist'), $Html -> retainquery('showall=1')); ?></li>
				<?php else : ?>
					<li><?php echo $Html -> link(__('Show Paging', 'wp-mailinglist'), "?page=" . $this -> sections -> history); ?></li>
				<?php endif; ?>
			</ul>
		<?php endif; ?>
		<p class="search-box">
			<input type="text" id="post-search-input" class="search-input" name="searchterm" value="<?php echo (empty($_POST['searchterm'])) ? ((empty($_GET[$this -> pre . 'searchterm'])) ? '' : esc_html($_GET[$this -> pre . 'searchterm'])) : $_POST['searchterm']; ?>" />
			<button value="1" type="submit" class="button" name="search">
				<?php _e('Search History', 'wp-mailinglist'); ?>
			</button>
		</p>
	</form>
	<br class="clear" />
	<form id="posts-filter" action="?page=<?php echo $this -> sections -> history; ?>" method="get">
    	<input type="hidden" name="page" value="<?php echo $this -> sections -> history; ?>" />
    	
    	<?php if (!empty($_GET[$this -> pre . 'searchterm'])) : ?>
    		<input type="hidden" name="<?php echo $this -> pre; ?>searchterm" value="<?php echo esc_attr(stripslashes(esc_html($_GET[$this -> pre . 'searchterm']))); ?>" />
    	<?php endif; ?>
    	
    	<div class="alignleft actions">
    		<?php _e('Filters:', 'wp-mailinglist'); ?>
    		<select name="list">
    			<option <?php echo (!empty($_GET['list']) && $_GET['list'] == "all") ? 'selected="selected"' : ''; ?> value="all"><?php _e('All Mailing Lists', 'wp-mailinglist'); ?></option>
    			<option <?php echo (!empty($_GET['list']) && $_GET['list'] == "none") ? 'selected="selected"' : ''; ?> value="none"><?php _e('No Mailing Lists', 'wp-mailinglist'); ?></option>
    			<?php if ($mailinglists = $Mailinglist -> select(true)) : ?>
    				<?php foreach ($mailinglists as $list_id => $list_title) : ?>
    					<option <?php echo (!empty($_GET['list']) && $_GET['list'] == $list_id) ? 'selected="selected"' : ''; ?> value="<?php echo $list_id; ?>"><?php echo __($list_title); ?></option>
    				<?php endforeach; ?>
    			<?php endif; ?>
    		</select>
    		<select name="sent">
	    		<option <?php echo (!empty($_GET['sent']) && $_GET['sent'] == "all") ? 'selected="selected"' : ''; ?> value="all"><?php _e('All Status', 'wp-mailinglist'); ?></option>
    			<option <?php echo (!empty($_GET['sent']) && $_GET['sent'] == "draft") ? 'selected="selected"' : ''; ?> value="draft"><?php _e('Draft', 'wp-mailinglist'); ?></option>
    			<option <?php echo (!empty($_GET['sent']) && $_GET['sent'] == "sent") ? 'selected="selected"' : ''; ?> value="sent"><?php _e('Sent', 'wp-mailinglist'); ?></option>
    		</select>
    		<select name="theme_id">
    			<option <?php echo (!empty($_GET['theme_id']) && $_GET['theme_id'] == "all") ? 'selected="selected"' : ''; ?> value="all"><?php _e('All Templates', 'wp-mailinglist'); ?></option>
    			<?php if ($themes = $Theme -> select()) : ?>
    				<?php foreach ($themes as $theme_id => $theme_title) : ?>
    					<option <?php echo (!empty($_GET['theme_id']) && $_GET['theme_id'] == $theme_id) ? 'selected="selected"' : ''; ?> value="<?php echo $theme_id; ?>"><?php echo $theme_title; ?></option>
    				<?php endforeach; ?>
    			<?php endif; ?>
    		</select>
    		<button value="1" type="submit" name="filter" class="button button-primary">
    			<?php _e('Filter', 'wp-mailinglist'); ?>
    		</button>
    	</div>
    </form>
    <br class="clear" />
	<?php $this -> render('history' . DS . 'loop', array('histories' => $histories, 'paginate' => $paginate), true, 'admin'); ?>
</div>