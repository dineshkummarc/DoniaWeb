<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class tumblr extends MX_Controller {
	public $table;
	public $module;
	public $module_name;
	public $module_icon;

	public function __construct(){
		parent::__construct();
		
		$this->table = TUMBLR_ACCOUNTS;
		$this->module = get_class($this);
		$this->module_name = lang("tumblr_accounts");
		$this->module_icon = "fa fa-tumblr";
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
			'list_account' => $this->model->fetch("id, ids, pid, username, avatar, status", $this->table, "uid = '".session("uid")."'")
		);
		$this->load->view("account/index", $data);
	}
	
	public function oauth(){
		$tum = new TumblrAPI(get_option("tumblr_app_id", ""), get_option("tumblr_app_secret", ""));
		redirect($tum->login_url());
	}

	public function add_account(){
		$tum = new TumblrAPI(get_option("tumblr_app_id", ""), get_option("tumblr_app_secret", ""));
		$access_token = $tum->get_access_token();
		$userinfo     = $tum->get_user_info();
		$userinfo     = $userinfo->user;
		
		if(empty($userinfo)){
			redirect(cn("account_manager"));
		}

		if(!permission($this->module."_enable")){
			redirect(cn("account_manager"));
		}

		$id = md5($userinfo->name);
		$data = array(
			"uid"          => session("uid"),
			"ids"          => ids(),
			"pid"          => $id,
			"username"     => $userinfo->name,
			"avatar"       => "http://api.tumblr.com/v2/blog/".$userinfo->name.".tumblr.com/avatar/512",
			"access_token" => json_encode($access_token),
			"status"       => 1,
			"changed"      => NOW
		);

		$account = $this->model->get("*", $this->table, "pid = '".$id."' AND uid = '".session("uid")."'");
		if(empty($account)){
			if(!check_number_account($this->table)){
				redirect(cn("account_manager"));
			}

			$data["created"] = NOW;
			$this->db->insert($this->table, $data);
		}else{
			$this->db->update($this->table, $data, array("id" => $account->id));
		}

		redirect(cn("account_manager"));
	}

	public function ajax_add_account(){
		
	}

	public function ajax_delete_item(){
		$board = $this->model->get("*", $this->table, "ids = '".post("id")."'");
		$this->model->delete($this->table, post("id"), false);
	}
}