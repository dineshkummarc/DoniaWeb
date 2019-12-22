<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class pinterest extends MX_Controller {
	public $table;
	public $module;
	public $module_name;
	public $module_icon;
	public $pinterest_client_id;
	public $pinterest_client_secret;

	public function __construct(){
		parent::__construct();
		
		$this->table  = PINTEREST_ACCOUNTS;
		$this->module = get_class($this);
		$this->module_name = lang("pinterest_accounts");
		$this->module_icon = "fa fa-pinterest";
		$this->pinterest_app_id = PINTEREST_CLIENT_ID;
		$this->pinterest_app_secret = PINTEREST_CLIENT_SERECT;

		if(session("pinterest_app_id") != "" && session("pinterest_app_secret") != ""){
			$this->pinterest_app_id = session("pinterest_app_id");
			$this->pinterest_app_secret = session("pinterest_app_secret");
		}

		$this->load->model($this->module.'_model', 'model');

	}

	public function block_general_settings(){
		$data = array();
		$this->load->view('account/general_settings', $data);
	}

	public function block_list_account(){
		$this->load->model($this->module.'_model');
		$data = array(
			'module'       => $this->module,
			'module_name'  => $this->module_name,
			'module_icon'  => $this->module_icon,
			'list_account' => $this->model->fetch("id, username, avatar, pid, ids, status, url", $this->table, "uid = '".session("uid")."'")
		);
		$this->load->view("account/index", $data);
	}
	
	public function oauth($type = 0){
		if((int)$type == 1){
			unset_session("pinterest_app_id");
			unset_session("pinterest_app_secret");
			unset_session("pinterest_username");
			unset_session("pinterest_password");
			unset_session("pinterest_proxy");
			unset_session("pinterest_proxy_data");
		}

		if(!permission($this->module."_enable")){
			redirect(cn("account_manager"));
		}
		$pin = new PinterestAPI($this->pinterest_app_id, $this->pinterest_app_secret);
		redirect($pin->login_url());
	}

	public function set_app(){
		$app_id = post("app_id");
		$app_secret = post("app_secret");

		unset_session("pinterest_access_token");
		unset_session("pinterest_username");
		unset_session("pinterest_password");
		unset_session("pinterest_proxy");
		unset_session("pinterest_proxy_data");
		set_session("pinterest_app_id", $app_id);
		set_session("pinterest_app_secret", $app_secret);

		ms(array(
			"status" => "success"
		));
	}

	public function login_with_username(){
		$username = post("username");
		$password = post("password");
		$proxy    = post("proxy");
		$password = encrypt_encode($password);

		try {
			$proxy_data = get_proxy($this->table, $proxy, array());
			$pin = new PinterestAPI();
			$result = $pin->set_unofficial($username, $password, $proxy_data->use);

			if(is_array($result) && $result['status'] == "error"){
				ms(array(
					"status" => "error",
					"message" => $result['message']
				));
			}

			$userinfo = $pin->unofficial_get_user_info();

			if(!empty($userinfo)){
				$username = $userinfo->username;
				$pin->username = $username;
			}else{
				ms(array(
					"status" => "error",
					"message" => lang("Login required")
				));
			}

			$boards = $pin->unofficial_get_boards();


			if(empty($boards)){
				ms(array(
					"status" => "error",
					"message" => lang("Could not find boards")
				));
			}

			unset_session("pinterest_access_token");
			unset_session("pinterest_app_id");
			unset_session("pinterest_app_secret");

			set_session("pinterest_username", $username);
			set_session("pinterest_password", $password);
			set_session("pinterest_proxy_user", $proxy);
			set_session("pinterest_proxy", $proxy_data->use);
			set_session("pinterest_proxy_data", json_encode($proxy_data));
		} catch (Exception $e) {
			ms(array(
				"status" => "error",
				"message" => $e->getMessage()
			));
		}

		ms(array(
			"status" => "success"
		));
	}

	public function popup_add_account($id = "")
	{
		$this->load->library('user_agent');

		$data = array(
			"user_agent" => $this->agent->browser(),
			"account" => $this->model->get("*", $this->table, "ids = '".$id."' AND uid = '".session("uid")."'")
		);
		$this->load->view('account/popup_add_account', $data);
	}

	public function add_account(){
		$pin = new PinterestAPI($this->pinterest_app_id, $this->pinterest_app_secret);
		$access_token = $pin->get_access_token();
		set_session("pinterest_access_token", $access_token);
		redirect(cn("pinterest/add_board"));
	}

	public function add_board(){
		if(session("pinterest_username") && session("pinterest_password")){
			$username = session("pinterest_username");
			$password = session("pinterest_password");
			$proxy = session("pinterest_proxy");
			$pin = new PinterestAPI();
			$pin->set_unofficial($username, $password, $proxy);
			$userinfo = $pin->unofficial_get_user_info();
			$boards = $pin->unofficial_get_boards();
		}else{
			$access_token = session("pinterest_access_token");
			$pin = new PinterestAPI($this->pinterest_app_id, $this->pinterest_app_secret);
			$pin->set_access_token($access_token);
			$userinfo = (object)$pin->get_user_info($access_token);
			$boards = $pin->get_boards();
		}

		if(empty($boards)) redirect(cn('account_manager'));

		$data = array(
			'boards' => $boards,
			'account' => $userinfo
		);
		$this->template->build('account/add_board', $data);

	}

	public function ajax_add_board(){
		$ids = post("ids");
		$boards = $this->input->post("boards[]");
		$access_token = session("pinterest_access_token");
		$type = 1;

		if(empty($boards)){
			ms(array(
	        	"status"  => "error",
	        	"message" => lang('please_select_at_least_one_item')
	        ));
		}
		
		if(session("pinterest_username") && session("pinterest_password")){
			$type = 3;
			$username = session("pinterest_username");
			$password = session("pinterest_password");
			$proxy = session("pinterest_proxy");
			$pin = new PinterestAPI();
			$pin->set_unofficial($username, $password, $proxy);
			$userinfo = $pin->unofficial_get_user_info();
			$me_boards = $pin->unofficial_get_boards();

			$image = BASE."public/pinterest/img/no-avatar.jpg";
			if(isset($userinfo->profile_image_url) && $userinfo->profile_image_url != ""){
				$image = $userinfo->profile_image_url;
			}
		}else{
			if(session("pinterest_app_id") && session("pinterest_app_secret") ){
				$type = 2;
			}
			$pin = new PinterestAPI($this->pinterest_app_id, $this->pinterest_app_secret);
			$pin->set_access_token($access_token);
			$userinfo     = (object)$pin->get_user_info($access_token);
			$me_boards = $pin->get_boards();
			
			$image = BASE."public/pinterest/img/no-avatar.jpg";
			if(!empty($userinfo->image)){
				foreach ($userinfo->image as $row) {
					$row   = (object)$row;
					$image = $row->url;
				}
			}
		}

		foreach ($boards as $board) {
			if(!check_number_account($this->table)){
				ms(array(
					"status" => "error",
					"message" => lang("limit_social_accounts")
				));
			}

			$check_board = false;
			$boar_name = "";
			$boar_url = "";
			foreach ($me_boards as $key => $me_board) {
				if($board == $me_board->id){

					$check_board = true;
					$boar_name = $me_board->name;
					$boar_url = $me_board->url;
				}
			}


			if($check_board){
				$proxy_user = session("pinterest_proxy_user");
				if(!$proxy_user){
					$proxy_user = "";
				}
				$data_board = array(
					"uid"          => session("uid"),
					"ids"          => ids(),
					"login_type"   => $type,
					"pid"          => $board,
					"username"     => $boar_name,
					"avatar"       => $image,
					"access_token" => $access_token,
					"account"      => session("pinterest_username"),
					"password"     => session("pinterest_password"),
					"app_id"       => session("pinterest_app_id"),
					"app_secret"   => session("pinterest_app_secret"),
					"proxy"        => get_option('user_proxy', 1) == 1?$proxy_user:"",
					"url"          => $boar_url,
					"status"       => 1,
					"changed"      => NOW
				);

				if(session("pinterest_proxy_data")){
					if(!$proxy_user){
						$proxy_data = session("pinterest_proxy_data");
						$proxy_data = json_decode($proxy_data);
						$data_board['default_proxy'] = $proxy_data->system;
						$data_board['proxy'] = "";
					}
				}
				
				$account = $this->model->get("*", $this->table, "pid = '".$board."' AND uid = '".session("uid")."'");
				if(empty($account)){
					$data_board["created"] = NOW;
					$this->db->insert($this->table, $data_board);
				}else{
					$this->db->update($this->table, $data_board, array("id" => $account->id));
				}
			}
		}

		unset_session("pinterest_access_token");
		unset_session("pinterest_username");
		unset_session("pinterest_password");
		unset_session("pinterest_proxy");
		unset_session("pinterest_proxy_data");
		unset_session("pinterest_app_id");
		unset_session("pinterest_app_secret");

		ms(array(
        	"status"  => "success",
        	"message" => lang('add_boards_successfully')
        ));
	}

	public function ajax_delete_item(){
		$board = $this->model->get("*", $this->table, "ids = '".post("id")."'");
		$this->model->delete($this->table, post("id"), false);
	}
}