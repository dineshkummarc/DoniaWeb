<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class reddit extends MX_Controller {
	public $table;
	public $module;
	public $module_name;
	public $module_icon;

	public function __construct(){
		parent::__construct();
		
		$this->table = REDDIT_ACCOUNTS;
		$this->module = get_class($this);
		$this->module_name = lang("reddit_accounts");
		$this->module_icon = "fa fa-reddit";
		$this->load->model($this->module.'_model', 'model');

	}

	public function index(){

	}

	public function block_general_settings(){
		$data = array();
		$this->load->view('account/general_settings', $data);
	}

	public function block_list_account(){
		$data = array(
			'module'       => $this->module,
			'module_name'  => $this->module_name,
			'module_icon'  => $this->module_icon,
			'list_account' => $this->model->fetch("id, ids, username, avatar, pid, status, url", $this->table, "uid = '".session("uid")."'")
		);
		$this->load->view("account/index", $data);
	}
	
	public function oauth(){
		$reddit = new RedditAPI();
		redirect($reddit->login_url());
	}

	public function add_account(){
		$reddit = new RedditAPI();
		$access_token = $reddit->get_access_token();
		$userinfo     = (object)$reddit->get_user_info();

		if($userinfo){
			$data = array(
				"uid"          => session("uid"),
				"pid"          => $userinfo->subreddit->display_name,
				"username"     => $userinfo->name,
				"avatar"       => $userinfo->icon_img,
				"url"          => "https://www.reddit.com/user/".$userinfo->name,
				"access_token" => json_encode($access_token),
				"status"       => 1,
				"changed"      => NOW
			);

			$account = $this->model->get("*", $this->table, "pid = '".$userinfo->id."' AND uid = '".session("uid")."'");
			if(empty($account)){
				$data["ids"] = ids();
				$data["created"] = NOW;
				$this->db->insert($this->table, $data);
			}else{
				$this->db->update($this->table, $data, array("id" => $account->id));
			}
		}
		redirect(cn("account_manager"));
	}

	public function ajax_delete_item(){
		$board = $this->model->get("*", $this->table, "ids = '".post("id")."'");
		$this->model->delete($this->table, post("id"), false);
	}
}