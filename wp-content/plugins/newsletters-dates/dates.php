<?php
	
/*
Plugin Name: Newsletters - Special Dates Autoresponder
Plugin URI: http://tribulant.com
Description: Send autoresponder emails to subscribers on special/specific dates based on custom field values for the Newsletter plugin
Author: Tribulant Software
Version: 1.1
Author URI: http://tribulant.com
Text Domain: newsletters-dates
Domain Path: /languages
*/

if (!defined('NEWSLETTERS_EXTENSION_URL')) { define('NEWSLETTERS_EXTENSION_URL', "http://tribulant.com/extensions/"); }
if (!defined('DS')) { define('DS', DIRECTORY_SEPARATOR); }

if (!class_exists('newsletters_dates')) {	
	$path = dirname(dirname(__FILE__)) . DS . 'wp-mailinglist' . DS . 'wp-mailinglist.php';
	$path2 = dirname(dirname(__FILE__)) . DS . 'newsletters-lite' . DS . 'wp-mailinglist.php';
	
	if (file_exists($path)) {
		require_once($path);
	} elseif (file_exists($path2)) {
		require_once($path2);
	} elseif (defined('NEWSLETTERS_NAME')) {
		$path = dirname(dirname(__FILE__)) . DS . NEWSLETTERS_NAME . DS . 'wp-mailinglist.php';
		if (file_exists($path)) {
			require_once($path);
		}
	}
	
	if (class_exists('wpMailPlugin')) {
		class newsletters_dates extends wpMailPlugin {	
			
			function newsletters_dates() {
				$this -> sections = (object) $this -> sections;
				$this -> extension_name = basename(dirname(__FILE__));
				$this -> extension_path = plugin_basename(__FILE__);
				$this -> version = '1.1';
				
				$path1 = dirname(dirname(__FILE__)) . DS . 'wp-mailinglist' . DS . 'wp-mailinglist.php';
				$path2 = dirname(dirname(__FILE__)) . DS . 'newsletters-lite' . DS . 'wp-mailinglist.php';
				
				if (file_exists($path1)) {
					$this -> parent_name = 'wp-mailinglist';
					$this -> parent_path = plugin_basename('wp-mailinglist' . DS . 'wp-mailinglist.php');
				} elseif (file_exists($path2)) {
					$this -> parent_name = 'newsletters-lite';
					$this -> parent_path = plugin_basename('newsletters-lite' . DS . 'wp-mailinglist.php');
				} elseif (defined('NEWSLETTERS_NAME') && file_exists(dirname(dirname(__FILE__)) . DS . NEWSLETTERS_NAME . DS . 'wp-mailinglist.php')) {
					$this -> parent_name = NEWSLETTERS_NAME;
					$this -> parent_path = plugin_basename(NEWSLETTERS_NAME . DS . 'wp-mailinglist.php');
				}
				
				$this -> updating();
			}
			
			function updating() {				
				if (is_admin()) {										
					if (!$cur_version = $this -> get_option('newsletters_dates_version')) {
						$this -> add_option('newsletters_dates_version', '1.1');
						$cur_version = '1.0';
					}
					
					$new_version = $cur_version;
					
					if (version_compare($cur_version, $this -> version) < 0) {
						global $wpdb;
						
						$query = "ALTER TABLE `" . $wpdb -> prefix . $this -> Autoresponder() -> table . "` CHANGE `dates_field` `dates_field` VARCHAR(150) NOT NULL DEFAULT ''";
						$wpdb -> query($query);
						
						$new_version = '1.1';
					}
					
					$this -> update_option('newsletters_dates_version', $new_version);
				}
			}
			
			function activation_hook() {
				require_once ABSPATH . 'wp-admin' . DS . 'includes' . DS . 'admin.php';
				
				if (!is_plugin_active(plugin_basename($this -> parent_path))) {
					_e('You must have the Newsletter plugin installed and activated in order to use this.', $this -> extension_name);
					exit(); die();
				} else {
					$required = '4.5.3';
					$plugin_data = get_plugin_data(WP_PLUGIN_DIR . DS . $this -> parent_path);
					$plugin_version = $plugin_data['Version'];
					
					$versiongood = false;
					if (version_compare($plugin_version, $required) >= 0) {
						$versiongood = true;	
					}
					
					if ($versiongood == true) {
						$this -> check_tables();
						
						/* Special Dates Autoresponder options/settings */
						//...
						
					} else {
						echo sprintf(__('The %s extension requires the Newsletter plugin %s at least.', $this -> extension_name), "Special Dates Autoresponder", $required);
						exit(); die();	
					}
				}
				
				return true;
			}
			
			function init_textdomain() {		
				if (function_exists('load_plugin_textdomain')) {			
					load_plugin_textdomain($this -> extension_name, false, $this -> extension_name . DS . 'languages' . DS);
				}	
			}
			
			function db_tables($tables = array()) {				
				// do something with tables?
				
				if (!empty($tables[$this -> Autoresponder() -> table])) {
					$tables[$this -> Autoresponder() -> table]['dates'] = "INT(1) NOT NULL DEFAULT '0'";
					$tables[$this -> Autoresponder() -> table]['dates_beforeint'] = "INT(11) NOT NULL DEFAULT '0'";
					$tables[$this -> Autoresponder() -> table]['dates_beforeval'] = "VARCHAR(50) NOT NULL DEFAULT ''";
					$tables[$this -> Autoresponder() -> table]['dates_beforeway'] = "VARCHAR(50) NOT NULL DEFAULT ''";
					$tables[$this -> Autoresponder() -> table]['dates_datepart'] = "VARCHAR(150) NOT NULL DEFAULT ''";
					$tables[$this -> Autoresponder() -> table]['dates_field'] = "VARCHAR(150) NOT NULL DEFAULT '0'";
					$tables[$this -> Autoresponder() -> table]['dates_recurring'] = "INT(1) NOT NULL DEFAULT '0'";
					$tables[$this -> Autoresponder() -> table]['dates_recurring_val'] = "INT(11) NOT NULL DEFAULT '0'";
					$tables[$this -> Autoresponder() -> table]['dates_recurring_int'] = "VARCHAR(50) NOT NULL DEFAULT ''";
				}
				
				return $tables;
			}
			
			function db_table_fields($fields = array(), $model = null) {
				// do something with fields?				
				
				if (!empty($model) && $model == "Autoresponder") {
					
					if (!empty($_POST['Autoresponder']) && empty($_POST['Autoresponder']['dates'])) {
						return $fields;
					}
					
					$fields['dates'] = "INT(1) NOT NULL DEFAULT '0'";
					$fields['dates_beforeint'] = "INT(11) NOT NULL DEFAULT '0'";
					$fields['dates_beforeval'] = "VARCHAR(50) NOT NULL DEFAULT ''";
					$fields['dates_beforeway'] = "VARCHAR(50) NOT NULL DEFAULT ''";
					$fields['dates_datepart'] = "VARCHAR(150) NOT NULL DEFAULT ''";
					$fields['dates_field'] = "VARCHAR(150) NOT NULL DEFAULT '0'";
					$fields['dates_recurring'] = "INT(1) NOT NULL DEFAULT '0'";
					$fields['dates_recurring_val'] = "INT(11) NOT NULL DEFAULT '0'";
					$fields['dates_recurring_int'] = "VARCHAR(50) NOT NULL DEFAULT ''";
				}
				
				return $fields;
			}
			
			function autoresponder_save_fields_after($data = null) {
				$this -> render('views' . DS . 'save', array('data' => $data), true, false, 'dates');
			}
			
			function autoresponder_validation($errors = array(), $data = array()) {				
				if (!empty($data)) {
					if (!empty($data['dates'])) {
						if (empty($data['dates_datepart'])) {
							$errors['dates_datepart'] = __('Choose at least one date part to match', $this -> extension_name);
						} else {
							$this -> Autoresponder() -> data -> dates_datepart = maybe_serialize($data['dates_datepart']);
						}
						
						if (empty($data['dates_field'])) {
							$errors['dates_field'] = __('Select a field value to match', $this -> extension_name);
						}
						
						if (empty($data['dates_recurring'])) {
							$this -> Autoresponder() -> data -> dates_recurring = 0;
						}
					}	
				}
				
				return $errors;
			}
			
			function autoresponders_hook_start() {								
				global $wpdb, $Html, $Db, $Field, $Subscriber, $SubscribersList, $History, $HistoriesAttachment;
				
				$autoresponders_table = $wpdb -> prefix . $this -> Autoresponder() -> table;
				$subscribers_table = $wpdb -> prefix . $Subscriber -> table;
				
				$datesemailssent = 0;
				
				$Db -> model = $this -> Autoresponder() -> model;		
				if ($autoresponders = $Db -> find_all(array('dates' => 1, 'status' => "'active'"))) {
					foreach ($autoresponders as $autoresponder) {
						if (!empty($autoresponder -> dates_datepart)) {
							$date_string = "";
							$dates_datepart = array_reverse(maybe_unserialize($autoresponder -> dates_datepart));
							
							if (!empty($autoresponder -> dates_beforeint) && !empty($autoresponder -> dates_beforeval) && !empty($autoresponder -> dates_beforeway)) {
								$date_timetamp = strtotime((($autoresponder -> dates_beforeway == "before") ? '+' : '-') . $autoresponder -> dates_beforeint . ' ' . $autoresponder -> dates_beforeval);
							} else {
								$date_timetamp = time();
							}
							
							$Db -> model = $Field -> model;
							if (($autoresponder -> dates_field == "created" || $autoresponder -> dates_field == "modified") || $field = $Db -> find(array('id' => $autoresponder -> dates_field))) {
								
								if (empty($field)) {
									$field = new stdClass();
									$field -> slug = $autoresponder -> dates_field;
								}
								
								$query = "SELECT * FROM `" . $subscribers_table . "` WHERE ";
								
								if (!empty($dates_datepart)) {
									$f = 1;
									foreach ($dates_datepart as $part) {
										switch ($part) {
											case 'day'			:
												$query .= "DAYOFMONTH(`" . $field -> slug . "`) = '" . date_i18n("j", $date_timetamp) . "' ";
												break;
											case 'month'		:
												$query .= "MONTH(`" . $field -> slug . "`) = '" . date_i18n("n", $date_timetamp) . "' ";
												break;
											case 'year'			:
												$query .= "YEAR(`" . $field -> slug . "`) = '" . date_i18n("Y", $date_timetamp) . "' ";
												break;
										}
										
										if ($f < count($dates_datepart)) {
											$query .= "AND ";
										}
										
										$f++;
									}
								}
								
								if ($subscribers = $wpdb -> get_results($query)) {									
									foreach ($subscribers as $subscriber) {
										
										$query = "SELECT * FROM `" . $wpdb -> prefix . $SubscribersList -> table . "` WHERE `subscriber_id` = '" . $subscriber -> id . "' AND (";
										$a = 1;
										foreach ($autoresponder -> lists as $list_id) {
											$query .= "`list_id` = '" . $list_id . "'";
											
											if ($a < count($autoresponder -> lists)) {
												$query .= " OR ";
											}
											
											$a++;
										}
										$query .= ") AND `active` = 'Y'";
										
										if ($subscriberslist = $wpdb -> get_row($query)) {				
											if (!empty($subscriberslist -> active) && $subscriberslist -> active == "Y") {																				
												$Db -> model = $this -> Autoresponderemail() -> model;
												if ((!$autoresponderemail = $Db -> find(array('subscriber_id' => $subscriber -> id, 'autoresponder_id' => $autoresponder -> id))) || (!empty($autoresponder -> dates_recurring)) || (!empty($autoresponder -> alwayssend) && $autoresponder -> alwayssend == "Y")) {									
													
													if (!empty($autoresponderemail)) {														
														if (!empty($autoresponder -> dates_recurring) && !empty($autoresponder -> dates_recurring_val) && !empty($autoresponder -> dates_recurring_int)) {															
															$eligible = strtotime("+" . $autoresponder -> dates_recurring_val . " " . $autoresponder -> dates_recurring_int);
															$senddate = strtotime($autoresponderemail -> senddate);
															
															if ($senddate >= $eligible) {
																//go ahead and do it, it is time again
															} else {
																//it is too soon, continue the loop
																continue;
															}
														}
													}
													
													$Db -> model = $History -> model;
													$history = $Db -> find(array('id' => $autoresponder -> history_id));
													$history -> attachments = array();
													$attachmentsquery = "SELECT id, title, filename FROM " . $wpdb -> prefix . $HistoriesAttachment -> table . " WHERE history_id = '" . $history -> id . "'";
													
													if ($attachments =  $wpdb -> get_results($attachmentsquery)) {
														foreach ($attachments as $attachment) {
															$history -> attachments[] = array(
																'id'					=>	$attachment -> id,
																'title'					=>	$attachment -> title,
																'filename'				=>	$attachment -> filename,
															);	
														}
													}
													
													$subscriber -> mailinglist_id = $subscriberslist -> list_id;
													$eunique = $Html -> eunique($subscriber, $history -> id);
													
													$autoresponderemail_data = array(
														'autoresponder_id'				=>	$autoresponder -> id,
														'list_id'						=>	$subscriberslist -> list_id,
														'subscriber_id'					=>	$subscriber -> id,
														'senddate'						=>	date_i18n("Y-m-d H:i:s", strtotime("+" . $autoresponder -> delay . " " . $autoresponder -> delayinterval)),
													);
													
													$Db -> model = $this -> Autoresponderemail() -> model;
													$Db -> save($autoresponderemail_data, true);
													$ae_id = $this -> Autoresponderemail() -> insertid;
													$Db -> model = $Email -> model;
													$message = $this -> render_email('send', array('message' => $history -> message, 'subject' => $history -> subject, 'subscriber' => $subscriber, 'history_id' => $history -> id, 'post_id' => $history -> post_id, 'eunique' => $eunique), false, $this -> htmltf($subscriber -> format), true, $history -> theme_id);
													
													if ($this -> execute_mail($subscriber, false, $history -> subject, $message, $history -> attachments, $history -> id, $eunique)) {								
														$Db -> model = $this -> Autoresponderemail() -> model;
														$Db -> save_field('status', "sent", array('id' => $ae_id));
														
														$datesemailssent++;
													}	
												}
											}
										}
									}
								}
							}
						}
					}
				}
				
				echo sprintf(__('%s special dates autoresponder emails sent', $this -> extension_name), $datesemailssent) . '<br/>';
			}
			
			function autoresponders_send($subscriber = null, $mailinglist = null) {
				// do something with subscriber and mailing list...
			}
			
			function extensions_list($extensions = array()) {
				$extensions['dates'] = array(
					'name'			=>	__('Special Dates Autoresponder', $this -> extension_name),
					'link'			=>	"http://tribulant.com/extensions/",
					'image'			=>	plugins_url() . '/' . $this -> extension_name . '/images/icon.png',
					'description'	=>	sprintf(__("Send autoresponder emails to subscribers on special/specific dates based on custom field values for %s.", $this -> extension_name), '<a href="http://tribulant.com/plugins/view/1/wordpress-newsletter-plugin" target="_blank">' . __('Newsletter plugin', $this -> extension_name) . '</a>'),
					'slug'			=>	'dates',
					'plugin_name'	=>	$this -> extension_name,
					'plugin_file'	=>	'dates.php',
					'settings'		=>	admin_url('admin.php?page=' . $this -> sections -> extensions_settings . '#dates'),
				);
				
				$titles = array();
				foreach ($extensions as $extension) {
					$titles[] = $extension['name'];
				}
				
				array_multisort($titles, SORT_ASC, $extensions);
				return $extensions;
			}
			
			function action_links($links = array()) {
				$settings_link = '<a href="' . admin_url('admin.php?page=' . $this -> sections -> extensions_settings . '#dates') . '">' . __('Settings', $this -> extension_name) . '</a>'; 
				array_unshift($links, $settings_link); 
				return $links;
			}
			
			function extensions_settings($page = null) {
				add_meta_box('dates', '<img src="' . plugins_url() . '/' . $this -> extension_name . '/images/icon-16.png" alt="dates" /> ' . __('Special Dates Autoresponder', $this -> extension_name), array($this, 'settings'), $page, 'normal', 'core');
			}
			
			function settings() {
				$this -> render('views' . DS . 'settings', false, true, false, 'dates');
			}
			
			function after_plugin_row($plugin_name = null) {				
		        $key = $this -> get_option('serialkey');
		        $update = $this -> vendor('update');
		        $version_info = $update -> get_version_info();
		    }
			
			function display_changelog() {
				if (!empty($_GET['plugin']) && $_GET['plugin'] == $this -> extension_name) {   		 
			    	require_once dirname(__FILE__) . DS . 'vendors' . DS . 'class.update.php';
					$update = new newsletters_dates_update();
			    	$changelog = $update -> get_changelog();
			    	$this -> render('views' . DS . 'changelog', array('changelog' => $changelog), true, false, 'dates');
			    	
			    	exit();
			    	die();
			    }
		    }
			
			function has_update($cache = true) {
				require_once dirname(__FILE__) . DS . 'vendors' . DS . 'class.update.php';
				$update = new newsletters_dates_update();
		        $version_info = $update -> get_version_info($cache);
		        return version_compare($this -> version, $version_info["version"], '<');
		    }
			
			function check_update($option, $cache = true) {
				require_once dirname(__FILE__) . DS . 'vendors' . DS . 'class.update.php';
				$update = new newsletters_dates_update();
		        $version_info = $update -> get_version_info($cache);
		
		        if (!$version_info) { return $option; }
		        
		        if(empty($option -> response[$this -> extension_path])) {
					$option -> response[$this -> extension_path] = new stdClass();
		        }
		
		        //Empty response means that the key is invalid. Do not queue for upgrade
		        if(!$version_info["is_valid_key"] || version_compare($this -> version, $version_info["version"], '>=')){
		            unset($option -> response[$this -> extension_path]);
		        } else {
		            $option -> response[$this -> extension_path] -> url = "http://tribulant.com/extensions/";
		            $option -> response[$this -> extension_path] -> slug = $this -> extension_name;
		            $option -> response[$this -> extension_path] -> package = $version_info['url'];
		            $option -> response[$this -> extension_path] -> new_version = $version_info["version"];
		            $option -> response[$this -> extension_path] -> id = "0";
		        }
		
		        return $option;
		    }
		}
		
		$newsletters_dates = new newsletters_dates();
		register_activation_hook(__FILE__, array($newsletters_dates, 'activation_hook'));
		add_action('init', array($newsletters_dates, 'init_textdomain'), 10, 1);
		add_filter('newsletters_db_tables', array($newsletters_dates, 'db_tables'), 10, 1);
		add_filter('newsletters_db_table_fields', array($newsletters_dates, 'db_table_fields'), 10, 2);
		add_filter('newsletters_db_table_fields_new', array($newsletters_dates, 'db_table_fields'), 10, 2);
		add_filter('newsletters_db_insert_fields', array($newsletters_dates, 'db_table_fields'), 10, 2);
		add_filter('newsletters_db_update_fields', array($newsletters_dates, 'db_table_fields'), 10, 2);
		add_action('newsletters_admin_autoresponder_save_fields_after', array($newsletters_dates, 'autoresponder_save_fields_after'), 10, 1);
		add_filter('newsletters_autoresponder_validation', array($newsletters_dates, 'autoresponder_validation'), 10, 2);
		add_action('newsletters_autoresponders_hook_start', array($newsletters_dates, 'autoresponders_hook_start'), 10, 1);
		add_action('newsletters_autoresponders_send', array($newsletters_dates, 'autoresponders_send'), 10, 2);
		add_filter('wpml_extensions_list', array($newsletters_dates, 'extensions_list'), 10, 1);
		add_filter('plugin_action_links_' . $newsletters_dates -> extension_path, array($newsletters_dates, 'action_links'), 10, 1);
		add_action('wpml_metaboxes_extensions_settings', array($newsletters_dates, 'extensions_settings'), 10, 1);
		add_action('after_plugin_row_' . $newsletters_dates -> extension_path, array($newsletters_dates, 'after_plugin_row'), 10, 2);
		add_action('install_plugins_pre_plugin-information', array($newsletters_dates, 'display_changelog'), 10, 1);
		add_filter('transient_update_plugins', array($newsletters_dates, 'check_update'), 10, 1);
		add_filter('site_transient_update_plugins', array($newsletters_dates, 'check_update'), 10, 1);
	}
}
	
?>