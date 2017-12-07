<div class="wrap newsletters <?php echo $this -> pre; ?>">
    <h1><?php _e('Manage Autoresponders', 'wp-mailinglist'); ?> <a class="add-new-h2" href="?page=<?php echo $this -> sections -> autoresponders; ?>&amp;method=save" title="<?php _e('Add a new autoresponder', 'wp-mailinglist'); ?>"><?php _e('Add New', 'wp-mailinglist'); ?></a></h1>
    
    <form method="post" action="?page=<?php echo $this -> sections -> autoresponders; ?>&amp;method=autoresponderscheduling">
    	<label for="autoresponderscheduling"><?php _e('Schedule Interval:', 'wp-mailinglist'); ?></label>
        <?php $scheduleinterval = $this -> get_option('autoresponderscheduling'); ?>
    	<select name="autoresponderscheduling" id="autoresponderscheduling">
        	<?php $schedules = wp_get_schedules(); ?>
			<?php if (!empty($schedules)) : ?>
                <?php foreach ($schedules as $key => $val) : ?>
                <?php $sel = ($scheduleinterval == $key) ? 'selected="selected"' : ''; ?>
                <option <?php echo $sel; ?> value="<?php echo $key ?>"><?php echo $val['display']; ?> (<?php echo $val['interval'] ?> <?php _e('seconds', 'wp-mailinglist'); ?>)</option>
                <?php endforeach; ?>
            <?php endif; ?>
        </select>
        <button class="button" value="1" type="submit" name="submit">
        	<?php _e('Save Interval', 'wp-mailinglist'); ?>
        </button>
        <?php echo $Html -> help(__('You can set the interval at which the plugin will check for autoresponder emails which need to be loaded and sent to the subscribers. This schedule runs using the WordPress cron jobs and can be monitored under Newsletters > Configuration > Scheduled Tasks as well.', 'wp-mailinglist')); ?>
    </form>
	<form id="posts-filter" action="<?php echo $this -> url; ?>" method="post">
		<ul class="subsubsub">
			<li><?php echo (empty($_GET['showall'])) ? $paginate -> allcount : count($autoresponders); ?> <?php _e('autoresponders', 'wp-mailinglist'); ?> |</li>
			<?php if (empty($_GET['showall'])) : ?>
				<li><?php echo $Html -> link(__('Show All', 'wp-mailinglist'), $this -> url . '&amp;showall=1'); ?></li>
			<?php else : ?>
				<li><?php echo $Html -> link(__('Show Paging', 'wp-mailinglist'), '?page=' . $this -> sections -> autoresponders); ?></li>
			<?php endif; ?>
		</ul>
		<p class="search-box">
			<input id="post-search-input" class="search-input" type="text" name="searchterm" value="<?php echo (!empty($_POST['searchterm'])) ? $_POST['searchterm'] : esc_html($_GET[$this -> pre . 'searchterm']); ?>" />
			<button type="submit" value="1" name="submit" class="button">
				<?php _e('Search Autoresponders', 'wp-mailinglist'); ?>
			</button>
		</p>
	</form>
	<br class="clear" />
	<form id="posts-filter" action="?page=<?php echo $this -> sections -> autoresponders; ?>" method="get">
    	<input type="hidden" name="page" value="<?php echo $this -> sections -> autoresponders; ?>" />
    	
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
    		<select name="status">
    			<option <?php echo (!empty($_GET['status']) && $_GET['status'] == "all") ? 'selected="selected"' : ''; ?> value="all"><?php _e('All Status', 'wp-mailinglist'); ?></option>
    			<option <?php echo (!empty($_GET['status']) && $_GET['status'] == "active") ? 'selected="selected"' : ''; ?> value="active"><?php _e('Active', 'wp-mailinglist'); ?></option>
    			<option <?php echo (!empty($_GET['status']) && $_GET['status'] == "inactive") ? 'selected="selected"' : ''; ?> value="inactive"><?php _e('Inactive', 'wp-mailinglist'); ?></option>
    		</select>
    		<button type="submit" name="filter" value="1" class="button button-primary">
    			<?php _e('Filter', 'wp-mailinglist'); ?>
    		</button>
    	</div>
    </form>
    <br class="clear" />
    <?php $this -> render('autoresponders' . DS . 'loop', array('autoresponders' => $autoresponders, 'paginate' => $paginate), true, 'admin'); ?>
</div>