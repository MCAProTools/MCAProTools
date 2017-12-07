<div class="wrap <?php echo $this -> pre; ?> newsletters">
	<h2><?php _e('Save a Template', 'wp-mailinglist'); ?></h2>
    
    <p>
    	<?php _e('This is a full HTML template and should contain at least <code>[newsletters_main_content]</code> somewhere.', 'wp-mailinglist'); ?><br/>
        <?php _e('You may use any of the', 'wp-mailinglist'); ?> <a class="button button-secondary" href="" onclick="jQuery.colorbox({title:'<?php _e('Shortcodes/Variables', 'wp-mailinglist'); ?>', maxHeight:'80%', maxWidth:'80%', href:'<?php echo admin_url('admin-ajax.php'); ?>?action=<?php echo $this -> pre; ?>setvariables'}); return false;"> <?php _e('shortcodes/variables', 'wp-mailinglist'); ?></a> <?php _e('inside templates.', 'wp-mailinglist'); ?><br/>
        <?php _e('Upload your images, stylesheets and other elements via FTP or the media uploader in WordPress.', 'wp-mailinglist'); ?><br/>
        <?php _e('Please ensure that all links, images and other references use full, absolute URLs.', 'wp-mailinglist'); ?>
    </p>
    
    <form action="?page=<?php echo $this -> sections -> themes; ?>&amp;method=save" method="post" enctype="multipart/form-data">
    	<?php echo $Form -> hidden('Theme[id]'); ?>
    	<?php echo $Form -> hidden('Theme[name]'); ?>
    	
    	<div id="poststuff">
			<div id="post-body" class="metabox-holder columns-2">
				<div id="post-body-content">
					<div id="titlediv">
						<div id="titlewrap">
                            <label class="screen-reader-text" for="title"></label>
							<input placeholder="<?php echo esc_attr(stripslashes(__('Enter template title here', 'wp-mailinglist'))); ?>" onclick="jQuery('iframe#content_ifr').attr('tabindex', '2');" tabindex="1" id="title" autocomplete="off" type="text" name="Theme[title]" value="<?php echo esc_attr(stripslashes($Html -> field_value('Theme[title]'))); ?>" />
                        </div>
                    </div>
                    
                    <p>
                    	<label><input <?php echo ($Html -> field_value('Theme[type]') == "upload" || $Html -> field_value('Theme[type]') == "") ? 'checked="checked"' : ''; ?> onclick="newsletters_theme_change_type(this.value);" type="radio" name="Theme[type]" value="upload" id="Theme.type_upload" /> <?php _e('Upload an HTML File', 'wp-mailinglist'); ?></label>
						<label><input <?php echo ($Html -> field_value('Theme[type]') == "paste") ? 'checked="checked"' : ''; ?> onclick="newsletters_theme_change_type(this.value);" type="radio" name="Theme[type]" value="paste" id="Theme.type_paste" /> <?php _e('HTML Code', 'wp-mailinglist'); ?></label>
                    </p>
                    
                    <div id="Theme_type_paste_div" class="postarea edit-form-section" style="display:<?php echo ($Html -> field_value('Theme[type]') == "paste") ? 'block' : 'none'; ?>;">                        
						<p><input type="button" class="button button-secondary" id="thememediaupload" value="<?php _e('Add Media', 'wp-mailinglist'); ?>" /></p>
	        
				        <script type="text/javascript">
			        	jQuery(document).ready(function() {
							var file_frame;
							
							jQuery('#thememediaupload').live('click', function( event ){
								event.preventDefault();
								
								// If the media frame already exists, reopen it.
								if (file_frame) {
									file_frame.open();
									return;
								}
								
								// Create the media frame.
								file_frame = wp.media.frames.file_frame = wp.media({
									title: '<?php _e('Upload Media', 'wp-mailinglist'); ?>',
									button: {
										text: '<?php _e('Copy URL', 'wp-mailinglist'); ?>',
									},
									multiple: false  // Set to true to allow multiple files to be selected
								});
									
								// When an image is selected, run a callback.
								file_frame.on( 'select', function() {
									// We set multiple to false so only get one image from the uploader
									attachment = file_frame.state().get('selection').first().toJSON();
									
									// Do something with attachment.id and/or attachment.url here									
									window.prompt("Copy to clipboard: Ctrl+C, Enter", attachment.url);
								});
								
								// Finally, open the modal
								file_frame.open();
							});
			        	});
			        	</script>
				        
			        	<textarea name="Theme[paste]" class="widefat" contenteditable="true" id="Theme_paste" rows="10" cols="100%"><?php echo esc_attr(stripslashes($Theme -> data -> paste)); ?></textarea>
                        
                        <?php echo $Html -> field_error('Template[content]'); ?>
                    </div>
                </div>
                <div id="postbox-container-1" class="postbox-container">
                	<?php do_action('submitpage_box'); ?>
                	<?php do_meta_boxes("admin_page_" . $this -> sections -> themes, 'side', $post); ?>
                </div>
                <div id="postbox-container-2" class="postbox-container">
                	<?php do_meta_boxes("admin_page_" . $this -> sections -> themes, 'normal', $post); ?>
                    <?php do_meta_boxes("admin_page_" . $this -> sections -> themes, 'advanced', $post); ?>
                </div>
            </div>
        </div>
    
    	<?php /*<table class="form-table">
        	<tbody>
            	<tr>
                	<th><label for="Theme.title"><?php _e('Title', 'wp-mailinglist'); ?></label>
                	<?php echo $Html -> help(__('The title of this newsletter template for internal usage.', 'wp-mailinglist')); ?></th>
                    <td>
                    	<?php echo $Form -> text('Theme[title]', array('placeholder' => __('Enter template title here', 'wp-mailinglist'))); ?>
                    </td>
                </tr>
                <tr>
                	<th><label for="Theme.type_upload"><?php _e('Template Type', 'wp-mailinglist'); ?></label>
                	<?php echo $Html -> help(__('Choose how you want to save this newsletter template. You can either paste HTML code or upload a .html file.', 'wp-mailinglist')); ?></th>
                    <td>
                    	<label><input <?php echo ($Html -> field_value('Theme[type]') == "upload" || $Html -> field_value('Theme[type]') == "") ? 'checked="checked"' : ''; ?> onclick="jQuery('#typediv_upload').show(); jQuery('#typediv_paste').hide();" type="radio" name="Theme[type]" value="upload" id="Theme.type_upload" /> <?php _e('Upload an HTML File', 'wp-mailinglist'); ?></label>
                        <label><input <?php echo ($Html -> field_value('Theme[type]') == "paste") ? 'checked="checked"' : ''; ?> onclick="jQuery('#typediv_paste').show(); jQuery('#typediv_upload').hide();" type="radio" name="Theme[type]" value="paste" id="Theme.type_paste" /> <?php _e('HTML Code', 'wp-mailinglist'); ?></label>
                    </td>
                </tr>
            </tbody>
        </table>
        
        <div id="typediv_upload" style="display:<?php echo ($Html -> field_value('Theme[type]') == "" || $Html -> field_value('Theme[type]') == "upload") ? 'block' : 'none'; ?>;">
        	<table class="form-table">
            	<tbody>
                	<tr>
                    	<th><label for=""><?php _e('Choose HTML File', 'wp-mailinglist'); ?></label></th>
                        <td>
                        	<input class="widefat" type="file" name="upload" value="" />
                            <?php if (!empty($Theme -> errors['upload'])) : ?>
                            	<div class="newsletters_error"><?php echo $Theme -> errors['upload']; ?></div>
                            <?php endif; ?>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        
        <div id="typediv_paste" style="display:<?php echo ($Html -> field_value('Theme[type]') == "paste") ? 'block' : 'none'; ?>;">
	        <p><input type="button" class="button button-secondary" id="thememediaupload" value="<?php _e('Add Media', 'wp-mailinglist'); ?>" /></p>
	        
	        <script type="text/javascript">
        	jQuery(document).ready(function() {
				var file_frame;
				
				jQuery('#thememediaupload').live('click', function( event ){
					event.preventDefault();
					
					// If the media frame already exists, reopen it.
					if (file_frame) {
						file_frame.open();
						return;
					}
					
					// Create the media frame.
					file_frame = wp.media.frames.file_frame = wp.media({
						title: '<?php _e('Upload Media', 'wp-mailinglist'); ?>',
						button: {
							text: '<?php _e('Copy URL', 'wp-mailinglist'); ?>',
						},
						multiple: false  // Set to true to allow multiple files to be selected
					});
						
					// When an image is selected, run a callback.
					file_frame.on( 'select', function() {
						// We set multiple to false so only get one image from the uploader
						attachment = file_frame.state().get('selection').first().toJSON();
						
						// Do something with attachment.id and/or attachment.url here
						
						//jQuery('#Slide_attachment_id').val(attachment.id);
						//jQuery('#Slide_image_file').val(attachment.url);
						//jQuery('#Slide_mediaupload_image').html('<a href="' + attachment.url + '" class="colorbox" onclick="jQuery.colorbox({href:\'' + attachment.url + '\'}); return false;"><img class="slideshow_dropshadow" style="width:100px;" src="' + attachment.sizes.thumbnail.url + '" /></a>');
						
						window.prompt("Copy to clipboard: Ctrl+C, Enter", attachment.url);
					});
					
					// Finally, open the modal
					file_frame.open();
				});
        	});
        	</script>
	        
        	<textarea name="Theme[paste]" class="widefat" contenteditable="true" id="Theme_paste" rows="10" cols="100%"><?php echo esc_attr(stripslashes($Theme -> data -> paste)); ?></textarea>
        	
        	<script type="text/javascript">
        	jQuery(document).ready(function() {	        	
            	jQuery('textarea#Theme_paste').ckeditor({
                	fullPage: true,
					allowedContent: true,
					height: 500,
					entities: false,
					//extraPlugins: 'image2,autogrow,codesnippet,tableresize',
					extraPlugins: 'image2,codesnippet,tableresize',
					autoGrow_onStartup: true
            	});
        	});
        	</script>
        </div>
        
        <?php if (true || empty($Theme -> data -> id)) : ?>
        	<table class="form-table">
	        	<tbody>
		        	<tr>
		        		<th><label for="Theme_imgprependurl"><?php _e('Image Prepend URL', 'wp-mailinglist'); ?></label>
		        		<?php echo $Html -> help(__('If your template has relative image paths in the source, this image prepend URL setting is very useful to automatically add an absolute URL to the source attribute of all images. Eg. <code>src="images/myimage.jpg"</code> and you fill in a prepend URL of <code>http://domain.com/</code>, it will become <code>src="http://domain.com/images/myimage.jpg"</code>', 'wp-mailinglist')); ?></th>
		        		<td>
		        			<input type="text" class="widefat" name="Theme[imgprependurl]" value="<?php echo esc_attr(stripslashes($Theme -> data -> imgprependurl)); ?>" id="Theme_imgprependurl" />
		        			<span class="howto"><small><?php _e('(optional)', 'wp-mailinglist'); ?></small> <?php _e('Prepend the SRC attribute of IMG tags with a URL', 'wp-mailinglist'); ?></span>
		        		</td>
		        	</tr>
	        	</tbody>
        	</table>
        <?php endif; ?>
        
        <table class="form-table">
        	<tbody>
        		<tr>
        			<th><label for="Theme_inlinestyles_N"><?php _e('Inline Styles', 'wp-mailinglist'); ?></label>
        			<?php echo $Html -> help(__('Set this setting to "Yes" to automatically convert all CSS rules into inline, style attributes in the HTML elements. If you use this setting, be sure to create a backup of your original HTML for easier editing later on.', 'wp-mailinglist')); ?></th>
        			<td>
        				<label><input onclick="if (!confirm('<?php echo __('Please ensure that you create a local copy/backup of your newsletter template HTML for editing in the future.', 'wp-mailinglist'); ?>')) { return false; }" type="radio" name="Theme[inlinestyles]" value="Y" id="Theme_inlinestyles_Y" /> <?php _e('Yes', 'wp-mailinglist'); ?></label>
        				<label><input type="radio" checked="checked" name="Theme[inlinestyles]" value="N" id="Theme_inlinestyles_N" /> <?php _e('No', 'wp-mailinglist'); ?></label>
        				<span class="howto"><?php _e('Convert CSS rules into inline, style attributes on elements.', 'wp-mailinglist'); ?></span>
        			</td>
        		</tr>
        		<tr>
        			<th><label for="Theme_acolor"><?php _e('Shortcode Link Color', 'wp-mailinglist'); ?></label>
        			<?php echo $Html -> help(__('Set the color of the links generated from the plugin shortcodes dynamically.', 'wp-mailinglist')); ?></th>
        			<td>
        				<fieldset>
        					<legend class="screen-reader-text"><span><?php _e('Background Color', 'wp-mailinglist'); ?></span></legend>
        					<div class="wp-picker-container">
        						<a tabindex="0" id="acolorbutton" class="wp-color-result" style="background-color:<?php echo $Html -> field_value('Theme[acolor]'); ?>;" title="Select Color"></a>
        						<span class="wp-picker-input-wrap">
        							<input type="text" name="Theme[acolor]" id="Theme_acolor" value="<?php echo $Html -> field_value('Theme[acolor]'); ?>" class="wp-color-picker" style="display: none;" />
        						</span>
        					</div>
						</fieldset>
						
						<script type="text/javascript">
						jQuery(document).ready(function() {
							newsletters_focus('#Theme\\.title');
							
							jQuery('#Theme_acolor').iris({
								hide: true,
								change: function(event, ui) {
									jQuery('#acolorbutton').css('background-color', ui.color.toString());
								}
							});
							
							jQuery('#Theme_acolor').click(function(event) {
								event.stopPropagation();
							});
						
							jQuery('#acolorbutton').click(function(event) {							
								jQuery(this).attr('title', "Current Color");
								jQuery('#Theme_acolor').iris('toggle').toggle();								
								event.stopPropagation();
							});
							
							jQuery('html').click(function() {
								jQuery('#Theme_acolor').iris('hide').hide();
								jQuery('#acolorbutton').attr('title', "Select Color");
							});
						});
						</script>
						<span class="howto"><?php echo sprintf(__('Control the color of the links generated by shortcodes such as %s, %s, %s, etc.', 'wp-mailinglist'), '[newsletters_online]', '[newsletters_activate]', '[newsletters_unsubscribe]'); ?></span>
        			</td>
        		</tr>
        	</tbody>
        </table>
        
        <p class="submit">
        	<input class="button-primary" type="submit" name="save" value="<?php _e('Save Template', 'wp-mailinglist'); ?>" />
        	<div class="newsletters_continueediting">
				<label><input <?php echo (!empty($_REQUEST['continueediting'])) ? 'checked="checked"' : ''; ?> type="checkbox" name="continueediting" value="1" id="continueediting" /> <?php _e('Continue editing', 'wp-mailinglist'); ?></label>
			</div>
        </p>*/ ?>
    </form>
