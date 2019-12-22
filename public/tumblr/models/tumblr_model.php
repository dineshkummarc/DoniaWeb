<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class tumblr_model extends MY_Model { 
	public function __construct(){
		parent::__construct();
		$this->tb_accounts = "tumblr_accounts";
		$this->tb_posts = "tumblr_posts";
		include APPPATH."../public/tumblr/libraries/tumblrapi.php";
	}

	public function post_validator(){
		$accounts  = get_social_accounts("tumblr");
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
				break;

			case 'photo':
				if(empty($media)){
					$errors[] = lang("The images is required");
				}
				break;

			case 'video':
				if(empty($media)){
					$errors[] = lang("The video is required");
				}
				break;
			
			default:
				$errors[] = lang("Please select a type to post");
				break;
		}

		return $errors;
	}

	public function post_handler(){
		$accounts 	  = get_social_accounts("tumblr");
		$media        = $this->input->post("media");
		$time_post    = post("time_post");
		$caption      = post("caption");
		$url          = post("link");
		$type         = post("type");
		$type         = ($type=="photo" || $type=="video")?"media":$type;

		if(!empty($accounts)){
			if(!post("is_schedule")){
				
				$result_all = array();
				foreach ($accounts as $account_id) {
					$tumblr_account = $this->model->get("id, username, pid, access_token", $this->tb_accounts, "ids = '".$account_id."' AND uid = '".session("uid")."'");
					if(!empty($tumblr_account)){
						$data = array(
							"ids" => ids(),
							"uid" => session("uid"),
							"account" => $tumblr_account->id,
							"type" => $type,
							"data" => json_encode(array(
										"media"   => $media,
										"caption" => $caption,
										"url"     => $url,
										"title"   => ""
									)),
							"time_post" => NOW,
							"delay" => 0,
							"time_delete" => 0,
							"changed" => NOW,
							"created" => NOW
						);

						$tumblr = new TumblrAPI(get_option("tumblr_app_id", ""), get_option("tumblr_app_secret", ""));
						$tumblr->set_access_token($tumblr_account->access_token);
						$result = $tumblr->post($data, $tumblr_account->username);

						if(is_array($result)){
							$data['status'] = 3;
							$data['result'] = $result['message'];

							//Save report
							update_setting("tumblr_post_error_count", get_setting("tumblr_post_error_count", 0) + 1);
							update_setting("tumblr_post_count", get_setting("tumblr_post_count", 0) + 1);

							$this->db->insert($this->tb_posts, $data);

							$result_all[] = $result;
						}else{
							$data['status'] = 2;
							$data['result'] = json_encode(array("message" => "successfully", "id" => $result, "url" => "https://".$tumblr_account->username.".tumblr.com/post/".$result));

							//Save report
							update_setting("tumblr_post_success_count", get_setting("tumblr_post_success_count", 0) + 1);
							update_setting("tumblr_post_count", get_setting("tumblr_post_count", 0) + 1);
							update_setting("tumblr_post_{$type}_count", get_setting("tumblr_post_{$type}_count", 0) + 1);

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
					$tumblr_account = $this->model->get("id, username, pid, access_token", $this->tb_accounts, "ids = '".$account_id."' AND uid = '".session("uid")."'");
					if(!empty($tumblr_account)){
						$data = array(
							"ids" => ids(),
							"uid" => session("uid"),
							"account" => $tumblr_account->id,
							"type" => ($url != "")?"link":"photo",
							"data" => json_encode(array(
										"media"   => $media,
										"caption" => $caption,
										"url"     => $url,
										"title"   => ""
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
			"name" => "tumblr",
			"icon" => "fa fa-tumblr",
			"color" => "#34526f",
			"content" => $this->load->view("../../../public/tumblr/views/post/preview", $data, true)
		);
	}
}
