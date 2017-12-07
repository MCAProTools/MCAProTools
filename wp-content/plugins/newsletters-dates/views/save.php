<!-- Special Dates Autoresponder Fields -->

<?php

$dates_beforeint = $data -> dates_beforeint;
$dates_beforeval = $data -> dates_beforeval;
$dates_beforeway = $data -> dates_beforeway;
$dates_datepart = maybe_unserialize($data -> dates_datepart);
$dates_field = $data -> dates_field;
$dates_recurring = $data -> dates_recurring;
$dates_recurring_val = $data -> dates_recurring_val;
$dates_recurring_int = $data -> dates_recurring_int;
	
?>

<table class="form-table">
	<tbody>
		<tr>
			<th><label for="Autoresponder_dates"><?php _e('Send on Specific Date?', $this -> extension_name); ?></label></th>
			<td>
				<label><input onclick="if (jQuery(this).is(':checked')) { jQuery('#Autoresponder_dates_div').show(); } else { jQuery('#Autoresponder_dates_div').hide(); }" type="checkbox" <?php echo (!empty($data -> dates)) ? 'checked="checked"' : ''; ?> name="Autoresponder[dates]" value="1" id="Autoresponder_dates" /> <?php _e('Yes, configure a specific date', $this -> extension_name); ?></label>
				<?php echo $Html -> field_error('Autoresponder[dates]'); ?>
			</td>
		</tr>
	</tbody>
</table>