</div>

<script type="text/javascript">
jQuery(document).ready(function() {
	newsletters_focus('#Theme\\.title');
					
	jQuery('#Theme_acolor').iris({
		hide: true,
		change: function(event, ui) {
			jQuery('#acolorbutton').css('background-color', ui.color.toString());
		}
	});
	
	jQuery('#Theme_acolor').click(function(event) {
		event.stopPropagation();
	});
	
	jQuery('#acolorbutton').click(function(event) {							
		jQuery(this).attr('title', "Current Color");
		jQuery('#Theme_acolor').iris('toggle').toggle();								
		event.stopPropagation();
	});
	
	jQuery('html').click(function() {
		jQuery('#Theme_acolor').iris('hide').hide();
		jQuery('#acolorbutton').attr('title', "Select Color");
	});
	
	jQuery('textarea#Theme_paste').ckeditor({
    	fullPage: true,
		allowedContent: true,
		height: 500,
		entities: false,
		extraPlugins: 'image2,codesnippet,tableresize',
		autoGrow_onStartup: true
	});
});

function newsletters_theme_change_type(type) {
	if (type == "paste") {
		jQuery('#Theme_type_upload_div').hide();
		jQuery('#Theme_type_paste_div').show();
	} else if (type == "upload") {
		jQuery('#Theme_type_paste_div').hide();
		jQuery('#Theme_type_upload_div').show();
	}
	
}
</script>