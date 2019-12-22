<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class reddit_model extends MY_Model {
	public function __construct(){
		parent::__construct();
		parent::__construct();
		$this->tb_accounts = "reddit_accounts";
		$this->tb_posts = "reddit_posts";
		include APPPATH."../public/reddit/libraries/redditapi.php";
	}

	public function post_validator(){
		$accounts  = get_social_accounts("reddit");
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
				$errors[] = lang("Reddit requires an link or image");
				break;
			
			default:
				$errors[] = lang("Please select a type to post");
				break;
		}

		return $errors;
	}

	public function post_handler(){
		$accounts 	  = get_social_accounts("reddit");
		$media        = $this->input->post("media");
		$time_post    = post("time_post");
		$caption      = post("caption");
		$url          = post("link");
		$type         = post("type");
		$type         = $type=="photo"?"media":$type;

		if(!empty($accounts)){
			if(!post("is_schedule")){
				
				$result_all = array();
				foreach ($accounts as $account_id) {
					$account = $this->model->get("id, username, pid, access_token", $this->tb_accounts, "ids = '".$account_id."' AND uid = '".session("uid")."'");
					if(!empty($account)){
						$data = array(
							"ids" => ids(),
							"uid" => session("uid"),
							"account" => $account->id,
							"type" => $type,
							"data" => json_encode(array(
										"media"   => $media,
										"title" => $caption,
										"caption" => "",
										"url"     => $url
									)),
							"time_post" => NOW,
							"delay" => 0,
							"time_delete" => 0,
							"changed" => NOW,
							"created" => NOW
						);

						$reddit = new RedditAPI();
						$access_token = $reddit->set_access_token($account->access_token);
						$result = $reddit->post($data, $account->pid);
						if($result['status'] == "error"){
							$data['status'] = 3;
							$data['result'] = json_encode(array("message" => $result));

							//Save report
							update_setting("reddit_post_error_count", get_setting("reddit_post_error_count", 0) + 1);
							update_setting("reddit_post_count", get_setting("reddit_post_count", 0) + 1);

							$this->db->insert($this->tb_posts, $data);

							$result_all[] = $result;
						}else{
							$data['status'] = 2;
							$data['result'] = json_encode(array("message" => "successfully", "id" => $result['url'], "url" => $result['url'] ));

							//Save report
							update_setting("reddit_post_success_count", get_setting("reddit_post_success_count", 0) + 1);
							update_setting("reddit_post_count", get_setting("reddit_post_count", 0) + 1);
							update_setting("reddit_post_{$type}_count", get_setting("reddit_post_{$type}_count", 0) + 1);

							$this->db->insert($this->tb_posts, $data);

							$result_all[] = array(
					        	"status"  => "success",
					        	"message" => lang('post_successfully')
					        );
						}

					}else{
						$result_all[] = array(
				        	"status"  => "error",
				        	"message" => lang("linkedin_account_not_exists")
				        );
					}
				}

		        return $result_all;

			}else{
				foreach ($accounts as $account_id) {
					$linkedin_account = $this->model->get("id, username, pid, access_token", $this->tb_accounts, "ids = '".$account_id."' AND uid = '".session("uid")."'");
					if(!empty($linkedin_account)){
						$data = array(
							"ids" => ids(),
							"uid" => session("uid"),
							"account" => $linkedin_account->id,
							"type" => $type,
							"data" => json_encode(array(
										"media"   => $media,
										"title" => $caption,
										"caption" => "",
										"url"     => $url
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
			"name" => "reddit",
			"icon" => "fa fa-reddit",
			"color" => "#0d77b7",
			"content" => $this->load->view("../../../public/reddit/views/post/preview", $data, true)
		);
	}
}