<div id="Autoresponder_dates_div" style="display:<?php echo (!empty($data -> dates)) ? 'block' : 'none'; ?>;">
	<table class="form-table">
		<tbody>
			<tr>
				<th><label for=""><?php _e('Date Condition', $this -> extension_name); ?></label></th>
				<td>
					<p>Send 
					
					<input placeholder="<?php echo __('X eg. 7', $this -> extension_name); ?>" type="text" name="Autoresponder[dates_beforeint]" id="Autoresponder_dates_beforeint" value="<?php echo esc_attr(stripslashes($dates_beforeint)); ?>" class="widefat" style="width:65px;" />
					
					<?php $dates_beforevals = array('days' => __('Days', $this -> extension_name), 'weeks' => __('Weeks', $this -> extension_name), 'months' => __('Months', $this -> extension_name), 'years' => __('Years', $this -> extension_name)); ?>
					<select name="Autoresponder[dates_beforeval]" id="Autoresponder_dates_beforeval">
						<option value=""><?php _e('- Select -', $this -> extension_name); ?></option>
						<?php foreach ($dates_beforevals as $bkey => $bval) : ?>
							<option <?php echo (!empty($dates_beforeval) && $dates_beforeval == $bkey) ? 'selected="selected"' : ''; ?> value="<?php echo $bkey; ?>"><?php echo $bval; ?></option>
						<?php endforeach; ?>
					</select>
					
					<select name="Autoresponder[dates_beforeway]" id="Autoresponder_dates_beforeway">
						<option value=""><?php _e('- Select -', $this -> extension_name); ?></option>
						<option <?php echo (!empty($dates_beforeway) && $dates_beforeway == "before") ? 'selected="selected"' : ''; ?> value="before"><?php _e('Before', $this -> extension_name); ?></option>
						<option <?php echo (!empty($dates_beforeway) && $dates_beforeway == "after") ? 'selected="selected"' : ''; ?> value="after"><?php _e('After', $this -> extension_name); ?></option>
					</select>
					<?php echo $Html -> help(__('Choose how long before or after the date match the email should be sent. Use zero (0) to send on the match exactly.', $this -> extension_name)); ?>
					</p>
					<p>when the
					
					<span class="select2-multiple">
						<select name="Autoresponder[dates_datepart][]" id="Autoresponder_dates_datepart" multiple="multiple">
							<option value=""><?php _e('- Select -', $this -> extension_name); ?></option>
							<option <?php echo (!empty($dates_datepart) && in_array('day', $dates_datepart)) ? 'selected="selected"' : ''; ?> value="day"><?php _e('Day', $this -> extension_name); ?></option>
							<option <?php echo (!empty($dates_datepart) && in_array('month', $dates_datepart)) ? 'selected="selected"' : ''; ?> value="month"><?php _e('Month', $this -> extension_name); ?></option>
							<option <?php echo (!empty($dates_datepart) && in_array('year', $dates_datepart)) ? 'selected="selected"' : ''; ?> value="year"><?php _e('Year', $this -> extension_name); ?></option>
						</select>
					</span>
					<?php echo $Html -> help(__('Pick the date parts that should match, eg. Day + Month, Day, Day + Month + Year', $this -> extension_name)); ?>
					
					of the custom field
					
					<?php $Db -> model = $Field -> model; ?>
					<?php if ($fields = $Db -> find_all()) : ?>
						<select name="Autoresponder[dates_field]" id="Autoresponder_dates_field">
							<option value=""><?php _e('- Select -', $this -> extension_name); ?></option>
							<?php foreach ($fields as $field) : ?>
								<option <?php echo (!empty($dates_field) && $dates_field == $field -> id) ? 'selected="selected"' : ''; ?> value="<?php echo $field -> id; ?>"><?php echo __($field -> title); ?></option>
							<?php endforeach; ?>
							<option <?php echo (!empty($dates_field) && $dates_field == "created") ? 'selected="selected"' : ''; ?> value="created"><?php _e('Created Date', $this -> extension_name); ?></option>
							<option <?php echo (!empty($dates_field) && $dates_field == "modified") ? 'selected="selected"' : ''; ?> value="modified"><?php _e('Modified Date', $this -> extension_name); ?></option>
						</select>
						<?php echo $Html -> help(__('Choose a custom field value on subscribers to match to the current date.', $this -> extension_name)); ?>
					<?php endif; ?>
					</p>
					<p>
					value on subscriber is equal to the current date. <?php echo $Html -> help(__('Current date refers to the date each time the autoresponder cron runs to check if values of the custom field of subscribers match this criteria.', $this -> extension_name)); ?></p>
					
					<?php echo $Html -> field_error('Autoresponder[dates_datepart]'); ?>
					<?php echo $Html -> field_error('Autoresponder[dates_field]'); ?>
				</td>
			</tr>
			<tr>
				<th><label for="Autoresponder_dates_recurring_val"><?php _e('Recurring', $this -> extension_name); ?></label></th>
				<td>
					<input <?php echo (!empty($dates_recurring)) ? 'checked="checked"' : ''; ?> type="checkbox" name="Autoresponder[dates_recurring]" value="1" id="Autoresponder_dates_recurring" />
					<?php $dates_recurring_ints = array('days' => __('Days', $this -> extension_name), 'weeks' => __('Weeks', $this -> extension_name), 'months' => __('Months', $this -> extension_name), 'years' => __('Years', $this -> extension_name)); ?>
					<label for="Autoresponder_dates_recurring">Repeat every </label>
					<input class="widefat" style="width:65px;" type="text" name="Autoresponder[dates_recurring_val]" value="<?php echo esc_attr(stripslashes($dates_recurring_val)); ?>" id="Autoresponder_dates_recurring_val" />
					<select name="Autoresponder[dates_recurring_int]" id="">
						<option value=""><?php _e('- Select -', $this -> extension_name); ?></option>
						<?php foreach ($dates_recurring_ints as $ckey => $cval) : ?>
							<option <?php echo (!empty($dates_recurring_int) && $dates_recurring_int == $ckey) ? 'selected="selected"' : ''; ?> value="<?php echo $ckey; ?>"><?php echo $cval; ?></option>
						<?php endforeach; ?>
					</select>
					<label for="Autoresponder_dates_recurring">after the last send<br/>
					on the date condition specified above.</label>
				</td>
			</tr>
		</tbody>
	</table>
</div>