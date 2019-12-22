<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class telegram_model extends MY_Model { 
	public function __construct(){
		parent::__construct();
		$this->tb_accounts = "telegram_accounts";
		$this->tb_posts = "telegram_posts";
		include APPPATH."../public/telegram/libraries/telegram_api.php";
	}

	public function post_validator(){
		$accounts  = get_social_accounts("telegram");
		$caption   = post("caption");
		$link      = post("link");
		$type      = post("type");
		$media     = $this->input->post("media");
		$errors = array();

		if(empty($accounts)) return $errors = 0;

		switch ($type) {
			case 'text':
				if($caption == ""){ 
					$errors[] = lang("This caption is required");
				}
				break;

			case 'link':
				if($link == ""){
					$errors[] = lang("The URL is required");
				}

				if (!filter_var($link, FILTER_VALIDATE_URL)) {
					$errors[] = lang("The URL is not a valid");
				}

				if(empty($media)){
					$errors[] = lang("The images is required");
				}

				if($caption == ""){ 
					$errors[] = lang("This caption is required");
				}
				break;

			case 'photo':
				if(empty($media)){
					$errors[] = lang("The images is required");
				}
				break;

			case 'video':
				$errors[] = lang("Google business not support post video");
				break;
			
			default:
				$errors[] = lang("Please select a type to post");
				break;
		}

		return $errors;
	}

	public function post_handler(){
		$accounts 	  = get_social_accounts("telegram");
		$media        = $this->input->post("media");
		$time_post    = post("time_post");
		$caption      = post("caption");
		$url          = post("link");
		$type         = post("type");
		$type         = ($type=="photo")?"media":$type;

		if($type=="link"){
			if(!empty($media)){
				$type = "media";
			}else{
				$type = "text";
			}
		}

		if(!empty($accounts)){
			if(!post("is_schedule")){
				
				$result_all = array();
				foreach ($accounts as $account_id) {
					$telegram_account = $this->model->get("id, username, pid, access_token", $this->tb_accounts, "ids = '".$account_id."' AND uid = '".session("uid")."'");
					if(!empty($telegram_account)){
						$data = array(
							"ids" => ids(),
							"uid" => session("uid"),
							"account" => $telegram_account->id,
							"type" => $type,
							"data" => json_encode(array(
										"media"      => $media,
										"caption"    => $caption,
										"url"        => $url
									)),
							"time_post" => NOW,
							"delay" => 0,
							"time_delete" => 0,
							"changed" => NOW,
							"created" => NOW
						);

						$telegram = new Telegram_API($telegram_account->access_token);
						$result = $telegram->post($data, $telegram_account->pid);

						if(is_array($result)){
							$data['status'] = 3;
							$data['result'] = $result['message'];

							//Save report
							update_setting("telegram_post_error_count", get_setting("telegram_post_error_count", 0) + 1);
							update_setting("telegram_post_count", get_setting("telegram_post_count", 0) + 1);

							$this->db->insert($this->tb_posts, $data);

							$result_all[] = $result;
						}else{
							$data['status'] = 2;
							$data['result'] = json_encode(array("message" => "successfully", "id" => $result, "url" => $result));

							//Save report
							update_setting("telegram_post_success_count", get_setting("telegram_post_success_count", 0) + 1);
							update_setting("telegram_post_count", get_setting("telegram_post_count", 0) + 1);
							update_setting("telegram_post_{$type}_count", get_setting("telegram_post_{$type}_count", 0) + 1);

							$this->db->insert($this->tb_posts, $data);

							$result_all[] = array(
					        	"status"  => "success",
					        	"message" => lang('post_successfully')
					        );
						}

					}else{
						$result_all[] = array(
				        	"status"  => "error",
				        	"message" => lang("This account not exists")
				        );
					}
				}

		        return $result_all;

			}else{
				foreach ($accounts as $account_id) {
					$gb_account = $this->model->get("id, username, pid, access_token", $this->tb_accounts, "ids = '".$account_id."' AND uid = '".session("uid")."'");
					if(!empty($gb_account)){
						$data = array(
							"ids" => ids(),
							"uid" => session("uid"),
							"account" => $gb_account->id,
							"type" => $type,
							"data" => json_encode(array(
										"media"      => $media,
										"caption"    => $caption,
										"url"        => $url
									)),
							"time_post" => get_timezone_system($time_post),
							"delay" => 0,
							"time_delete" => 0,
							"status" => 1,
							"changed" => NOW,
							"created" => NOW
						);

						$this->db->insert($this->tb_posts, $data);
					}
				}

				return array(
		        	"status"  => "success",
		        	"message" => lang('add_schedule_successfully')
		        );
			}

		}else{

			return array(
	        	"status"  => "error",
	        	"message" => lang("processing_is_error_please_try_again")
	        );

		}
	}

	public function post_previewer($link_info){
		$caption = post("caption");
		$link = post("link");
		$type = post("type");
		$medias = $this->input->post("media");

		$data = array(
			"ajax_load" => true,
			"type" => $type,
			"caption" => $caption,
			"medias" => $medias,
			"link_info" => $link_info
		);

		return array(
			"name" => "telegram",
			"icon" => "fa fa-telegram",
			"color" => "#0088cc",
			"content" => $this->load->view("../../../public/telegram/views/post/preview", $data, true)
		);
	}
}