<?php
if(!function_exists("get_board_from_url")){
	function get_board_from_url($url){
		$board = str_replace("https://www.pinterest.com/", "", $url );
		$board = explode("/", $board);
		array_pop($board);
		$board = implode('/', $board); 
		return urldecode($board);
	}
}

//Pinterest activity get value
if(!function_exists("pinav")){
	function pinav($type, $data, $key){
		$data_tmp = $data;
		$data = json_decode($data);
		$data = get_value($data, $type);
		switch ($type) {
			case 'todo':
				if(get_value($data, $key)){
					return true;
				}else if(empty($data_tmp)){
					return get_option('pinac_enable_'.$key, ($key=="like" || $key == "comment")?1:0);
				}
				return false;

				break;

			case 'target':
				switch ($key) {
					case 'tag':
						if(get_value($data, $key)){
							return true;
						}else if(empty($data_tmp)){
							return get_option('pinac_target_tag', 1);
						}
						break;

					case 'keyword':
						if(get_value($data, $key)){
							return true;
						}else if(empty($data_tmp)){
							return get_option('pinac_target_keyword', 0);
						}
						break;

					case 'follower':
						if(get_value($data, $key)){
							return get_value($data, $key);;
						}else if(empty($data_tmp)){
							return get_option('pinac_target_follower', '');
						}
						break;

					case 'following':
						if(get_value($data, $key)){
							return get_value($data, $key);;
						}else if(empty($data_tmp)){
							return get_option('pinac_target_following', '');
						}
						break;

					case 'liker':
						if(get_value($data, $key)){
							return get_value($data, $key);;
						}else if(empty($data_tmp)){
							return get_option('pinac_target_liker', '');
						}
						break;
					
					case 'commenter':
						if(get_value($data, $key)){
							return get_value($data, $key);;
						}else if(empty($data_tmp)){
							return get_option('pinac_target_commenter', '');
						}
						break;
				}
				break;

			case 'speed':

				switch ($key) {
					case 'level':
						if(get_value($data, $key)){
							return get_value($data, $key);
						}else if(empty($data_tmp)){
							return get_option('pinac_speed_level', "normal");
						}
						break;
					
					default:
						if(get_value($data, $key)){
							return get_value($data, $key);
						}else if(empty($data_tmp)){
							$level = get_option('pinac_speed_level', "normal");
							$level = $level!=""?$level:"normal";
							return get_option('pinac_speed_'.$level.'_'.$key, "normal");
						}
						break;
				}
				if(get_value($data, $key)){
					return get_value($data, $key);
				}
				return 0;
				break;

			case 'filter':
				switch ($key) {
					case 'media_age':
						return get_value($data, $key);
						break;

					case 'media_type':
						return get_value($data, $key);
						break;

					case 'user_relation':
						return get_value($data, $key);
						break;

					case 'user_profile':
						return get_value($data, $key);
						break;

					case 'gender':
						return get_value($data, $key);
						break;
					
					default:
						if(get_value($data, $key)){
							return (int)get_value($data, $key);
						}else{
							return 0;
						}
						break;
				}
				
				break;	

			case 'stop':
				switch ($key) {
					case 'timer':
						return get_value($data, $key);
						break;

					default:
						if(get_value($data, $key)){
							return get_value($data, $key);
						}
						break;
				}
				

				return 0;
				break;	

			default:
				return get_value($data, $key);
				break;
		}
	}
}

//Pinterest Activity Get Count
if(!function_exists("pinac")){
	function pinac($type, $data){
		if(is_string($data)){
			$data = json_decode($data);
		}

		$data = (object)$data;

		if(isset($data->$type)){
			return $data->$type;
		}else{
			return 0;
		}
	}
}

//Pinterest Activity Get Status
if(!function_exists("pinas")){
	function pinas($data, $type=""){
		if($data->account_status == 1){
			switch ($data->status) {
				case "1":
					if($type == "text"){
						echo lang('Started');
					}else{
						echo '<span class="label label-default label-success pull-right">'.lang('Started').'</span>';
					}
					break;

				case "0":
					if($type == "text"){
						echo lang('Stopped');
					}else{
						echo '<span class="label label-default label-danger pull-right">'.lang('Stopped').'</span>';
					}
					break;
				
				default:
					if($type == "text"){
						echo lang('No_time');
					}else{
						echo '<span class="label label-default label-default pull-right">'.lang('No_time').'</span>';
					}
					break;
			}
		}else{
			if($type == "text"){
				echo '<span class="danger">'.lang('re_login_text').'</span>';
			}else{
				echo '<span class="label label-default label-danger pull-right">'.lang('re_login_text').'</span>';
			}
		}
	}
}

//Pinterest Activity Action Type
if(!function_exists("pinaa")){
	function pinaa($action){
		switch ($action) {
			case "comment":
				$result = array(
					"text" => lang('Commented_media'),
					"icon" => "ft-message-square"
				);
				break;

			case "follow":
				$result = array(
					"text" => lang('Followed_user'),
					"icon" => "ft-user-plus"
				);
				break;

			case "unfollow":
				$result = array(
					"text" => lang('Unfollowed_user'),
					"icon" => "ft-user-x"
				);
				break;

			case "direct_message":
				$result = array(
					"text" => lang('Message_sent_to_user'),
					"icon" => "ft-message-circle"
				);
				break;

			case "repost_media":
				$result = array(
					"text" => lang('repost_media'),
					"icon" => "ft-message-circle"
				);
				break;

			case "repin":
				$result = array(
					"text" => lang('repin'),
					"icon" => "ft-repeat"
				);
				break;
			
			default:
				$result = array(
					"text" => "",
					"icon" => ""
				);
				break;
		}

		return (object)$result;
	}
}

if(!function_exists("get_random_numbers")){
	function get_random_numbers($maxSum, $minutes = 60, $maxRandom = 1){
		$numbers = array();
	    for ($i=1; $i <= $minutes; $i++) { 
	        $rand = rand(0, $maxRandom);
	        $sum = array_sum($numbers);
	        if($sum + $rand >= $maxSum){
	            if($sum < $maxSum){
	            	$numbers[] = $maxSum - $sum;
	            }else{
	            	$numbers[] = 0;
	            }
	        }else{
	            $numbers[] = $rand;
	        }
	    }
	    shuffle($numbers);
	    return $numbers;
	}
}

if(!function_exists("get_time_next_schedule")){
	function get_time_next_schedule($numbers, $maxSum, $minutes = 60, $maxRandom = 1){
		$minute = 0;
		$task = 0;
		$new_numbers = array();
		if(is_string($numbers)){
			$numbers = (array)json_decode($numbers);
		}

		$numbers = (array)$numbers;

		if(!empty($numbers) && $numbers[0] != 0){
			$task = $numbers[0];
			unset($numbers[0]);
			$numbers = array_values($numbers);
		}

		foreach ($numbers as $key => $value) {
			if($value == 0){
				$minute++;
				unset($numbers[$key]);
			}else{
				break;
			}
		}

		if(empty($numbers)){
			$numbers = get_random_numbers($maxSum, $minutes, $maxRandom);
		}else{
			$numbers = array_values($numbers);
		}

		return (object)array(
			"task" => $task,
			"minute" => $minute,
			"numbers" => $numbers
		);

	}
}

if(!function_exists("get_action_left")){
	function get_action_left($numbers, $action_complete, $task){
		if(count($action_complete) < $task){
			$action_left = $task - count($action_complete);
			if(!empty($numbers)){
				$zero_indexs = array();
				foreach ($numbers as $key => $value) {
					if($value == 0){
						$zero_indexs[] = $key;
					}
				}

				if(!empty($zero_indexs)){
					$zero_index = get_random_value($zero_indexs);
					$numbers[$zero_index] = $action_left;
				}
			}
			return $numbers;
		}else{
			return $numbers;
		}
	}
}

if(!function_exists("pin_get_setting")){
	function pin_get_setting($key, $value = "", $id){
		$CI = &get_instance();

		if(empty($CI->help_model)){
			$CI->load->model('model', 'help_model');
		}

		$setting = $CI->help_model->get("settings", "pinterest_activities", "id = '".$id."'");
		if(!empty($setting)){
			$setting = $setting->settings;
			$option = json_decode($setting);

			if(is_array($option) || is_object($option)){
				$option = (array)$option;

				if( isset($option[$key]) ){
					return row($option, $key);
				}else{
					$option[$key] = $value;
					$CI->db->update("pinterest_activities", array("settings" => json_encode($option)), array("id" => $id) );
					return $value;
				}
			}else{
				$option = json_encode(array($key => $value));
				$CI->db->update("pinterest_activities", array("settings" => $option), array("id" => $id));
				return $value;
			}
		}

		return false;
	}
}

if(!function_exists("pin_update_setting")){
	function pin_update_setting($key, $value, $id){
		$CI = &get_instance();
		
		if(empty($CI->help_model)){
			$CI->load->model('model', 'help_model');
		}

		$setting = $CI->help_model->get("settings", "pinterest_activities", "id = '".$id."' ")->settings;
		$option = json_decode($setting);
		if(is_array($option) || is_object($option)){
			$option = (array)$option;
			if( isset($option[$key]) ){
				$option[$key] = $value;
				$CI->db->update("pinterest_activities", array("settings" => json_encode($option)), array("id" => $id) );
				return true;
			}
		}
		return false;
	}
}
